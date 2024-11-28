<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy danh sách customers và products có sẵn
        $customers = Customer::all();
        $products = Product::all();

        // Tạo một số giỏ hàng ngẫu nhiên
        foreach($customers as $customer) {
            // Mỗi khách hàng có 1-3 sản phẩm trong giỏ
            $numberOfItems = rand(1, 3);
            
            // Lấy ngẫu nhiên các sản phẩm
            $randomProducts = $products->random($numberOfItems);
            
            foreach($randomProducts as $product) {
                Cart::create([
                    'customer_id' => $customer->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 5),
                    'price' => $product->price,
                ]);
            }
        }
    }
}