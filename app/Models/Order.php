<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_number',
        'total_amount',
        'status',
        'shipping_address'
    ];

    // Relationship với khách hàng
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}