<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Shoe;
use App\Models\ShoeVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ShoeController extends Controller
{
    /**
     * Display all shoes.
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

            return view('admin.shoes.table', compact('shoes'));
        }

        $shoes = $shoes->latest()->get();

        return view('admin.shoes.index', compact('shoes'));
    }


    /**
     * Show create shoe form.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();

        $brands = Brand::where('status', 1)->get();

        return view(
            'admin.shoes.create',
            compact('categories', 'brands')
        );
    }


    /**
     * Store shoe.
     */
    public function store(Request $request)
    {
        $request->validate([

            'category_id' => 'required|exists:categories,id',

            'brand_id' => 'required|exists:brands,id',

            'name' => 'required|string|max:100',

            'sku' => 'required|string|max:100|unique:shoes,sku',

            'description' => 'nullable|string',

            'price' => 'required|numeric|min:0',

            'discount_price' =>
                'nullable|numeric|min:0|lt:price',

            'gender' =>
                'required|in:male,female,unisex',

            'image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'status' => 'required|boolean',
        ]);


        $data = $request->except('image');


        /*
        |--------------------------------------------------------------------------
        | Generate Unique Slug
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($request->name);

        $originalSlug = $slug;

        $count = 1;

        while (Shoe::where('slug', $slug)->exists()) {

            $slug = $originalSlug . '-' . $count++;

        }

        $data['slug'] = $slug;


        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $data['image'] =
                $request
                    ->file('image')
                    ->store('shoes', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Create Shoe
        |--------------------------------------------------------------------------
        */

        Shoe::create($data);


        return redirect()
            ->route('admin.shoes.index')
            ->with(
                'success',
                'Shoe created successfully.'
            );
    }


    /**
     * Show single shoe.
     */
    public function show(Shoe $shoe)
    {
        $shoe->load([
            'category',
            'brand',
            'images',
            'variants.size',
            'variants.color',
        ]);

        return view(
            'admin.shoes.show',
            compact('shoe')
        );
    }


    /**
     * Show edit shoe form.
     */
    public function edit($id)
    {
        $shoe = Shoe::with('images')
            ->findOrFail($id);

        $categories =
            Category::where('status', 1)->get();

        $brands =
            Brand::where('status', 1)->get();

        return view(
            'admin.shoes.edit',
            compact(
                'shoe',
                'categories',
                'brands'
            )
        );
    }


    /**
     * Update shoe.
     */
    public function update(
        Request $request,
        $id
    ) {

        $shoe = Shoe::findOrFail($id);


        $request->validate([

            'category_id' =>
                'required|exists:categories,id',

            'brand_id' =>
                'required|exists:brands,id',

            'name' =>
                'required|string|max:100',

            'sku' => [
                'required',
                'string',
                'max:100',
                Rule::unique('shoes', 'sku')
                    ->ignore($shoe->id),
            ],

            'description' =>
                'nullable|string',

            'price' =>
                'required|numeric|min:0',

            'discount_price' =>
                'nullable|numeric|min:0|lt:price',

            'gender' =>
                'required|in:male,female,unisex',

            'image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'status' =>
                'required|boolean',
        ]);


        $data = $request->except('image');


        /*
        |--------------------------------------------------------------------------
        | Generate Unique Slug
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($request->name);

        $originalSlug = $slug;

        $count = 1;

        while (
            Shoe::where('slug', $slug)
                ->where('id', '!=', $shoe->id)
                ->exists()
        ) {

            $slug = $originalSlug . '-' . $count++;

        }

        $data['slug'] = $slug;


        /*
        |--------------------------------------------------------------------------
        | Upload New Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            // Delete old image

            if (
                $shoe->image &&
                Storage::disk('public')
                    ->exists($shoe->image)
            ) {

                Storage::disk('public')
                    ->delete($shoe->image);
            }


            // Store new image

            $data['image'] =
                $request
                    ->file('image')
                    ->store('shoes', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Update Shoe
        |--------------------------------------------------------------------------
        */

        $shoe->update($data);


        return redirect()
            ->route('admin.shoes.index')
            ->with(
                'success',
                'Shoe updated successfully.'
            );
    }


    /**
     * Delete shoe.
     */
    public function destroy(Shoe $shoe)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Main Image
        |--------------------------------------------------------------------------
        */

        if (
            $shoe->image &&
            Storage::disk('public')
                ->exists($shoe->image)
        ) {

            Storage::disk('public')
                ->delete($shoe->image);
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Shoe
        |--------------------------------------------------------------------------
        */

        $shoe->delete();


        return response()->json([

            'message' =>
                'Shoe deleted successfully.'

        ]);
    }


    /**
     * AJAX store shoe with first variant.
     */
    public function ajaxStore(Request $request)
    {
        $request->validate([

            'name' =>
                'required|string|max:100',

            'brand_id' =>
                'required|exists:brands,id',

            'category_id' =>
                'required|exists:categories,id',

            'gender' =>
                'required|in:male,female,unisex',

            'price' =>
                'required|numeric|min:0',

            'size_id' =>
                'required|exists:sizes,id',

            'color_id' =>
                'required|exists:colors,id',
        ]);


        DB::beginTransaction();


        try {

            /*
            |--------------------------------------------------------------------------
            | Generate Unique Slug
            |--------------------------------------------------------------------------
            */

            $slug = Str::slug($request->name);

            $originalSlug = $slug;

            $count = 1;

            while (Shoe::where('slug', $slug)->exists()) {

                $slug =
                    $originalSlug . '-' . $count++;
            }


            /*
            |--------------------------------------------------------------------------
            | Generate SKU
            |--------------------------------------------------------------------------
            */

            $sku =
                'SKU-' .
                strtoupper(Str::random(8));


            /*
            |--------------------------------------------------------------------------
            | Create Shoe
            |--------------------------------------------------------------------------
            */

            $shoe = Shoe::create([

                'category_id' =>
                    $request->category_id,

                'brand_id' =>
                    $request->brand_id,

                'name' =>
                    $request->name,

                'slug' =>
                    $slug,

                'sku' =>
                    $sku,

                'price' =>
                    $request->price,

                'gender' =>
                    $request->gender,

                'status' =>
                    1,
            ]);


            /*
            |--------------------------------------------------------------------------
            | Create First Variant
            |--------------------------------------------------------------------------
            */

            $variant = ShoeVariant::create([

                'shoe_id' =>
                    $shoe->id,

                'size_id' =>
                    $request->size_id,

                'color_id' =>
                    $request->color_id,

                'stock' =>
                    0,

                'sold_quantity' =>
                    0,
            ]);


            DB::commit();


            return response()->json([

                'success' =>
                    true,

                'shoe' =>
                    $shoe,

                'variant' =>
                    $variant,

            ]);


        } catch (\Exception $e) {

            DB::rollBack();


            return response()->json([

                'success' =>
                    false,

                'message' =>
                    $e->getMessage(),

            ], 500);
        }
    }
}