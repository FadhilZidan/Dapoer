@extends('layouts.app')
@section('title', 'Menu')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">

    {{-- Hero --}}
    <div class="mb-14">
        <h1 class="font-serif text-5xl font-bold text-brand leading-tight mb-4 max-w-xl">
            Authentic Heritage<br>on Your Plate
        </h1>
        <p class="text-gray-500 text-sm leading-relaxed max-w-lg">
            Discover the deep flavors of the Indonesian archipelago. Our curated menu celebrates centuries of culinary traditions, bringing time-honored recipes from local kitchens to your table.
        </p>
    </div>

    {{-- =============================== --}}
    {{-- SIGNATURE SELECTION --}}
    {{-- =============================== --}}
    <section class="mb-16">
        <div class="flex items-center justify-between mb-7">
            <h2 class="font-serif text-2xl font-bold text-gray-900">Signature Selection</h2>
            <span class="text-xs font-semibold tracking-[0.2em] uppercase text-rust">Chef's Recommendations</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($featured as $product)
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow product-card">
                <div class="flex h-full">
                    {{-- Image --}}
                    <div class="w-48 flex-shrink-0 overflow-hidden">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                 class="w-full h-full object-cover product-card-img">
                        @else
                            <div class="w-full h-full flex items-center justify-center"
                                 style="background: linear-gradient(135deg, #1B3A2D, #2D5A45);">
                                <span class="text-white/20 text-xs text-center px-3 font-serif leading-tight">{{ $product->name }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="flex-1 p-5 flex flex-col justify-between">
                        <div>
                            @if($product->region)
                                <p class="text-xs font-medium text-rust uppercase tracking-wider mb-1">{{ $product->region }}</p>
                            @endif
                            <h3 class="font-serif text-xl font-bold text-gray-900 mb-2 leading-tight">{{ $product->name }}</h3>
                            <p class="text-gray-500 text-xs leading-relaxed line-clamp-3">{{ $product->description }}</p>
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <div>
                                <span class="font-serif text-xl font-bold text-brand">{{ $product->formatted_price }}</span>
                            </div>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit"
                                        class="btn-brand flex items-center gap-2 px-4 py-2 rounded text-xs font-semibold">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Link to detail --}}
            <style>.product-card a.card-link { position: absolute; inset: 0; }</style>
            @endforeach
        </div>
    </section>

    {{-- =============================== --}}
    {{-- RICE & GRAINS --}}
    {{-- =============================== --}}
    <section class="mb-16">
        <h2 class="font-serif text-2xl font-bold text-gray-900 mb-7">Rice & Grains</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($riceGrains as $product)
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow product-card">
                {{-- Image --}}
                <div class="relative h-44 overflow-hidden">
                    @if($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}"
                             class="w-full h-full object-cover product-card-img">
                    @else
                        <div class="w-full h-full flex items-center justify-center"
                             style="background: linear-gradient(135deg, #1B3A2D, #3A6B50);">
                            <span class="text-white/20 text-sm text-center px-4 font-serif">{{ $product->name }}</span>
                        </div>
                    @endif
                    <a href="{{ route('menu.show', $product->slug) }}" class="absolute inset-0"></a>
                </div>

                {{-- Content --}}
                <div class="p-4">
                    <h3 class="font-serif text-lg font-bold text-gray-900 mb-1">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-xs leading-relaxed line-clamp-2 mb-4">{{ $product->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-sm text-gray-800">{{ $product->formatted_price }}</span>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit"
                                    class="flex items-center gap-1.5 text-xs font-semibold text-brand hover:text-brand-dark transition-colors">
                                <svg class="w-4 h-4 border border-brand rounded-full p-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                                </svg>
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- =============================== --}}
    {{-- SWEET ARCHIVES --}}
    {{-- =============================== --}}
    <section class="mb-16">
        <h2 class="font-serif text-2xl font-bold text-gray-900 mb-7">Sweet Archives</h2>

        @php
            $sweetFeatured = $sweetArchives->where('is_featured', true)->first();
            $sweetOthers = $sweetArchives->where('is_featured', false)->values();
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Featured Sweet --}}
            @if($sweetFeatured)
            <div class="bg-white rounded-lg overflow-hidden shadow-sm product-card">
                {{-- Image --}}
                <div class="relative h-52 overflow-hidden">
                    @if($sweetFeatured->image)
                        <img src="{{ $sweetFeatured->image }}" alt="{{ $sweetFeatured->name }}"
                             class="w-full h-full object-cover product-card-img">
                    @else
                        <div class="w-full h-full flex items-center justify-center"
                             style="background: linear-gradient(135deg, #8B3A1A, #C4622D);">
                            <span class="text-white/20 text-lg font-serif text-center px-6">{{ $sweetFeatured->name }}</span>
                        </div>
                    @endif
                    <a href="{{ route('menu.show', $sweetFeatured->slug) }}" class="absolute inset-0"></a>
                </div>

                <div class="p-5">
                    <h3 class="font-serif text-2xl font-bold text-gray-900 mb-2">{{ $sweetFeatured->name }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $sweetFeatured->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="font-serif text-2xl font-bold text-rust">{{ $sweetFeatured->formatted_price }}</span>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $sweetFeatured->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit"
                                    class="px-5 py-2 rounded text-sm font-semibold text-white"
                                    style="background-color: #8B3A1A;">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif

            {{-- Other Sweets (stacked) --}}
            <div class="flex flex-col gap-4">
                @foreach($sweetOthers->take(2) as $product)
                <div class="bg-white rounded-lg overflow-hidden shadow-sm product-card flex h-32">
                    {{-- Thumbnail --}}
                    <div class="w-28 flex-shrink-0 overflow-hidden">
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                 class="w-full h-full object-cover product-card-img">
                        @else
                            <div class="w-full h-full flex items-center justify-center"
                                 style="background: linear-gradient(135deg, #1B3A2D, #3A6B50);">
                            </div>
                        @endif
                    </div>
                    {{-- Info --}}
                    <div class="flex-1 p-4 flex flex-col justify-between">
                        <div>
                            <h3 class="font-serif font-bold text-gray-900 leading-tight mb-1">{{ $product->name }}</h3>
                            <p class="text-gray-500 text-xs line-clamp-2">{{ $product->description }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-semibold text-rust">{{ $product->formatted_price }}</span>
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit"
                                        class="w-6 h-6 rounded-full border border-gray-300 hover:border-brand hover:text-brand flex items-center justify-center text-gray-500 transition-colors">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection
