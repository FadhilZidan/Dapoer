@extends('layouts.app')
@section('title', 'Checkout')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Page Heading --}}
    <div class="mb-8">
        <h1 class="font-serif text-4xl font-bold text-gray-900">Checkout</h1>
        <p class="text-gray-500 text-sm mt-1">Review your culinary selection and provide delivery details to proceed.</p>
    </div>

    <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            {{-- =============================== --}}
            {{-- Left: Shipping + Payment --}}
            {{-- =============================== --}}
            <div class="lg:col-span-3 space-y-8">

                {{-- Shipping Address --}}
                <div>
                    <h2 class="font-serif text-xl font-bold text-gray-900 flex items-center gap-2 mb-6">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8l1.415 8.487A2 2 0 008.397 18h7.206a2 2 0 001.982-1.513L19 8M10 12h4"/>
                        </svg>
                        Shipping Address
                    </h2>

                    <div class="space-y-4">
                        {{-- Full Name --}}
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Full Name</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}"
                                   placeholder="E.g., Aria Kusuma"
                                   class="w-full px-4 py-3 bg-cream-dark border border-transparent rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-all @error('full_name') border-red-400 @enderror"
                                   required>
                            @error('full_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Street Address --}}
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Street Address</label>
                            <input type="text" name="street_address" value="{{ old('street_address') }}"
                                   placeholder="123 Jalan Senopati"
                                   class="w-full px-4 py-3 bg-cream-dark border border-transparent rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-all @error('street_address') border-red-400 @enderror"
                                   required>
                        </div>

                        {{-- City + Postal --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">City</label>
                                <input type="text" name="city" value="{{ old('city') }}"
                                       placeholder="Jakarta Selatan"
                                       class="w-full px-4 py-3 bg-cream-dark border border-transparent rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-all"
                                       required>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Postal Code</label>
                                <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                                       placeholder="12190"
                                       class="w-full px-4 py-3 bg-cream-dark border border-transparent rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-all"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Payment Method --}}
                <div>
                    <h2 class="font-serif text-xl font-bold text-gray-900 flex items-center gap-2 mb-6">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        Payment Method
                    </h2>

                    <div class="space-y-3">

                        {{-- Credit Card --}}
                        <label class="flex items-center justify-between p-4 bg-cream-dark rounded border-2 border-transparent cursor-pointer payment-option has-[:checked]:border-brand has-[:checked]:bg-white transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="payment_method" value="card" id="pay-card" class="accent-brand" checked
                                       onchange="showCardFields(this.value)">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Credit or Debit Card</p>
                                    <p class="text-xs text-gray-500">Visa, Mastercard, AMEX</p>
                                </div>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                        </label>

                        {{-- Bank Transfer --}}
                        <label class="flex items-center justify-between p-4 bg-cream-dark rounded border-2 border-transparent cursor-pointer has-[:checked]:border-brand has-[:checked]:bg-white transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="payment_method" value="bank_transfer" class="accent-brand"
                                       onchange="showCardFields(this.value)">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Bank Transfer (VA)</p>
                                    <p class="text-xs text-gray-500">BCA, Mandiri, BNI</p>
                                </div>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                            </svg>
                        </label>

                        {{-- E-Wallet --}}
                        <label class="flex items-center justify-between p-4 bg-cream-dark rounded border-2 border-transparent cursor-pointer has-[:checked]:border-brand has-[:checked]:bg-white transition-all">
                            <div class="flex items-center gap-3">
                                <input type="radio" name="payment_method" value="ewallet" class="accent-brand"
                                       onchange="showCardFields(this.value)">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">E-Wallet</p>
                                    <p class="text-xs text-gray-500">GoPay, OVO, ShopeePay</p>
                                </div>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </label>
                    </div>

                    {{-- Card Details --}}
                    <div id="card-fields" class="mt-4 bg-cream-dark rounded p-5 space-y-4">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Card Number</label>
                            <input type="text" placeholder="0000 0000 0000 0000" maxlength="19"
                                   class="w-full px-4 py-3 bg-white border border-gray-200 rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand transition-colors"
                                   oninput="formatCard(this)">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Expiry Date</label>
                                <input type="text" placeholder="MM/YY" maxlength="5"
                                       class="w-full px-4 py-3 bg-white border border-gray-200 rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand transition-colors">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">CVV</label>
                                <input type="text" placeholder="123" maxlength="4"
                                       class="w-full px-4 py-3 bg-white border border-gray-200 rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand transition-colors">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- =============================== --}}
            {{-- Right: Order Summary --}}
            {{-- =============================== --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg p-6 sticky top-24 shadow-sm">
                    <h2 class="font-serif text-xl font-bold text-gray-900 mb-6">Order Summary</h2>

                    {{-- Cart Items --}}
                    <div class="space-y-4 mb-6">
                        @foreach($cart as $key => $item)
                        <div class="flex gap-3">
                            {{-- Thumbnail --}}
                            <div class="w-16 h-16 rounded overflow-hidden flex-shrink-0">
                                @if($item['image'])
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full" style="background: linear-gradient(135deg, #1B3A2D, #3A6B50);"></div>
                                @endif
                            </div>
                            {{-- Item info --}}
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-2">
                                    <p class="text-sm font-semibold text-gray-900 leading-tight">{{ $item['name'] }}</p>
                                    <p class="text-sm font-semibold text-gray-800 whitespace-nowrap">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                </div>
                                <p class="text-xs text-gray-400 mt-0.5">Qty: {{ $item['quantity'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-gray-100 pt-4 space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Subtotal</span>
                            <span class="text-gray-800">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Tax (11%)</span>
                            <span class="text-gray-800">Rp {{ number_format($tax, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Shipping</span>
                            <span class="text-gray-800">Rp {{ number_format($shipping, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    {{-- Total --}}
                    <div class="flex justify-between items-center border-t border-gray-100 pt-4 mb-6">
                        <span class="font-bold text-gray-900">Total</span>
                        <span class="font-serif text-xl font-bold text-rust">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    {{-- Place Order --}}
                    <button type="submit" class="w-full btn-brand py-4 rounded text-sm font-semibold">
                        Place Order
                    </button>

                    <p class="text-center text-xs text-gray-400 mt-3 leading-relaxed">
                        By placing your order, you agree to Dapoer Nusantara's
                        <a href="#" class="underline hover:text-brand">Terms of Service</a> and
                        <a href="#" class="underline hover:text-brand">Privacy Policy</a>.
                    </p>
                </div>
            </div>

        </div>
    </form>

</div>

<script>
    function showCardFields(val) {
        document.getElementById('card-fields').style.display = val === 'card' ? 'block' : 'none';
    }
    function formatCard(input) {
        let v = input.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        let matches = v.match(/\d{4,16}/g);
        let match = (matches && matches[0]) || '';
        let parts = [];
        for (let i = 0, len = match.length; i < len; i += 4) {
            parts.push(match.substring(i, i + 4));
        }
        input.value = parts.length ? parts.join(' ') : input.value;
    }
</script>
@endsection
