@extends('layouts.app')
@section('title', 'Archives')

@section('styles')
<style>
    .archive-hero {
        background-color: #1B3A2D;
        background-image:
            radial-gradient(circle at 20% 80%, rgba(196,98,45,0.12) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255,255,255,0.04) 0%, transparent 50%);
    }
    .archive-card { transition: transform 0.25s ease, box-shadow 0.25s ease; }
    .archive-card:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(0,0,0,0.09); }
    .tab-btn.active { background-color: #1B3A2D; color: white; }
    .tab-btn { transition: all 0.2s; }
    .card-image-block { transition: transform 0.4s ease; }
    .archive-card:hover .card-image-block { transform: scale(1.04); }
</style>
@endsection

@section('content')

{{-- ============================================================ --}}
{{-- HERO --}}
{{-- ============================================================ --}}
<section class="archive-hero text-white py-24 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="text-xs font-semibold tracking-[0.3em] uppercase text-rust mb-5">The Culinary Library</p>
                <h1 class="font-serif text-5xl font-bold leading-tight mb-6">
                    The Living<br>Archives of<br><em class="not-italic text-white/55">Nusantara</em>
                </h1>
                <div class="w-14 h-0.5 bg-rust mb-7"></div>
                <p class="text-white/60 text-sm leading-relaxed max-w-md">
                    A carefully curated collection of recipes, stories, and culinary wisdom passed down through generations. Each entry is both a dish and a document — a living record of Indonesia's gastronomic soul.
                </p>
            </div>

            {{-- Archive counts --}}
            <div class="grid grid-cols-2 gap-4">
                @php
                    $categoryCounts = [
                        ['label' => 'Main Courses',    'count' => $byCategory['main']->count(),      'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                        ['label' => 'Rice & Grains',   'count' => $byCategory['rice']->count(),      'icon' => 'M3 10h18M3 6h18M3 14h18M3 18h18'],
                        ['label' => 'Sweet Archives',  'count' => $byCategory['sweet']->count(),     'icon' => 'M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z'],
                        ['label' => 'Condiments',      'count' => $byCategory['condiment']->count(), 'icon' => 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z'],
                    ];
                @endphp
                @foreach($categoryCounts as $cat)
                <div class="bg-white/8 rounded-xl p-5 border border-white/10">
                    <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-4 h-4 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $cat['icon'] }}"/>
                        </svg>
                    </div>
                    <p class="font-serif text-3xl font-bold text-white">{{ $cat['count'] }}</p>
                    <p class="text-white/50 text-xs mt-1">{{ $cat['label'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- FILTER TABS + ARCHIVE GRID --}}
{{-- ============================================================ --}}
<section class="max-w-7xl mx-auto px-6 py-16">

    {{-- Filter tabs --}}
    <div class="flex flex-wrap gap-2 mb-10" id="filter-tabs">
        <button onclick="filterArchive('all')" data-filter="all"
                class="tab-btn active px-5 py-2 rounded-full text-sm font-semibold border border-brand">
            All Entries
        </button>
        <button onclick="filterArchive('main')" data-filter="main"
                class="tab-btn px-5 py-2 rounded-full text-sm font-semibold border border-gray-200 text-gray-600 hover:border-brand hover:text-brand">
            Main Courses
        </button>
        <button onclick="filterArchive('rice')" data-filter="rice"
                class="tab-btn px-5 py-2 rounded-full text-sm font-semibold border border-gray-200 text-gray-600 hover:border-brand hover:text-brand">
            Rice & Grains
        </button>
        <button onclick="filterArchive('sweet')" data-filter="sweet"
                class="tab-btn px-5 py-2 rounded-full text-sm font-semibold border border-gray-200 text-gray-600 hover:border-brand hover:text-brand">
            Sweet Archives
        </button>
        <button onclick="filterArchive('condiment')" data-filter="condiment"
                class="tab-btn px-5 py-2 rounded-full text-sm font-semibold border border-gray-200 text-gray-600 hover:border-brand hover:text-brand">
            Condiments
        </button>
    </div>

    {{-- Archive count line --}}
    <p class="text-xs text-gray-400 mb-8 font-medium tracking-wide">
        Showing <span id="entry-count">{{ $allProducts->count() }}</span> entries
    </p>

    {{-- Product Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="archive-grid">
        @foreach($allProducts as $product)
        <article class="archive-card bg-white rounded-xl overflow-hidden shadow-sm"
                 data-category="{{ $product->category->slug ?? '' }}">

            {{-- Image --}}
            <div class="relative h-52 overflow-hidden">
                @if($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                         class="card-image-block w-full h-full object-cover">
                @else
                    @php
                        $gradients = [
                            'main'      => 'linear-gradient(135deg, #1B3A2D, #2D5A45)',
                            'rice'      => 'linear-gradient(135deg, #3A5A2D, #5A8A45)',
                            'sweet'     => 'linear-gradient(135deg, #8B3A1A, #C4622D)',
                            'condiment' => 'linear-gradient(135deg, #5A1A1A, #8B2D2D)',
                        ];
                        $grad = $gradients[$product->category->slug ?? ''] ?? 'linear-gradient(135deg, #1B3A2D, #3A6B50)';
                    @endphp
                    <div class="card-image-block w-full h-full flex items-center justify-center"
                         style="background: {{ $grad }};">
                        <span class="text-white/10 font-serif text-5xl font-bold">
                            {{ substr($product->name, 0, 1) }}
                        </span>
                    </div>
                @endif

                {{-- Category badge --}}
                @php
                    $categoryLabels = [
                        'main'      => 'Main Course',
                        'rice'      => 'Rice & Grains',
                        'sweet'     => 'Sweet Archive',
                        'condiment' => 'Condiment',
                    ];
                @endphp
                <div class="absolute top-3 left-3">
                    <span class="bg-white/90 backdrop-blur-sm text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $categoryLabels[$product->category->slug ?? ''] ?? ($product->category->name ?? '') }}
                    </span>
                </div>

                {{-- Featured badge --}}
                @if($product->is_featured)
                <div class="absolute top-3 right-3">
                    <span class="bg-rust text-white text-xs font-semibold px-3 py-1 rounded-full">
                        Signature
                    </span>
                </div>
                @endif
            </div>

            {{-- Content --}}
            <div class="p-5">
                {{-- Region + heat --}}
                <div class="flex items-center justify-between mb-2">
                    @if($product->region)
                        <p class="text-xs font-medium text-rust uppercase tracking-wider">{{ $product->region }}</p>
                    @endif
                    @if($product->heat_level)
                        <div class="flex items-center gap-1">
                            <svg class="w-3 h-3 text-orange-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C8.5 2 6 4.5 6 7c0 2 1 3.5 2.5 4.5C7 13 6 15 6 17c0 2.8 2.2 5 5 5h2c2.8 0 5-2.2 5-5 0-2-1-4-2.5-5.5C17 10.5 18 9 18 7c0-2.5-2.5-5-6-5z"/>
                            </svg>
                            <span class="text-xs text-gray-400">{{ $product->heat_level }}</span>
                        </div>
                    @endif
                </div>

                <h3 class="font-serif text-lg font-bold text-gray-900 mb-2 leading-tight">
                    {{ $product->name }}
                </h3>

                @if($product->subtitle)
                <p class="text-xs text-gray-400 italic mb-3">{{ $product->subtitle }}</p>
                @endif

                <p class="text-gray-500 text-xs leading-relaxed line-clamp-2 mb-4">{{ $product->description }}</p>

                {{-- Footer: price + actions --}}
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <span class="font-serif font-bold text-gray-900">{{ $product->formatted_price }}</span>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('menu.show', $product->slug) }}"
                           class="text-xs font-semibold text-brand border border-brand px-3 py-1.5 rounded hover:bg-brand hover:text-white transition-all">
                            Read More
                        </a>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit"
                                    class="w-7 h-7 bg-brand rounded flex items-center justify-center hover:bg-brand-dark transition-colors">
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
    </div>

</section>

{{-- ============================================================ --}}
{{-- NEWSLETTER / LEGACY SUBSCRIPTION --}}
{{-- ============================================================ --}}
<section class="bg-cream-dark py-16 px-6">
    <div class="max-w-xl mx-auto text-center">
        <p class="text-xs font-semibold tracking-[0.25em] uppercase text-rust mb-3">The Heritage Dispatch</p>
        <h2 class="font-serif text-3xl font-bold text-brand mb-4">Receive Stories From the Archive</h2>
        <p class="text-gray-500 text-sm leading-relaxed mb-8">
            Each fortnight, we send a letter from the archive — one dish, its history, its region, and the family that kept it alive. No promotions. Only heritage.
        </p>
        <form class="flex gap-3 max-w-md mx-auto" onsubmit="return false;">
            <input type="email" placeholder="name@heritage.com"
                   class="flex-1 px-4 py-3 bg-white border border-gray-200 rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand transition-colors">
            <button type="submit" class="btn-brand px-5 py-3 rounded text-sm font-semibold whitespace-nowrap">
                Subscribe
            </button>
        </form>
    </div>
</section>

@endsection

@section('scripts')
<script>
    function filterArchive(category) {
        const cards = document.querySelectorAll('#archive-grid article');
        const tabs = document.querySelectorAll('.tab-btn');
        let count = 0;

        // Update tabs
        tabs.forEach(tab => {
            tab.classList.remove('active');
            if (tab.dataset.filter === category) tab.classList.add('active');
        });

        // Filter cards
        cards.forEach(card => {
            const match = category === 'all' || card.dataset.category === category;
            card.style.display = match ? '' : 'none';
            if (match) count++;
        });

        document.getElementById('entry-count').textContent = count;
    }
</script>
@endsection
