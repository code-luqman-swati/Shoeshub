<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{

protected $fillable=[
    'category_id',
    'brand_id',
    'name',
    'slug',
    'sku',
    'description',
    'price',
    'discount_price',
    'gender',
    'image',
    'status',
    'is_featured'
];


public function category()
{
    return $this->belongsTo(Category::class);
}


public function brand()
{
    return $this->belongsTo(Brand::class);
}

public function images()
{
    return $this->hasMany(ShoeImage::class);
}


public function variants()
{
    return $this->hasMany(ShoeVariant::class);
}

public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}

public function reviews()
{
    return $this->hasMany(Review::class);
}

public function getSoldPercentageAttribute()
{
    $totalStock = $this->variants->sum('stock') 
                    + $this->variants->sum('sold_quantity');

    if($totalStock == 0){
        return 0;
    }

    return round(
        ($this->variants->sum('sold_quantity') / $totalStock) * 100
    );
}
}