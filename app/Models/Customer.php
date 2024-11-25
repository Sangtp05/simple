<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'is_active'
    ];

    // Relationship với giỏ hàng
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // Relationship với đơn hàng
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}