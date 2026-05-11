@extends('layouts.app')
@section('title', 'Your Selection')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Page Heading --}}
    <div class="mb-10">
        <h1 class="font-serif text-4xl font-bold text-gray-900">Your Selection</h1>
        <p class="text-gray-500 text-sm mt-2 max-w-md">
            Curating the finest heritage flavors for your table. Review your archival selection before we proceed with the craft.
        </p>
    </div>

    @if(empty($enriched))
        {{-- Empty cart --}}
        <div class="text-center py-24">
            <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 7H4l1-7z"/>
            </svg>
            <p class="font-serif text-2xl text-gray-400 mb-2">Your selection is empty</p>
            <p class="text-gray-400 text-sm mb-6">Explore our heritage menu and add your favourites.</p>
            <a href="{{ route('menu.index') }}" class="btn-brand inline-block px-8 py-3 rounded text-sm font-semibold">
                Browse Menu
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">

            {{-- ========================= --}}
            {{-- Left: Cart Items --}}
            {{-- ========================= --}}
            <div class="lg:col-span-3 space-y-4">
                @foreach($enriched as $item)
                <div class="bg-white rounded-lg flex gap-5 p-5 shadow-sm">

                    {{-- Product Image --}}
                    <div class="w-36 h-32 rounded overflow-hidden flex-shrink-0">
                        @if($item['image'])
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full" style="background: linear-gradient(135deg, #1B3A2D, #3A6B50);"></div>
                        @endif
                    </div>

                    {{-- Item Details --}}
                    <div class="flex-1 min-w-0 flex flex-col justify-between">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                @if($item['category_name'])
                                    <p class="text-xs font-semibold tracking-widest text-rust uppercase mb-1">{{ $item['category_name'] }}</p>
                                @endif
                                <h3 class="font-serif text-xl font-bold text-gray-900 leading-tight">{{ $item['name'] }}</h3>
                                @if($item['subtitle'])
                                    <p class="text-gray-500 text-sm mt-1 leading-snug">{{ $item['subtitle'] }}</p>
                                @endif
                            </div>

                            {{-- Delete button --}}
                            <form action="{{ route('cart.remove') }}" method="POST" class="flex-shrink-0">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                <button type="submit" title="Remove item"
                                        class="text-gray-300 hover:text-red-400 transition-colors mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        {{-- Qty Controls + Line Total --}}
                        <div class="flex items-center justify-between mt-4">
                            <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}"
                                        class="w-7 h-7 rounded border border-gray-200 text-gray-600 hover:border-brand hover:text-brand flex items-center justify-center text-sm transition-colors">
                                    −
                                </button>
                                <span class="text-sm font-semibold text-gray-800 w-6 text-center">{{ $item['quantity'] }}</span>
                                <button type="submit" name="quantity" value="{{ min(99, $item['quantity'] + 1) }}"
                                        class="w-7 h-7 rounded border border-gray-200 text-gray-600 hover:border-brand hover:text-brand flex items-center justify-center text-sm transition-colors">
                                    +
                                </button>
                            </form>

                            <p class="font-semibold text-gray-800">
                                Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- ========================= --}}
            {{-- Right: Summary --}}
            {{-- ========================= --}}
            <div class="lg:col-span-2">
                <div class="bg-[#F0EDE6] rounded-lg p-6 sticky top-24">
                    <h2 class="font-serif text-2xl font-bold text-gray-900 mb-6">Summary</h2>

                    {{-- Breakdown --}}
                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="text-gray-800 font-medium">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Heritage Service (Tax 10%)</span>
                            <span class="text-gray-800 font-medium">Rp {{ number_format($tax, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Artisan Packaging</span>
                            <span class="text-rust font-semibold">Complimentary</span>
                        </div>
                    </div>

                    {{-- Total --}}
                    <div class="border-t border-gray-300 pt-4 mb-6 flex items-center justify-between">
                        <span class="text-gray-900 font-semibold">Total</span>
                        <span class="font-serif text-2xl font-bold text-gray-900">
                            Rp {{ number_format($subtotal + $tax, 0, ',', '.') }}
                        </span>
                    </div>

                    {{-- Proceed to Checkout --}}
                    <a href="{{ route('checkout.index') }}"
                       class="btn-brand w-full flex items-center justify-center gap-2 py-4 rounded text-sm font-semibold tracking-widest uppercase">
                        Proceed to Checkout
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    {{-- Note --}}
                    <div class="mt-4 flex items-start gap-3 bg-white rounded p-3">
                        <svg class="w-5 h-5 text-brand flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-xs text-gray-500 leading-relaxed">
                            Each dish is freshly curated by our masters upon order confirmation.
                        </p>
                    </div>
                </div>

                {{-- Promotional Code --}}
                <div class="mt-6">
                    <p class="text-xs font-semibold uppercase tracking-widest text-gray-500 mb-2">Promotional Code</p>
                    <div class="flex gap-2">
                        <input type="text" placeholder="ARCHIVE2024"
                               class="flex-1 px-4 py-3 bg-white border border-gray-200 rounded text-sm text-gray-700 placeholder-gray-300 focus:outline-none focus:border-brand transition-colors">
                        <button class="bg-rust hover:bg-rust-dark text-white text-sm font-semibold px-5 py-3 rounded transition-colors">
                            Apply
                        </button>
                    </div>
                </div>
            </div>

        </div>

        {{-- Clear cart --}}
        <div class="mt-6 flex justify-start">
            <form action="{{ route('cart.cancel') }}" method="POST"
                  onsubmit="return confirm('This will remove all items from your cart. Continue?')">
                @csrf
                <button type="submit"
                        class="flex items-center gap-1.5 text-xs text-gray-400 hover:text-red-500 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Clear cart
                </button>
            </form>
        </div>
    @endif

</div>
@endsection
