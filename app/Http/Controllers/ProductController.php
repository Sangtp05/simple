<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\BreadcrumbService;

class ProductController extends Controller
{
    protected $breadcrumbService;

    public function __construct(BreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }

    public function show($categoryParent, $categoryChild, $slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['category', 'images'])
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        $this->breadcrumbService->add($product->category->parent->name, route('categories.parent.show', $product->category->parent->slug));
        $this->breadcrumbService->add($product->category->name, route('categories.child.show', [
            'categoryParent' => $product->category->parent->slug,
            'categoryChild' => $product->category->slug,
        ]));
        $this->breadcrumbService->add($product->name);

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
