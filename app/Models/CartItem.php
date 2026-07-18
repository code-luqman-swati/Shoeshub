<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{

    protected $fillable = [
        'cart_id',
        'shoe_variant_id',
        'quantity',
        'price'
    ];


    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }


    public function shoeVariant()
    {
        return $this->belongsTo(ShoeVariant::class);
    }

}