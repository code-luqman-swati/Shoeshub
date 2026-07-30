<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'description',
        'image',
        'status'
    ];

   


    // Parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    // Child categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


    // Products under this category
    
    // Relationship
    public function shoes()
    {
        return $this->hasMany(Shoe::class);
    }


}