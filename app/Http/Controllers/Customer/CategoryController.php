<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shoe;
use App\Models\Brand;


class CategoryController extends Controller
{
    public function show(Request $request, $slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();

    $query = Shoe::with([
        'category',
        'brand',
        'images'
    ])->where('category_id', $category->id);

    // Brand filter
    if ($request->filled('brand')) {

        $brand = Brand::where('slug', $request->brand)->first();

        if ($brand) {
            $query->where('brand_id', $brand->id);
        }
    }

    // Price filter
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    $products = $query->latest()->paginate(12);

$brands = Brand::all();

return view(
    'customer.products.index',
    compact('products','category','brands')
);
}
}