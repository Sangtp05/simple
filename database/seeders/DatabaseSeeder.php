<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategorySeeder::class,      // Chạy đầu tiên vì Product cần category_id
            ProductSeeder::class,       // Chạy thứ hai vì ProductAttribute và ProductImage cần product_id
            ProductAttributeSeeder::class,
            ProductImageSeeder::class
        ]);
    }
}
