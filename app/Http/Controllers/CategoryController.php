<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $parentCategories = Category::whereNull('parent_id')
            ->with('children')
            ->get();
        return view('categories.index', compact('parentCategories'));
    }

    public function showParent($categoryParent)
    {
        $categoryParent = Category::where('slug', $categoryParent)->first();
        $categoryParent->load('children');
        return view('categories.parent', compact('categoryParent'));
    }

    public function showChild($categoryParent, $categoryChild)
    {
        $categoryParent = Category::where('slug', $categoryParent)->first();
        $categoryChild = Category::where('slug', $categoryChild)->first();
        $products = Product::where('category_id', $categoryChild->id)->get();
        return view('categories.child', compact('categoryParent', 'categoryChild', 'products'));
    }
}
