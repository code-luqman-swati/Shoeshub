<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'address',
        'city',
        'postal_code',
        'status'
    ];


    protected $hidden = [
        'password',
    ];

    public function cartItems()
{
    return $this->hasOne(Cart::class);


}

public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}

public function reviews()
{
    return $this->hasMany(Review::class);
}
}