<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('customer_id', auth('customer')->id())
            ->with('product')
            ->get();

        $total = $cartItems->sum(function($item) {
            return $item->quantity * $item->price;
        });

        return view('customer.cart.index', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);

        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        $cartItem = Cart::where('customer_id', auth('customer')->id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Nếu có rồi thì cập nhật số lượng
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->quantity,
                'price' => $product->sale_price ?? $product->price
            ]);
        } else {
            // Nếu chưa có thì tạo mới
            Cart::create([
                'customer_id' => auth('customer')->id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->sale_price ?? $product->price
            ]);
        }

        return response()->json([
            'message' => 'Thêm vào giỏ hàng thành công',
            'cart_count' => Cart::where('customer_id', auth('customer')->id())->sum('quantity')
        ]);
    }
} 