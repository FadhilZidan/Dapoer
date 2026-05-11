<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1|max:99',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart    = session('cart', []);
        $key     = 'product_' . $product->id;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] += (int) $request->quantity;
        } else {
            $cart[$key] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'image'    => $product->image,
                'quantity' => (int) $request->quantity,
            ];
        }

        session(['cart' => $cart]);

        return back()->with('success', $product->name . ' added to cart.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity'   => 'required|integer|min:0',
        ]);

        $cart = session('cart', []);
        $key  = 'product_' . $request->product_id;

        if ((int) $request->quantity === 0) {
            unset($cart[$key]);
        } elseif (isset($cart[$key])) {
            $cart[$key]['quantity'] = (int) $request->quantity;
        }

        session(['cart' => $cart]);
        return back();
    }

    public function remove(Request $request)
    {
        $request->validate(['product_id' => 'required']);

        $cart = session('cart', []);
        unset($cart['product_' . $request->product_id]);
        session(['cart' => $cart]);

        return back()->with('success', 'Item removed.');
    }
}
