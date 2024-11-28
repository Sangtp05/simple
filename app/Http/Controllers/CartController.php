<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Services\BreadcrumbService;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class CartController extends Controller
{
    protected $breadcrumbService;

    public function __construct(BreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }
    public function show()
    {
        $this->breadcrumbService->add('Giỏ hàng');

        $carts = Cart::with(['product'])
            ->where('customer_id', auth()->guard('customer')->user()->id)
            ->get();

        $total = $carts->sum(function ($cart) {
            return $cart->price * $cart->quantity;
        });

        return view('customer.cart.show', compact('carts', 'total'));
    }

    public function get()
    {
        $carts = Cart::with(['product.primaryImage'])
            ->where('customer_id', auth()->guard('customer')->id())
            ->get();

        $total = $carts->sum(function($cart) {
            return $cart->price * $cart->quantity;
        });

        return response()->json([
            'carts' => $carts,
            'total' => $total
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:0'
        ]);

        $cart = Cart::where('customer_id', auth()->guard('customer')->id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($cart) {
            if ($request->quantity > 0) {
                $cart->update(['quantity' => $request->quantity]);
                $message = 'Giỏ hàng đã được cập nhật';
            } else {
                $cart->delete();
                $message = 'Sản phẩm đã được xóa khỏi giỏ hàng';
            }
        } else {
            // Thêm mới nếu chưa có trong giỏ hàng
            $product = Product::findOrFail($request->product_id);
            Cart::create([
                'customer_id' => auth()->guard('customer')->id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->price
            ]);
            $message = 'Đã thêm sản phẩm vào giỏ hàng';
        }

        $cartCount = Cart::where('customer_id', auth()->guard('customer')->id())->count();
        $total = Cart::where('customer_id', auth()->guard('customer')->id())
            ->sum(DB::raw('price * quantity'));

        return response()->json([
            'success' => true,
            'message' => $message,
            'total' => $total,
            'cartCount' => $cartCount
        ]);
    }

    public function getCart()
    {
        $carts = Cart::with(['product.primaryImage'])
            ->where('customer_id', auth()->guard('customer')->id())
            ->get();

        $total = $carts->sum(function($cart) {
            return $cart->price * $cart->quantity;
        });

        return response()->json([
            'carts' => $carts,
            'total' => $total
        ]);
    }
}
