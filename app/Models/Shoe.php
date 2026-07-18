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
    'status'
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
}