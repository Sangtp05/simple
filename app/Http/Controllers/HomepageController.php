<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Banner;
use App\Models\ProductLibraryImage;
class HomepageController extends Controller
{
    public function index()
    {
        $banners = Banner::getAllBanners();
        $featuredProducts = Product::getFeaturedProducts();
        $categories = Category::getAllParentCategories();
        $productLibraryImages = ProductLibraryImage::getAllProductLibraryImages();
        return view('homepage.index', compact(
            'featuredProducts',
            'banners',
            'categories',
            'productLibraryImages'
        ));
    }
}
