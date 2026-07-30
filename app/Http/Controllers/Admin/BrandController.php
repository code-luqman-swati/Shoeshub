<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 use Illuminate\Support\Str;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $brands = Brand::query();


    if ($request->search) {

        $brands->where('name','like',"%{$request->search}%");

    }


    $brands = $brands->get();



    if($request->ajax()){

        return view(
            'admin.brands.table',
            compact('brands')
        );

    }


    return view(
        'admin.brands.index',
        compact('brands')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   

public function store(StoreBrandRequest $request)
{
    $data = $request->validated();


    $data['slug'] = Str::slug($request->name);


    if($request->hasFile('logo')){

        $data['logo'] = $request
            ->file('logo')
            ->store('brands','public');

    }


    Brand::create($data);


    return redirect()
        ->route('admin.brands.index')
        ->with('success','Brand created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brands.edit', compact('brand'));
    }
    


public function update(UpdateBrandRequest $request, $id)
{
    $brand = Brand::findOrFail($id);


    $data = $request->validated();


    $data['slug'] = Str::slug($request->name);



    if ($request->hasFile('logo')) {


        if($brand->logo && Storage::disk('public')->exists($brand->logo)){

            Storage::disk('public')->delete($brand->logo);

        }


        $data['logo'] = $request
            ->file('logo')
            ->store('brands','public');

    }


    $brand->update($data);



    return redirect()
        ->route('admin.brands.index')
        ->with('success','Brand updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Brand $brand)
{
    if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
        Storage::disk('public')->delete($brand->logo);
    }

    $brand->delete();

    return response()->json([
        'success' => true,
        'message' => 'Brand deleted successfully.'
    ]);
}
}