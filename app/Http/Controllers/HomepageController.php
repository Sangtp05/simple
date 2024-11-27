<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Banner;

class HomepageController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $featuredProducts = Product::where('is_featured', true)
            ->with(['images' => function($query) {
                $query->where('is_primary', true);
            }])
            ->get();
        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->get();

        return view('homepage.index', compact(
            'featuredProducts',
            'banners',
            'categories'
        ));
    }
}
