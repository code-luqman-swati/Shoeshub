<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_number',
        'subtotal',
        'tax',
        'shipping',
        'total',
        'payment_status',
        'order_status',
        'shipping_address',
        'city',
        'postal_code'
    ];


    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function payment()
    {
        return $this->hasOne(Payment::class);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}