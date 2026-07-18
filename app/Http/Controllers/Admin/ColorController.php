<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;


class ColorController extends Controller
{


public function index()
{

    $colors = Color::latest()->get();

    return view('Admin.colors.index',compact('colors'));

}



public function create()
{

    return view('Admin.colors.create');

}



public function store(Request $request)
{


$request->validate([

    'name'=>'required|unique:colors,name',

    'hex_code'=>'nullable'

]);



Color::create([

    'name'=>$request->name,

    'hex_code'=>$request->code

]);



return redirect()
->route('admin.colors.index')
->with(
'success',
'Color added successfully'
);


}




public function edit(Color $color)
{

    return view('Admin.colors.edit',compact('color'));

}




public function update(Request $request, Color $color)
{


$request->validate([

'name'=>'required|unique:colors,name,'.$color->id,

'hex_code'=>'nullable'

]);



$color->update([

'name'=>$request->name,

'hex_code'=>$request->code

]);



return redirect()
->route('admin.colors.index')
->with(
'success',
'Color updated successfully'
);


}





public function destroy($id)
{
    $color = Color::findOrFail($id);

    $color->delete();


    return response()->json([
        'success'=>true
    ]);
}


}