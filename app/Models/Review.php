<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'customer_id',
        'shoe_id',
        'rating',
        'comment'
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