<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Tạo danh mục Áo
        $ao = Category::create([
            'name' => 'Áo',
            'slug' => 'ao',
            'description' => 'Danh mục áo',
            'is_active' => true,
        ]);

        // Tạo các danh mục con của Áo
        Category::create([
            'name' => 'Áo sơ mi',
            'slug' => 'ao-so-mi',
            'parent_id' => $ao->id,
            'description' => 'Áo sơ mi các loại',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Áo polo',
            'slug' => 'ao-polo',
            'parent_id' => $ao->id,
            'description' => 'Áo polo các loại',
            'is_active' => true,
        ]);

        // Tạo danh mục Quần
        $quan = Category::create([
            'name' => 'Quần',
            'slug' => 'quan',
            'description' => 'Danh mục quần',
            'is_active' => true,
        ]);

        // Tạo các danh mục con của Quần
        Category::create([
            'name' => 'Quần jean',
            'slug' => 'quan-jean',
            'parent_id' => $quan->id,
            'description' => 'Quần jean các loại',
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Quần kaki',
            'slug' => 'quan-kaki',
            'parent_id' => $quan->id,
            'description' => 'Quần kaki các loại',
            'is_active' => true,
        ]);
    }
}