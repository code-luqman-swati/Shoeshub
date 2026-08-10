<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use App\Models\ShoeVariant;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;


class ShoeVariantController extends Controller
{

public function index(Request $request)
{
    $variants = ShoeVariant::with([
        'shoe',
        'size',
        'color'
    ]);

    if ($request->ajax()) {

        if ($request->filled('search')) {

            $search = $request->search;

            $variants->where(function ($query) use ($search) {
                $query->orWhereHas('shoe', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('size', function ($q) use ($search) {
                    $q->where('size', 'like', "%{$search}%");
                })
                ->orWhereHas('color', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->orWhere('stock', 'like', "%{$search}%");
            });
        }

        $variants = $variants->latest()->get();

        return view('admin.variants.table', compact('variants'));
    }

    $variants = $variants->latest()->get();

    return view('admin.variants.index', compact('variants'));
}
public function create()
{
    $shoe = Shoe::all();
    $sizes = Size::all();

    $colors = Color::all();


    return view('admin.variants.create',
    compact(
        'shoe',
        'sizes',
        'colors'
    ));

}



public function store(Request $request)
{


$request->validate([

    'shoe_id'=>'required',

    'size_id'=>'required',

    'color_id'=>'required',

    'stock'=>'required|integer'

]);



ShoeVariant::create([

    'shoe_id'=>$request->shoe_id,

    'size_id'=>$request->size_id,

    'color_id'=>$request->color_id,

    'stock'=>$request->stock

]);


return redirect()
        ->route('admin.shoe-variants.index')
        ->with('success', 'Variant added successfully.');


} 

public function edit($id)
{
    $variant = ShoeVariant::findOrFail($id);

    $shoes = Shoe::all();

    $sizes = Size::all();

    $colors = Color::all();


    return view('admin.variants.edit', compact(
        'variant',
        'shoes',
        'sizes',
        'colors'
    ));
}

public function update(Request $request, ShoeVariant $shoeVariant)
{
    $request->validate([

        'shoe_id' => 'required|exists:shoes,id',

        'size_id' => 'required|exists:sizes,id',

        'color_id' => 'required|exists:colors,id',

        'stock' => 'required|integer|min:0',

    ]);


    $shoeVariant->update([

        'shoe_id' => $request->shoe_id,

        'size_id' => $request->size_id,

        'color_id' => $request->color_id,

        'stock' => $request->stock,

    ]);


    return redirect()
        ->route('admin.shoe-variants.index')
        ->with('success', 'Variant updated successfully.');

}

public function destroy($id)
{
    $variant = ShoeVariant::findOrFail($id);

    $variant->delete();

    return back()
        ->with(
            'success',
            'Variant deleted successfully'
        );
}

}