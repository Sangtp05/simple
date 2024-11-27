<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'image' => 'banners/banner1.jpg',
                'url' => 'https://example.com/promo1',
                'order' => 1,
            ],
            [
                'image' => 'banners/banner2.jpg',
                'url' => 'https://example.com/promo2',
                'order' => 2,
            ],
            [
                'image' => 'banners/banner3.jpg',
                'url' => 'https://example.com/promo3',
                'order' => 3,
            ],
        ];
        
        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
