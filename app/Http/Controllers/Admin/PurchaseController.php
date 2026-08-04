<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Shoe;
use App\Models\PurchaseItem;
use App\Models\ShoeVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PurchasePriceHistory;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;



class PurchaseController extends Controller
{

 public function index(Request $request)
{

    $purchases = Purchase::with('supplier')

        ->when($request->search, function($query) use($request){


            $query->where('purchase_no','like','%'.$request->search.'%')


            ->orWhereHas('supplier', function($q) use($request){

                $q->where('name','like','%'.$request->search.'%');

            });


        })

        ->latest()

        ->paginate(10);



    if($request->ajax())
    {

        return view('admin.purchases.table', compact('purchases'))->render();

    }



    return view('admin.purchases.index', compact('purchases'));

}


public function create()
{

    $suppliers = Supplier::where('status',1)->get();


    $shoes = Shoe::with([
        'variants.size',
        'variants.color'
    ])->where('status',1)->get();


    $brands = Brand::where('status',1)->get();


    $categories = Category::where('status',1)->get();


    $sizes = Size::all();

$colors = Color::all();



    return view('admin.purchases.create',
    compact(
        'suppliers',
        'shoes',
        'brands',
        'categories',
        'sizes',
        'colors'
    ));

}

    public function store(Request $request)
    {

        $request->validate([

            'supplier_id' => 'required|exists:suppliers,id',

            'purchase_date' => 'required|date',

            'items' => 'required|array',

            'items.*.variant_id' => 'required|exists:shoe_variants,id',

            'items.*.quantity' => 'required|integer|min:1',

            'items.*.price' => 'required|numeric|min:0',

        ]);



        DB::transaction(function () use ($request) {


            // Generate Purchase Number

         $lastPurchase = Purchase::orderBy('id','desc')->first();

            if($lastPurchase)
            {
                $number = intval(
                    str_replace('PUR-','',$lastPurchase->purchase_no)
                ) + 1;
            }
            else
            {
                $number = 1;
            }


            $purchaseNo = 'PUR-' . str_pad($number,6,'0',STR_PAD_LEFT);



            // Calculate total

            $total = 0;


            foreach($request->items as $item)
            {
                $total += $item['quantity'] * $item['price'];
            }



            // Create Purchase

            $purchase = Purchase::create([

                'supplier_id' => $request->supplier_id,

                'purchase_no' => $purchaseNo,

                'purchase_date' => $request->purchase_date,

                'total_amount' => $total,

                'status' => 'completed'

            ]);

PurchasePriceHistory::create([

    'shoe_variant_id'=>$item['variant_id'],

    'purchase_id'=>$purchase->id,

    'purchase_price'=>$item['price'],

    'quantity'=>$item['quantity']

]);


            // Save Items + Update Stock

         foreach($request->items as $item)
{
    $subtotal = $item['quantity'] * $item['price'];

    PurchaseItem::create([
        'purchase_id' => $purchase->id,
        'shoe_variant_id' => $item['variant_id'],
        'quantity' => $item['quantity'],
        'purchase_price' => $item['price'],
        'subtotal' => $subtotal,
    ]);


    ShoeVariant::where('id',$item['variant_id'])
        ->increment('stock',$item['quantity']);
}


                // Increase Stock
$variant = ShoeVariant::lockForUpdate()
    ->find($item['variant_id']);


$variant->increment(
    'stock',
    $item['quantity']
);

            


        });



        return redirect()
            ->route('admin.purchases.index')
            ->with('success','Purchase created successfully');

    }




    public function show(Purchase $purchase)
    {
        $purchase->load([
            'supplier',
            'items.variant.shoe',
            'items.variant.size',
            'items.variant.color'
        ]);


        return view(
            'admin.purchases.show',
            compact('purchase')
        );
    }




public function edit(Purchase $purchase)
{

    $purchase->load([
        'items.variant.shoe',
        'items.variant.size',
        'items.variant.color'
    ]);


    $suppliers = Supplier::all();


    $shoes = Shoe::with([
        'variants.size',
        'variants.color'
    ])->get();



    return view(
        'admin.purchases.edit',
        compact(
            'purchase',
            'suppliers',
            'shoes'
        )
    );

}



public function update(Request $request, Purchase $purchase)
{

    $request->validate([

        'supplier_id'=>'required|exists:suppliers,id',

        'purchase_date'=>'required|date',

        'items'=>'required|array',

        'items.*.variant_id'=>'required|exists:shoe_variants,id',

        'items.*.quantity'=>'required|integer|min:1',

        'items.*.price'=>'required|numeric|min:0',

    ]);



    DB::transaction(function() use($request,$purchase){



        /*
        Remove old stock
        */

        foreach($purchase->items as $oldItem)
        {

            $oldItem->variant()->decrement(
                'stock',
                $oldItem->quantity
            );

        }



        /*
        Delete old items
        */

        $purchase->items()->delete();



        /*
        Update purchase
        */

        $total = 0;


        foreach($request->items as $item)
        {

            $subtotal =
                $item['quantity'] * $item['price'];


            $total += $subtotal;



            PurchaseItem::create([

                'purchase_id'=>$purchase->id,

                'shoe_variant_id'=>$item['variant_id'],

                'quantity'=>$item['quantity'],

                'purchase_price'=>$item['price'],

                'subtotal'=>$subtotal,

            ]);



            /*
            Add new stock
            */

            ShoeVariant::where(
                'id',
                $item['variant_id']
            )->increment(
                'stock',
                $item['quantity']
            );


        }



        $purchase->update([

            'supplier_id'=>$request->supplier_id,

            'purchase_date'=>$request->purchase_date,

            'total_amount'=>$total

        ]);



    });



    return redirect()
        ->route('admin.purchases.index')
        ->with('success','Purchase updated');

}


public function destroy(Purchase $purchase)
{

    DB::transaction(function() use($purchase){


        foreach($purchase->items as $item)
        {

            $item->variant()->decrement(
                'stock',
                $item->quantity
            );


        }


        // delete purchase items
        $purchase->items()->delete();


        // delete purchase
        $purchase->delete();


    });



    return response()->json([
        'success'=>true,
        'message'=>'Purchase deleted successfully'
    ]);

}


public function priceHistory(Purchase $purchase)
{

    $purchase->load([
        'items.variant.shoe',
        'items.variant.size',
        'items.variant.color',
        'items.variant.priceHistories.purchase'
    ]);


    return view(
        'admin.purchases.price-history',
        compact('purchase')
    );

}
}