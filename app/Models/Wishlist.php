<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = [
        'customer_id',
        'shoe_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function shoe()
    {
        return $this->belongsTo(Shoe::class);
    }
}