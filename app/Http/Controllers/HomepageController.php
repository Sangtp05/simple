<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class HomepageController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)->get();

        return view('homepage.index', compact(
            'featuredProducts'
        ));
    }
}