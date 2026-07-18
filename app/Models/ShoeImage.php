<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoeImage extends Model
{

    protected $fillable = [
        'shoe_id',
        'image'
    ];


    public function shoe()
    {
        return $this->belongsTo(Shoe::class);
    }

    

}