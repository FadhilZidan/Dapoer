<?php

namespace App\Http\Controllers;

use App\Models\Product;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu.index', [
            'featured'      => Product::where('is_featured', true)->where('is_active', true)->get(),
            'riceGrains'    => Product::where('category', 'rice')->where('is_active', true)->get(),
            'sweetArchives' => Product::where('category', 'sweet')->where('is_active', true)->get(),
        ]);
    }

    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $related = Product::where('id', '!=', $product->id)
            ->where('is_active', true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('menu.show', [
            'product' => $product,
            'related' => $related,
        ]);
    }
}
