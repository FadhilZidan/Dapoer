<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PageController extends Controller
{
    public function heritage()
    {
        return view('pages.heritage');
    }

    public function archives()
    {
        $allProducts = Product::with('category')->where('is_active', true)->get();

        $grouped = $allProducts->groupBy(fn($p) => $p->category->slug ?? '');
        $byCategory = [
            'main'      => $grouped->get('main',      collect()),
            'rice'      => $grouped->get('rice',      collect()),
            'sweet'     => $grouped->get('sweet',     collect()),
            'condiment' => $grouped->get('condiment', collect()),
        ];

        return view('pages.archives', compact('allProducts', 'byCategory'));
    }

    public function about()
    {
        return view('pages.about');
    }
}
