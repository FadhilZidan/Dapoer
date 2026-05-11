<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $cart  = session('cart', []);
        $items = array_values($cart);
        $count = array_sum(array_column($items, 'quantity'));
        $total = array_sum(array_map(fn ($i) => $i['price'] * $i['quantity'], $items));

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'cart' => [
                'items' => $items,
                'count' => $count,
                'total' => $total,
            ],
            'flash' => [
                'success' => session('success'),
                'error'   => session('error'),
            ],
        ]);
    }
}
