<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ShoeController extends Controller
{
    /**
     * Display all shoes
     */


public function index(Request $request)
{
    $shoes = Shoe::with([
        'category',
        'brand',
        'images'
    ]);

    if ($request->ajax()) {

        if ($request->filled('search')) {

            $search = $request->search;

            $shoes->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('price', 'like', "%{$search}%")
                      ->orWhereHas('category', function ($q) use ($search) {
                          $q->where('name', 'like', "%{$search}%");
                      })
                      ->orWhereHas('brand', function ($q) use ($search) {
                          $q->where('name', 'like', "%{$search}%");
                      });
            });
        }

        $shoes = $shoes->latest()->get();

        return view('Admin.shoes.table', compact('shoes'));
    }

    $shoes = $shoes->latest()->get();

    return view('Admin.shoes.index', compact('shoes'));
}


    /**
     * Show create shoe form
     */
    public function create()
    {
        $categories = Category::where('status',1)->get();

        $brands = Brand::where('status',1)->get();

        return view('admin.shoes.create', compact(
            'categories',
            'brands'
        ));
    }


    /**
     * Store shoe
     */
public function store(Request $request)
{
    $request->validate([

        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'required|exists:brands,id',
        'name' => 'required|string|max:100',
        'sku' => 'required|string|max:100|unique:shoes,sku',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'discount_price' => 'nullable|numeric',
        'gender' => 'required|in:male,female,unisex',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required|boolean',

    ]);


    $data = $request->all();

   
   $slug = Str::slug($request->name);

$count = Shoe::where('slug', 'like', $slug . '%')->count();

if ($count > 0) {
    $slug .= '-' . ($count + 1);
}

$data['slug'] = $slug;



    // Upload Image
    if($request->hasFile('image')){

        $data['image'] = $request
            ->file('image')
            ->store('shoes','public');

    }



    Shoe::create($data);



    return redirect()
        ->route('admin.shoes.index')
        ->with(
            'success',
            'Shoe created successfully.'
        );
}


    /**
     * Show single shoe
     */
    public function show(Shoe $shoe)
    {
        return view('admin.shoes.show', compact('shoe'));
    }




    /**
     * Edit shoe
     */



public function edit($id)
{
    $shoe = Shoe::with('images')->findOrFail($id);

    $categories = Category::where('status',1)->get();

    $brands = Brand::where('status',1)->get();


    return view('Admin.shoes.edit',compact(
        'shoe',
        'categories',
        'brands'
    ));
}

public function update(Request $request, $id)
{
    $shoe = Shoe::findOrFail($id);


    $request->validate([

        'category_id' => 'required|exists:categories,id',

        'brand_id' => 'required|exists:brands,id',

        'name' => 'required|string|max:255',

        'sku' => [
            'required',
            'string',
            'max:255',
            Rule::unique('shoes', 'sku')->ignore($shoe->id),
        ],

        'description' => 'nullable|string',

        'price' => 'required|numeric',

        'discount_price' => 'nullable|numeric',

        'gender' => 'required|in:male,female,unisex',

        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        'status' => 'required|boolean',

    ]);



    $data = $request->all();


    // Generate slug
    $data['slug'] = Str::slug($request->name);



    // Upload new image
    if($request->hasFile('image')){


        // Delete old image
        if($shoe->image &&
            Storage::disk('public')->exists($shoe->image)
        ){

            Storage::disk('public')->delete($shoe->image);

        }



        // Store new image
        $data['image'] = $request
            ->file('image')
            ->store('shoes','public');

    }



    // Update record
    $shoe->update($data);



    return redirect()
        ->route('admin.shoes.index')
        ->with(
            'success',
            'Shoe updated successfully.'
        );
}




    /**
     * Delete shoe
     */
    public function destroy(Shoe $shoe)
    {

        if($shoe->image &&
            Storage::disk('public')
            ->exists($shoe->image)
        ){

            Storage::disk('public')
            ->delete($shoe->image);

        }


        $shoe->delete();



        return response()->json([

            'message'=>'Shoe deleted successfully.'

        ]);

    }
}