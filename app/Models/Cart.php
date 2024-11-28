<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function deleteCart()
    {
        return self::where('customer_id', auth()->guard('customer')->id())->delete();
    }
}
