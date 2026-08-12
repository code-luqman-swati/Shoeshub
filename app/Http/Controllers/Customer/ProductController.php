<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Shoe;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

class ProductController extends Controller
{public function index(Request $request)
{
    $query = Shoe::with([
        'category',
        'brand',
        'images'
    ])
    ->withAvg('reviews', 'rating')
    ->withCount('reviews');


    // Brand filter
    if ($request->filled('brand')) {

        $brand = Brand::where('slug', $request->brand)
            ->first();

        if ($brand) {
            $query->where('brand_id', $brand->id);
        }
    }


    // Minimum price
    if ($request->filled('min_price')) {

        $query->where(
            'price',
            '>=',
            $request->min_price
        );
    }


    // Maximum price
    if ($request->filled('max_price')) {

        $query->where(
            'price',
            '<=',
            $request->max_price
        );
    }


    // Size filter
    if ($request->filled('size')) {

        $size = Size::where('size', $request->size)
            ->first();

        if ($size) {

            $query->whereHas('variants', function ($q) use ($size) {

                $q->where('size_id', $size->id);

            });
        }
    }


    // Color filter
    if ($request->filled('color')) {

        $color = Color::where('name', $request->color)
            ->first();

        if ($color) {

            $query->whereHas('variants', function ($q) use ($color) {

                $q->where('color_id', $color->id);

            });
        }
    }


    // Gender filter
    if ($request->filled('gender')) {

        $query->where('gender', $request->gender);
    }


    // Sorting
  if ($request->sort == 'price_low') {

    $query->orderBy('price', 'asc');

} elseif ($request->sort == 'price_high') {

    $query->orderBy('price', 'desc');

} elseif ($request->sort == 'latest') {

    $query->latest();

} elseif ($request->sort == 'discount') {

    $query->whereNotNull('discount_price')
          ->whereColumn('discount_price', '<', 'price')
          ->orderByRaw('(price - discount_price) DESC');

} else {

    $query->latest();
}


    // Get products
    $products = $query->paginate(12);


    // Customer wishlist status
    $customerId = Auth::guard('customer')->id();

    $products->getCollection()->transform(function ($shoe) use ($customerId) {

        $shoe->isWishlisted = false;

        if ($customerId) {

            $shoe->isWishlisted = $shoe->wishlists()
                ->where('customer_id', $customerId)
                ->exists();
        }

        return $shoe;
    });


    // Footer / filter data
    $sizes = Size::all();
    $brands = Brand::all();
    $colors = Color::all();
    $categories = Category::all();
    $setting = Setting::first();


    return view(
        'customer.products.index',
        compact(
            'products',
            'brands',
            'sizes',
            'colors',
            'categories',
            'setting'
        )
    );
}


 public function show(Shoe $shoe)
{
    $shoe->load([
        'category',
        'brand',
        'images',
        'variants.size',
        'variants.color',
        'reviews.customer'
    ]);

// Recently viewed products

$recentlyViewed = session()->get('recently_viewed', []);


// remove current product if already exists

$recentlyViewed = array_diff($recentlyViewed, [$shoe->id]);


// add current product at start

array_unshift($recentlyViewed, $shoe->id);


// keep only last 4 products

$recentlyViewed = array_slice($recentlyViewed, 0, 4);


// save session

session([
    'recently_viewed' => $recentlyViewed
]);


$recentProducts = Shoe::with([
    'brand',
    'images'
])
->whereIn('id',$recentlyViewed)
->where('id','!=',$shoe->id)
->get();

    $relatedProducts = Shoe::with([
        'category',
        'brand',
        'images'
    ])
    ->where('category_id', $shoe->category_id)
    ->where('id','!=',$shoe->id)
    ->latest()
    ->take(4)
    ->get();

    $isWishlisted = false;


    if(Auth::guard('customer')->check()){

        $isWishlisted = $shoe->wishlists()
            ->where(
                'customer_id',
                Auth::guard('customer')->id()
            )
            ->exists();

    }


    return view(
        'customer.products.show',
        compact('shoe','isWishlisted','relatedProducts','recentProducts')
    );
}


public function brand($brand)
{
    $brand = Brand::where('slug',$brand)
        ->firstOrFail();

    $products = Shoe::with([
        'category',
        'brand',
        'images'
    ])
    ->where('brand_id',$brand->id)
    ->latest()
    ->get();

    return view(
        'customer.products.index',
        compact('products')
    );
}

public function category($category)
{
    $category = Category::where('slug', $category)
        ->firstOrFail();


    $products = Shoe::with([
        'category',
        'brand',
        'images'
    ])
    ->where('category_id', $category->id)
    ->latest()
    ->get();


    return view(
        'customer.products.index',
        compact('products')
    );
}


public function sale()
{
    $products = Shoe::with([
        'category',
        'brand',
        'images'
    ])
    ->whereNotNull('discount_price')
    ->whereColumn('discount_price', '<', 'price')
    ->latest()
    ->get();


    return view(
        'customer.products.sale',
        compact('products')
    );
}


}