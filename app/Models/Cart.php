<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'price'
    ];

    // Relationship với khách hàng
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relationship với sản phẩm (giả sử bạn có model Product)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}