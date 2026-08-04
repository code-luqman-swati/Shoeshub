<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchasePriceHistory extends Model
{

    protected $fillable = [

        'shoe_variant_id',
        'purchase_id',
        'purchase_price',
        'quantity'

    ];



    public function variant()
    {
        return $this->belongsTo(
            ShoeVariant::class,
            'shoe_variant_id'
        );
    }



    public function purchase()
    {
        return $this->belongsTo(
            Purchase::class
        );
    }

}