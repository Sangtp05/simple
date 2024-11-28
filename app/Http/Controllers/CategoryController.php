<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\BreadcrumbService;

class CategoryController extends Controller
{
    protected $breadcrumbService;

    public function __construct(BreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }

    public function index()
    {
        $parentCategories = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        $this->breadcrumbService->add('Danh mục', route('categories.index'));

        return view('categories.index', compact('parentCategories'));
    }

    public function showParent($categoryParent)
    {
        $categoryParent = Category::where('slug', $categoryParent)->first();
        $categoryParent->load('children');

        $this->breadcrumbService->add($categoryParent->name);

        return view('categories.parent', compact('categoryParent'));
    }

    public function showChild($categoryParent, $categoryChild)
    {
        $categoryParent = Category::where('slug', $categoryParent)->first();
        $categoryChild = Category::where('slug', $categoryChild)->first();
        $products = Product::where('category_id', $categoryChild->id)->get();
        $this->breadcrumbService->add($categoryParent->name, route('categories.parent.show', $categoryParent->slug));
        $this->breadcrumbService->add($categoryChild->name);

        return view('categories.child', compact('categoryParent', 'categoryChild', 'products'));
    }

}
