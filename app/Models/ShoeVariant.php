<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoeVariant extends Model
{

    protected $fillable = [
        'shoe_id',
        'size_id',
        'color_id',
        'stock'
    ];



    public function shoe()
    {
        return $this->belongsTo(Shoe::class);
    }



    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }






}