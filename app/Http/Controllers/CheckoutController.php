<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('menu.index')->with('error', 'Your cart is empty.');
        }

        $totals = $this->calculateTotals($cart);

        return view('checkout.index', array_merge(
            ['cart' => array_values($cart)],
            $totals
        ));
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('menu.index')->with('error', 'Your cart is empty.');
        }

        $request->validate([
            'full_name'      => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'city'           => 'required|string|max:100',
            'postal_code'    => 'required|string|max:20',
            'payment_method' => 'required|in:card,bank_transfer,ewallet',
        ]);

        $totals = $this->calculateTotals($cart);

        $order = Order::create([
            'user_id'        => Auth::id(),
            'reference'      => Order::generateReference(),
            'full_name'      => $request->full_name,
            'street_address' => $request->street_address,
            'city'           => $request->city,
            'postal_code'    => $request->postal_code,
            'payment_method' => $request->payment_method,
            'subtotal'       => $totals['subtotal'],
            'tax'            => $totals['tax'],
            'shipping'       => $totals['shipping'],
            'total'          => $totals['total'],
            'status'         => 'processing',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'     => $order->id,
                'product_id'   => $item['id'],
                'product_name' => $item['name'],
                'quantity'     => $item['quantity'],
                'price'        => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('checkout.success', $order->reference);
    }

    public function success(string $reference)
    {
        $order = Order::with('items')
            ->where('reference', $reference)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('checkout.success', ['order' => $order]);
    }

    private function calculateTotals(array $cart): array
    {
        $subtotal = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $cart));
        $tax      = (int) round($subtotal * 0.11);
        $shipping = 15000;

        return [
            'subtotal' => $subtotal,
            'tax'      => $tax,
            'shipping' => $shipping,
            'total'    => $subtotal + $tax + $shipping,
        ];
    }
}
