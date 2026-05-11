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
        $qty     = (int) $request->quantity;

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] = min(99, $cart[$key]['quantity'] + $qty);
        } else {
            $cart[$key] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'image'    => $product->image,
                'quantity' => $qty,
            ];
        }

        session(['cart' => $cart]);

        return back()->with('success', $product->name . ' added to cart.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:0|max:99',
        ]);

        $cart = session('cart', []);
        $key  = 'product_' . $request->product_id;

        if ((int) $request->quantity === 0) {
            $name = $cart[$key]['name'] ?? 'Item';
            unset($cart[$key]);
            session(['cart' => $cart]);
            return back()->with('success', $name . ' removed from cart.');
        }

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] = (int) $request->quantity;
            session(['cart' => $cart]);
        }

        return back();
    }

    public function remove(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id']);

        $cart = session('cart', []);
        $key  = 'product_' . $request->product_id;
        $name = $cart[$key]['name'] ?? 'Item';

        unset($cart[$key]);
        session(['cart' => $cart]);

        return back()->with('success', $name . ' removed from cart.');
    }

    public function cancel()
    {
        session()->forget('cart');

        return redirect()->route('menu.index')->with('success', 'Your cart has been cleared.');
    }
}
