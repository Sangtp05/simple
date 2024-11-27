<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Áo sơ mi (category_id = 2)
        $products[] = [
            'name' => 'Áo sơ mi trắng nam',
            'slug' => 'ao-so-mi-trang-nam',
            'category_id' => 2,
            'description' => 'Áo sơ mi trắng nam công sở',
            'content' => 'Chi tiết về áo sơ mi trắng nam...',
            'price' => 399000,
            'sale_price' => 359000,
            'sku' => 'ASM001',
            'is_featured' => true,
        ];

        $products[] = [
            'name' => 'Áo sơ mi xanh dương',
            'slug' => 'ao-so-mi-xanh-duong',
            'category_id' => 2,
            'description' => 'Áo sơ mi xanh dương nam',
            'content' => 'Chi tiết về áo sơ mi xanh dương...',
            'price' => 450000,
            'sale_price' => null,
            'sku' => 'ASM002',
            'is_featured' => false,
        ];

        // Áo polo (category_id = 3)
        $products[] = [
            'name' => 'Áo polo đen basic',
            'slug' => 'ao-polo-den-basic',
            'category_id' => 3,
            'description' => 'Áo polo đen cơ bản',
            'content' => 'Chi tiết về áo polo đen...',
            'price' => 299000,
            'sale_price' => 269000,
            'sku' => 'APL001',
            'is_featured' => true,
        ];

        $products[] = [
            'name' => 'Áo polo sọc ngang',
            'slug' => 'ao-polo-soc-ngang',
            'category_id' => 3,
            'description' => 'Áo polo sọc ngang thời trang',
            'content' => 'Chi tiết về áo polo sọc ngang...',
            'price' => 349000,
            'sale_price' => null,
            'sku' => 'APL002',
            'is_featured' => false,
        ];

        // Quần jean (category_id = 5)
        $products[] = [
            'name' => 'Quần jean xanh đậm',
            'slug' => 'quan-jean-xanh-dam',
            'category_id' => 5,
            'description' => 'Quần jean xanh đậm nam',
            'content' => 'Chi tiết về quần jean xanh đậm...',
            'price' => 599000,
            'sale_price' => 549000,
            'sku' => 'QJN001',
            'is_featured' => true,
        ];

        $products[] = [
            'name' => 'Quần jean đen',
            'slug' => 'quan-jean-den',
            'category_id' => 5,
            'description' => 'Quần jean đen nam',
            'content' => 'Chi tiết về quần jean đen...',
            'price' => 649000,
            'sale_price' => null,
            'sku' => 'QJN002',
            'is_featured' => false,
        ];

        // Quần kaki (category_id = 6)
        $products[] = [
            'name' => 'Quần kaki beige',
            'slug' => 'quan-kaki-beige',
            'category_id' => 6,
            'description' => 'Quần kaki màu beige',
            'content' => 'Chi tiết về quần kaki beige...',
            'price' => 499000,
            'sale_price' => 449000,
            'sku' => 'QKK001',
            'is_featured' => true,
        ];

        $products[] = [
            'name' => 'Quần kaki xám',
            'slug' => 'quan-kaki-xam',
            'category_id' => 6,
            'description' => 'Quần kaki màu xám',
            'content' => 'Chi tiết về quần kaki xám...',
            'price' => 479000,
            'sale_price' => null,
            'sku' => 'QKK002',
            'is_featured' => false,
        ];

        $products[] = [
            'name' => 'Quần kaki đen',
            'slug' => 'quan-kaki-den',
            'category_id' => 6,
            'description' => 'Quần kaki màu đen',
            'content' => 'Chi tiết về quần kaki đen...',
            'price' => 459000,
            'sale_price' => 429000,
            'sku' => 'QKK003',
            'is_featured' => false,
        ];

        $products[] = [
            'name' => 'Áo sơ mi kẻ sọc',
            'slug' => 'ao-so-mi-ke-soc',
            'category_id' => 2,
            'description' => 'Áo sơ mi kẻ sọc nam',
            'content' => 'Chi tiết về áo sơ mi kẻ sọc...',
            'price' => 429000,
            'sale_price' => 399000,
            'sku' => 'ASM003',
            'is_featured' => false,
        ];
        foreach ($products as $product) {
            $createdProduct = Product::create($product);
            
            // Add colors to each product
            $createdProduct->attributes()->createMany([
                ['name' => 'Color', 'value' => 'Trắng'],
                ['name' => 'Color', 'value' => 'Đen'],
            ]);
        }
    }
}