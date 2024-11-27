<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('customer_id', auth('customer')->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('customer.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Kiểm tra đơn hàng có phải của khách hàng này không
        if ($order->customer_id !== auth('customer')->id()) {
            abort(403);
        }

        $order->load('orderItems.product');

        return view('customer.orders.show', compact('order'));
    }
} 