<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;


class SizeController extends Controller
{


    public function index()
    {

        $sizes = Size::all();


        return view(
            'Admin.sizes.index',
            compact('sizes')
        );

    }



    public function create()
    {

        return view(
            'Admin.sizes.create'
        );

    }




    public function store(Request $request)
    {

        $request->validate([

            'size'=>'required|unique:sizes,size'

        ]);



        Size::create([

            'size'=>$request->size

        ]);



        return redirect()
        ->route('admin.sizes.index')
        ->with(
            'success',
            'Size added successfully'
        );

    }




   public function destroy(Size $size)
{
    $size->delete();

    return back()
        ->with(
            'success',
            'Size deleted successfully'
        );
}

function edit($id){
   $size =Size::findorfail($id);
   return view('admin.sizes.edit',compact('size'));
  
}

public function update(Request $request, Size $size)
{

    $request->validate([

        'size'=>'required|unique:sizes,size,'.$size->id

    ]);



    $size->update([

        'size'=>$request->size

    ]);



    return redirect()
        ->route('admin.sizes.index')
        ->with(
            'success',
            'Size updated successfully'
        );

}



}