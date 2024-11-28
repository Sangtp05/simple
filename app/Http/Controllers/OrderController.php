<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\BreadcrumbService;
class OrderController extends Controller
{
    protected $breadcrumbService;

    public function __construct(BreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }
    public function checkout()
    {
        $cart = Cart::where('customer_id', auth()->guard('customer')->id())
            ->with('product')
            ->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Giỏ hàng trống');
        }

        $this->breadcrumbService->add('Giỏ hàng', route('cart.show'));
        $this->breadcrumbService->add('Thanh toán');

        return view('customer.checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'phone' => 'required|string',
            'note' => 'nullable|string',
        ]);

        try {
            DB::beginTransaction();
            
            $cartItems = Cart::where('customer_id', auth()->guard('customer')->id())
                ->with('product')
                ->get();
                
            if ($cartItems->isEmpty()) {
                return redirect()->route('cart.show')->with('error', 'Giỏ hàng trống');
            }

            $order = Order::createFromCart($cartItems, $request->all());
            
            Cart::deleteCart();

            DB::commit();
            return redirect()->route('customer.orders.show', $order)
                ->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
        }
    }

    public function index()
    {
        $orders = Order::where('customer_id', auth()->guard('customer')->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('customer.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Kiểm tra order có thuộc về customer hiện tại
        if ($order->customer_id !== auth()->guard('customer')->id()) {
            abort(403);
        }

        $order->load(['orderItems.product', 'customer']);

        return view('customer.orders.show', compact('order'));
    }
}
