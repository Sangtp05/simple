<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        // Xóa dữ liệu cũ nếu có
        ProductImage::truncate();

        // Lấy tất cả sản phẩm
        $products = Product::all();

        foreach ($products as $product) {
            // Tạo 4 ảnh cho mỗi sản phẩm
            for ($i = 1; $i <= 4; $i++) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'https://shop.mango.com/assets/rcs/pics/static/T7/fotos/S/77050587_99.jpg?imwidth=2048&imdensity=1&ts=1714496723333',
                    'order' => $i,
                    'is_primary' => ($i === 1), // Ảnh đầu tiên là ảnh chính
                ]);
            }
        }
    }
}
