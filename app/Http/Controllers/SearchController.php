<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q');
        
        $products = Product::query()
            ->when($query, function($q) use ($query) {
                return $q->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->paginate(12);

        return view('search', [
            'products' => $products,
            'query' => $query
        ]);
    }
} 