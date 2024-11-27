<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductLibraryImage;

class ProductLibraryImageSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy tất cả sản phẩm
        $products = Product::all();

        // Mảng các nội dung mẫu
        $sampleContents = [
            'Sản phẩm tuyệt vời, chất lượng cao, đáng mua!',
            'Thiết kế đẹp, phù hợp với nhiều không gian.',
            'Rất hài lòng với chất lượng sản phẩm này.',
            'Màu sắc đẹp, phù hợp với nhiều phong cách.',
            'Sản phẩm đúng như mô tả, rất ấn tượng.',
        ];

        foreach ($products as $product) {
            // Tạo 2-4 hình ảnh cho mỗi sản phẩm
            $numberOfImages = rand(2, 4);
            
            for ($i = 0; $i < $numberOfImages; $i++) {
                ProductLibraryImage::create([
                    'product_id' => $product->id,
                    'image' => 'product-library/image-' . rand(1, 10) . '.jpg', // Giả định có sẵn ảnh
                    'content' => $sampleContents[array_rand($sampleContents)],
                    'is_active' => true,
                    'order' => $i
                ]);
            }
        }
    }
}
