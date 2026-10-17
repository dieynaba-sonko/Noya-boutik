<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    // Page qui liste tous les produits
    public function index(): View
    {
        $products = Product::query()
            ->where('is_active', true)
            ->with(['category', 'images'])
            ->orderBy('name')
            ->get();

        return view('products.index', [
            'products' => $products,
        ]);
    }

    // Page d'un seul produit
    public function show(string $slug): View
    {
        $product = Product::query()
            ->where('is_active', true)
            ->where('slug', $slug)
            ->with(['category', 'images'])
            ->firstOrFail();

        return view('products.show', [
            'product' => $product,
        ]);
    }
}
