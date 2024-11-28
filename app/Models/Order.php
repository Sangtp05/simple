<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'total_amount',
        'status',
        'shipping_address',
        'shipping_phone',
        'note'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="badge bg-warning">Chờ xử lý</span>',
            'processing' => '<span class="badge bg-info">Đang xử lý</span>',
            'completed' => '<span class="badge bg-success">Hoàn thành</span>',
            'cancelled' => '<span class="badge bg-danger">Đã hủy</span>',
            default => '<span class="badge bg-secondary">Không xác định</span>'
        };
    }

    public static function createFromCart($cartItems, $data)
    {
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        $order = self::create([
            'customer_id' => auth()->guard('customer')->id(),
            'total_amount' => $total,
            'shipping_address' => $data['shipping_address'],
            'shipping_phone' => $data['phone'],
            'note' => $data['note'],
            'status' => 'pending'
        ]);

        foreach ($cartItems as $item) {
            $order->orderItems()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }

        return $order;
    }
}