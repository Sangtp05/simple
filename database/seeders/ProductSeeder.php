<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $product = Product::create([
            'name' => 'Áo sơ mi nam trắng',
            'slug' => Str::slug('Áo sơ mi nam trắng'),
            'category_id' => 1, // ID của category áo sơ mi
            'description' => 'Áo sơ mi nam trắng cao cấp',
            'price' => 299000,
            'sku' => 'ASM001',
            'is_active' => true,
        ]);

        // Thêm sizes
        $product->attributes()->createMany([
            ['name' => 'Size', 'value' => 'S'],
            ['name' => 'Size', 'value' => 'M'],
            ['name' => 'Size', 'value' => 'L'],
            ['name' => 'Size', 'value' => 'XL'],
        ]);

        // Thêm colors
        $product->attributes()->createMany([
            ['name' => 'Color', 'value' => 'Trắng'],
            ['name' => 'Color', 'value' => 'Đen'],
        ]);
    }
}