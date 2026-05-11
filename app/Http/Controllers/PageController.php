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
        return view('pages.archives', [
            'products' => Product::where('is_active', true)->get(),
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }
}
