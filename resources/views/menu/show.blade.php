@extends('layouts.app')
@section('title', $product->name)

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-xs text-gray-400 mb-10">
        <a href="{{ route('menu.index') }}" class="hover:text-brand transition-colors">Menu</a>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="hover:text-brand capitalize">{{ ucfirst($product->category === 'main' ? 'Main Courses' : ($product->category === 'rice' ? 'Rice & Grains' : ($product->category === 'sweet' ? 'Sweet Archives' : 'Condiments'))) }}</span>
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
        <span class="text-gray-600">{{ $product->name }}</span>
    </nav>

    {{-- Product Hero --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-16">

        {{-- Left: Image --}}
        <div class="relative">
            <div class="rounded-lg overflow-hidden aspect-square relative">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center"
                         style="background: linear-gradient(135deg, #1B3A2D 0%, #2D5A45 50%, #1B3A2D 100%);">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-white/10 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-white/20 font-serif text-xl">{{ $product->name }}</p>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Floating quote card --}}
            @if($product->region)
            <div class="absolute bottom-6 left-6 right-20 bg-white/95 backdrop-blur-sm rounded p-4 shadow-lg">
                <p class="text-gray-700 text-sm font-light italic leading-relaxed">
                    "The world's most delicious food."
                </p>
                <p class="text-gray-400 text-xs mt-1">CNN International 2011, 2017</p>
            </div>
            @endif
        </div>

        {{-- Right: Product Details --}}
        <div class="flex flex-col justify-center">

            {{-- Category breadcrumb --}}
            <p class="text-xs text-gray-400 uppercase tracking-widest mb-2">
                {{ $product->region ?? 'Indonesia' }}
            </p>

            {{-- Name --}}
            <h1 class="font-serif text-4xl font-bold text-gray-900 leading-tight mb-2">
                {{ $product->name }}
            </h1>

            {{-- Subtitle --}}
            @if($product->subtitle)
            <p class="text-rust font-medium italic mb-5">{{ $product->subtitle }}</p>
            @endif

            {{-- Price --}}
            <div class="flex items-center gap-3 mb-5">
                <span class="font-serif text-3xl font-bold text-gray-900">{{ $product->formatted_price }}</span>
                @if($product->original_price)
                    <span class="text-gray-400 line-through text-lg">{{ $product->formatted_original_price }}</span>
                @endif
            </div>

            {{-- Description --}}
            <p class="text-gray-600 text-sm leading-relaxed mb-8">{{ $product->description }}</p>

            {{-- Quantity + Add to Cart --}}
            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                {{-- Quantity Selector --}}
                <div class="flex items-center gap-4 mb-5">
                    <span class="text-xs font-semibold uppercase tracking-widest text-gray-700">Quantity</span>
                    <div class="flex items-center border border-gray-200 rounded overflow-hidden">
                        <button type="button" onclick="adjustQty(-1)"
                                class="w-9 h-9 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                            </svg>
                        </button>
                        <input type="number" name="quantity" id="qty-input" value="1" min="1" max="99"
                               class="w-12 h-9 text-center text-sm font-semibold text-gray-900 border-x border-gray-200 focus:outline-none bg-white">
                        <button type="button" onclick="adjustQty(1)"
                                class="w-9 h-9 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex items-center gap-3">
                    <button type="submit"
                            class="flex-1 btn-brand py-3.5 rounded text-sm font-semibold flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Add to Cart
                    </button>
                    <button type="button"
                            class="w-12 h-12 border border-gray-200 rounded flex items-center justify-center text-gray-400 hover:text-rust hover:border-rust transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>
            </form>

            {{-- Badges --}}
            <div class="flex items-center gap-6 mt-7 pt-7 border-t border-gray-100">
                @if($product->heat_level)
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-rust" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.5 2 6 4.5 6 7c0 2 1 3.5 2.5 4.5C7 13 6 15 6 17c0 2.8 2.2 5 5 5h2c2.8 0 5-2.2 5-5 0-2-1-4-2.5-5.5C17 10.5 18 9 18 7c0-2.5-2.5-5-6-5z"/>
                    </svg>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider">Heat Level</p>
                        <p class="text-xs font-semibold text-gray-700">{{ $product->heat_level }}</p>
                    </div>
                </div>
                @endif

                @if($product->cook_time)
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-rust" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider">Cook Time</p>
                        <p class="text-xs font-semibold text-gray-700">{{ $product->cook_time }}</p>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>

    {{-- Heritage Narrative --}}
    @if($product->heritage_narrative || $product->key_ingredients)
    <section class="mb-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Narrative text --}}
            <div class="lg:col-span-2">
                <h2 class="font-serif text-2xl font-bold text-gray-900 mb-5">The Heritage Narrative</h2>
                @if($product->heritage_narrative)
                    @foreach(explode("\n\n", $product->heritage_narrative) as $para)
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">{{ $para }}</p>
                    @endforeach
                @endif
            </div>

            {{-- Key Ingredients --}}
            @if($product->key_ingredients && count($product->key_ingredients) > 0)
            <div>
                <div class="bg-cream-dark rounded-lg p-6">
                    <h3 class="font-serif text-lg font-bold text-gray-900 mb-5">Key Ingredients</h3>
                    <ul class="space-y-3">
                        @foreach($product->key_ingredients as $ingredient)
                        <li class="flex items-center justify-between py-2 border-b border-gray-200 last:border-0">
                            <span class="text-sm text-gray-700">{{ $ingredient }}</span>
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

        </div>
    </section>
    @endif

    {{-- Related Heritage Dishes --}}
    @if($related->count() > 0)
    <section>
        <div class="flex items-center justify-between mb-7">
            <div>
                <p class="text-rust text-xs font-medium italic mb-1">Complete the Experience</p>
                <h2 class="font-serif text-2xl font-bold text-gray-900">Related Heritage Dishes</h2>
            </div>
            <a href="{{ route('menu.index') }}"
               class="flex items-center gap-1 text-sm font-semibold text-brand hover:text-brand-dark transition-colors">
                View Full Menu
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($related as $rel)
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="relative h-44 overflow-hidden">
                    @if($rel->image)
                        <img src="{{ $rel->image }}" alt="{{ $rel->name }}"
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full"
                             style="background: linear-gradient(135deg, #1B3A2D, #3A6B50);"></div>
                    @endif
                    <a href="{{ route('menu.show', $rel->slug) }}" class="absolute inset-0"></a>
                </div>
                <div class="p-4">
                    <div class="flex items-start justify-between mb-2">
                        <h3 class="font-serif font-bold text-gray-900">{{ $rel->name }}</h3>
                        <span class="text-sm font-semibold text-gray-700 ml-2 whitespace-nowrap">Rp {{ number_format($rel->price / 1000, 0) }}k</span>
                    </div>
                    <p class="text-gray-500 text-xs line-clamp-2 mb-4">{{ $rel->description }}</p>
                    <a href="{{ route('menu.show', $rel->slug) }}"
                       class="block w-full text-center py-2 border border-gray-300 rounded text-sm font-medium text-gray-700 hover:border-brand hover:text-brand transition-colors">
                        Select Options
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

</div>

<script>
    function adjustQty(delta) {
        const input = document.getElementById('qty-input');
        const current = parseInt(input.value) || 1;
        const newVal = Math.max(1, Math.min(99, current + delta));
        input.value = newVal;
    }
</script>
@endsection
