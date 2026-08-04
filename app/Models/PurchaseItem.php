<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
 protected $fillable = [
    'purchase_id',
    'shoe_variant_id',
    'quantity',
    'purchase_price',
    'sale_price',
    'subtotal',
];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function variant()
    {
        return $this->belongsTo(ShoeVariant::class, 'shoe_variant_id');
    }

    public function purchases()
{
    return $this->hasMany(Purchase::class);
}
}