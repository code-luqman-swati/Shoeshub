<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

  public function index(Request $request)
{

    $query = Supplier::latest();



    if($request->search)
    {

        $search = $request->search;


        $query->where(function($q) use($search){

            $q->where('name','like',"%{$search}%")

            ->orWhere('phone','like',"%{$search}%")

            ->orWhere('email','like',"%{$search}%");

        });

    }



    $suppliers = $query->get();



    if($request->ajax())
    {
        return view('Admin.suppliers.table',compact('suppliers'))->render();
    }



    return view('admin.suppliers.index',compact('suppliers'));

}

    public function create()
    {
        return view('admin.suppliers.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'nullable',
            'email'=>'nullable|email',
            'address'=>'nullable'
        ]);


        Supplier::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);


        return redirect()
            ->route('admin.suppliers.index')
            ->with('success','Supplier created successfully');
    }


    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }


    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'nullable',
            'email'=>'nullable|email',
            'address'=>'nullable'
        ]);


        $supplier->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
        ]);


        return redirect()
            ->route('admin.suppliers.index')
            ->with('success','Supplier updated');
    }


  public function destroy(Supplier $supplier)
{
    $supplier->delete();

    return response()->json([
        'success'=>true
    ]);
}


public function ajaxStore(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'address' => 'nullable|string',
    ]);

    $supplier = Supplier::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'address' => $request->address,
        'status' => 1,
    ]);

    return response()->json([
        'success' => true,
        'supplier' => $supplier,
    ]);
}
}