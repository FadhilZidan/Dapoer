@extends('layouts.app')
@section('title', 'Heritage')

@section('styles')
<style>
    .hero-heritage {
        background: linear-gradient(160deg, #1B3A2D 0%, #142B20 60%, #0D1F17 100%);
    }
    .pillar-card:hover { transform: translateY(-4px); }
    .pillar-card { transition: transform 0.3s ease; }
    .region-card:hover .region-overlay { opacity: 1; }
    .region-overlay { transition: opacity 0.3s ease; }
    .story-img:hover img { transform: scale(1.04); }
    .story-img img { transition: transform 0.5s ease; }
</style>
@endsection

@section('content')

{{-- ============================================================ --}}
{{-- HERO --}}
{{-- ============================================================ --}}
<section class="hero-heritage text-white py-28 px-6 relative overflow-hidden">
    {{-- Decorative rings --}}
    <div class="absolute top-0 right-0 w-96 h-96 rounded-full border border-white/5 translate-x-1/3 -translate-y-1/3"></div>
    <div class="absolute top-0 right-0 w-64 h-64 rounded-full border border-white/5 translate-x-1/4 -translate-y-1/4"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full border border-white/5 -translate-x-1/3 translate-y-1/3"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="max-w-3xl">
            <p class="text-xs font-semibold tracking-[0.3em] uppercase text-rust mb-5">The Living Archive</p>
            <h1 class="font-serif text-6xl font-bold leading-tight mb-6">
                Where Every<br>
                Spice Tells<br>
                <em class="not-italic text-white/60">a Story</em>
            </h1>
            <div class="w-14 h-0.5 bg-rust mb-7"></div>
            <p class="text-white/65 text-base leading-relaxed max-w-xl">
                Indonesian cuisine is not merely food — it is a living manuscript written over three thousand years
                of trade, migration, ceremony, and community. Each dish is a chapter, each spice a word, each
                kitchen a library that refuses to be forgotten.
            </p>
        </div>

        {{-- Stats --}}
        <div class="flex flex-wrap gap-16 mt-16 pt-12 border-t border-white/10">
            <div>
                <p class="font-serif text-4xl font-bold text-white">17,000+</p>
                <p class="text-white/50 text-sm mt-1">Islands of Flavor</p>
            </div>
            <div>
                <p class="font-serif text-4xl font-bold text-white">300+</p>
                <p class="text-white/50 text-sm mt-1">Ethnic Culinary Traditions</p>
            </div>
            <div>
                <p class="font-serif text-4xl font-bold text-white">3,000</p>
                <p class="text-white/50 text-sm mt-1">Years of Spice History</p>
            </div>
            <div>
                <p class="font-serif text-4xl font-bold text-white">4</p>
                <p class="text-white/50 text-sm mt-1">Generations of Recipes</p>
            </div>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- FOUR PILLARS --}}
{{-- ============================================================ --}}
<section class="max-w-7xl mx-auto px-6 py-20">

    <div class="text-center mb-14">
        <p class="text-xs font-semibold tracking-[0.25em] uppercase text-rust mb-3">Our Philosophy</p>
        <h2 class="font-serif text-4xl font-bold text-brand">The Four Pillars of Heritage</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

        {{-- Pillar 1: Provenance --}}
        <div class="pillar-card bg-white rounded-xl p-7 shadow-sm">
            <div class="w-12 h-12 bg-brand/10 rounded-lg flex items-center justify-center mb-5">
                <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <h3 class="font-serif text-lg font-bold text-gray-900 mb-3">Provenance</h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                Every ingredient is traced back to its origin — the volcanic soils of Java, the highland forests of Sumatra, the coral reefs of Maluku. We know where our spices are born.
            </p>
        </div>

        {{-- Pillar 2: Patience --}}
        <div class="pillar-card bg-brand rounded-xl p-7 shadow-sm">
            <div class="w-12 h-12 bg-white/15 rounded-lg flex items-center justify-center mb-5">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="font-serif text-lg font-bold text-white mb-3">Patience</h3>
            <p class="text-white/65 text-sm leading-relaxed">
                Heritage cannot be rushed. Our Rendang cooks for eight hours. Our Semur simmers through the night. We honor the ancient truth that great flavor demands time.
            </p>
        </div>

        {{-- Pillar 3: Community --}}
        <div class="pillar-card bg-white rounded-xl p-7 shadow-sm">
            <div class="w-12 h-12 bg-rust/10 rounded-lg flex items-center justify-center mb-5">
                <svg class="w-6 h-6 text-rust" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <h3 class="font-serif text-lg font-bold text-gray-900 mb-3">Community</h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                Indonesian food is never eaten alone. From the communal feasts of Minangkabau to the shared rice tables of Bali, cuisine here is the language of belonging.
            </p>
        </div>

        {{-- Pillar 4: Continuity --}}
        <div class="pillar-card bg-cream-dark rounded-xl p-7 shadow-sm">
            <div class="w-12 h-12 bg-brand/10 rounded-lg flex items-center justify-center mb-5">
                <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h3 class="font-serif text-lg font-bold text-gray-900 mb-3">Continuity</h3>
            <p class="text-gray-500 text-sm leading-relaxed">
                We are custodians, not inventors. Our mission is to receive these recipes faithfully from the generation before, and pass them forward — unchanged and undiminished.
            </p>
        </div>

    </div>
</section>

{{-- ============================================================ --}}
{{-- FEATURED HERITAGE STORIES --}}
{{-- ============================================================ --}}
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-end justify-between mb-12">
            <div>
                <p class="text-xs font-semibold tracking-[0.25em] uppercase text-rust mb-3">Living Narratives</p>
                <h2 class="font-serif text-4xl font-bold text-brand">Heritage Stories</h2>
            </div>
            <a href="{{ route('archives') }}"
               class="hidden md:flex items-center gap-2 text-sm font-semibold text-brand hover:text-brand-dark transition-colors">
                View Full Archive
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        {{-- Story cards --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Story 1: Rendang --}}
            <article class="group">
                <div class="story-img overflow-hidden rounded-xl mb-5 aspect-[4/3] relative">
                    <div class="w-full h-full flex items-end justify-end p-5"
                         style="background: linear-gradient(135deg, #1B3A2D 0%, #2D5A45 60%, #4A8060 100%);">
                        <span class="text-white/15 font-serif text-7xl font-bold leading-none select-none">01</span>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-rust text-white text-xs font-semibold px-3 py-1 rounded-full">West Sumatra</span>
                    </div>
                </div>
                <p class="text-xs font-semibold tracking-widest uppercase text-gray-400 mb-2">Main Course · Beef</p>
                <h3 class="font-serif text-xl font-bold text-gray-900 mb-3 group-hover:text-brand transition-colors">
                    The Philosophy of Rendang: Patience as a Culinary Virtue
                </h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">
                    Originating from the Minangkabau highlands, Rendang is more than a dish — it is a meditation on patience. The eight-hour process of transforming liquid coconut milk into a dark, caramelized crust mirrors the Minangkabau philosophy of <em>Musyawarah</em>: wisdom achieved through deliberation.
                </p>
                <a href="{{ route('menu.show', 'rendang-daging-sapi') }}"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-rust hover:text-rust-dark transition-colors">
                    Read the Full Story
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </article>

            {{-- Story 2: Tumpeng --}}
            <article class="group">
                <div class="story-img overflow-hidden rounded-xl mb-5 aspect-[4/3] relative">
                    <div class="w-full h-full flex items-end justify-end p-5"
                         style="background: linear-gradient(135deg, #7B5E2A 0%, #C4921A 60%, #D4A820 100%);">
                        <span class="text-white/15 font-serif text-7xl font-bold leading-none select-none">02</span>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-rust text-white text-xs font-semibold px-3 py-1 rounded-full">Java</span>
                    </div>
                </div>
                <p class="text-xs font-semibold tracking-widest uppercase text-gray-400 mb-2">Ritual · Rice</p>
                <h3 class="font-serif text-xl font-bold text-gray-900 mb-3 group-hover:text-brand transition-colors">
                    Tumpeng: The Mountain That Feeds a Nation's Spirit
                </h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">
                    The conical shape of Nasi Tumpeng is no accident — it mirrors Mount Merapi, the sacred volcano at the heart of Javanese cosmology. When a Tumpeng is cut, the apex is offered first to the most respected guest, a gesture of gratitude that binds earth, community, and the divine.
                </p>
                <a href="{{ route('menu.show', 'nasi-kuning-tumpeng') }}"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-rust hover:text-rust-dark transition-colors">
                    Read the Full Story
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </article>

            {{-- Story 3: Klepon --}}
            <article class="group">
                <div class="story-img overflow-hidden rounded-xl mb-5 aspect-[4/3] relative">
                    <div class="w-full h-full flex items-end justify-end p-5"
                         style="background: linear-gradient(135deg, #1A4A2A 0%, #2E7D40 60%, #4CAF65 100%);">
                        <span class="text-white/15 font-serif text-7xl font-bold leading-none select-none">03</span>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-rust text-white text-xs font-semibold px-3 py-1 rounded-full">Java & Bali</span>
                    </div>
                </div>
                <p class="text-xs font-semibold tracking-widest uppercase text-gray-400 mb-2">Dessert · Sweet</p>
                <h3 class="font-serif text-xl font-bold text-gray-900 mb-3 group-hover:text-brand transition-colors">
                    Klepon: The Secret Hidden Inside Every Jade Pearl
                </h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">
                    Klepon's hidden liquid palm sugar is a metaphor embedded in Javanese culture: the sweetest things in life are not visible from the outside. This beloved kueh has been made in Javanese and Balinese households for centuries, its pandan-green color drawn from the suji leaf, a plant sacred to ritual kitchens.
                </p>
                <a href="{{ route('menu.show', 'klepon-pandan') }}"
                   class="inline-flex items-center gap-1.5 text-sm font-semibold text-rust hover:text-rust-dark transition-colors">
                    Read the Full Story
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </article>

        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- REGIONS OF FLAVOR --}}
{{-- ============================================================ --}}
<section class="max-w-7xl mx-auto px-6 py-20">

    <div class="text-center mb-12">
        <p class="text-xs font-semibold tracking-[0.25em] uppercase text-rust mb-3">The Archipelago's Table</p>
        <h2 class="font-serif text-4xl font-bold text-brand mb-4">Regions of Flavor</h2>
        <p class="text-gray-500 text-sm max-w-xl mx-auto">
            Indonesia's culinary identity cannot be reduced to a single taste. Each of its major islands has developed a cuisine as distinct as its language, shaped by local agriculture, religion, trade routes, and climate.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

        @php
        $regions = [
            [
                'name'    => 'Sumatra',
                'tagline' => 'Bold, Fiery & Complex',
                'desc'    => 'The volcanic soils of Sumatra yield some of Indonesia\'s most intense flavors. Padang cuisine — anchored by Rendang, Gulai, and Soto Padang — is distinguished by its rich coconut-based curries and uncompromising heat.',
                'dishes'  => ['Rendang Daging', 'Gulai Kambing', 'Soto Padang', 'Ayam Pop'],
                'color1'  => '#8B1A1A',
                'color2'  => '#C42D2D',
            ],
            [
                'name'    => 'Java',
                'tagline' => 'Sweet, Refined & Ceremonial',
                'desc'    => 'Javanese cuisine is characterized by a gentle sweetness — the hallmark of kecap manis — balanced against earthy spices. It is a cuisine of ceremony, from the sacred Tumpeng to the everyday Nasi Uduk.',
                'dishes'  => ['Nasi Kuning Tumpeng', 'Nasi Uduk Betawi', 'Sate Ayam Madura', 'Gado Gado'],
                'color1'  => '#1B3A2D',
                'color2'  => '#2D6B48',
            ],
            [
                'name'    => 'Bali',
                'tagline' => 'Sacred, Aromatic & Layered',
                'desc'    => 'Balinese cuisine is inseparable from its Hindu spiritual tradition. Every major dish — the ceremonial Babi Guling, the fragrant Bebek Betutu — is first prepared as an offering before it reaches the table.',
                'dishes'  => ['Babi Guling', 'Bebek Betutu', 'Sate Lilit', 'Lawar'],
                'color1'  => '#7B3A1A',
                'color2'  => '#C4622D',
            ],
            [
                'name'    => 'Sulawesi',
                'tagline' => 'Oceanic, Smoky & Primal',
                'desc'    => 'The Bugis and Makassar peoples of Sulawesi are legendary seafarers, and their cuisine reflects the ocean\'s generosity. Coto Makassar, Pallubasa, and the celebrated Konro ribs define a cuisine of exceptional depth.',
                'dishes'  => ['Coto Makassar', 'Konro Bakar', 'Pallubasa', 'Ikan Bakar Manado'],
                'color1'  => '#1A2B5A',
                'color2'  => '#2D4A8B',
            ],
            [
                'name'    => 'Maluku',
                'tagline' => 'Spice Islands, Pure & Ancient',
                'desc'    => 'The Maluku Islands were the original Spice Islands — the destination that drove the Age of Exploration. Cloves, nutmeg, and mace from these islands once commanded prices higher than gold. Their cuisine is history on a plate.',
                'dishes'  => ['Ikan Kuah Kuning', 'Papeda', 'Kohu-Kohu', 'Sagu Lempeng'],
                'color1'  => '#2A5A3A',
                'color2'  => '#3A8A5A',
            ],
            [
                'name'    => 'Kalimantan',
                'tagline' => 'Forest, River & Earthen',
                'desc'    => 'The cuisine of Borneo draws from the ancient forests and great rivers of Kalimantan. Dayak culinary traditions use ingredients sourced entirely from jungle and river — rare, wild, and deeply rooted in the land.',
                'dishes'  => ['Soto Banjar', 'Amplang', 'Nasi Kuning Banjar', 'Lontong Orari'],
                'color1'  => '#3A2A1A',
                'color2'  => '#6B4A2A',
            ],
        ];
        @endphp

        @foreach($regions as $region)
        <div class="region-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow group cursor-default">
            {{-- Color band --}}
            <div class="h-2" style="background: linear-gradient(90deg, {{ $region['color1'] }}, {{ $region['color2'] }});"></div>
            <div class="p-6">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <h3 class="font-serif text-xl font-bold text-gray-900">{{ $region['name'] }}</h3>
                        <p class="text-xs text-rust font-medium italic mt-0.5">{{ $region['tagline'] }}</p>
                    </div>
                    <svg class="w-5 h-5 text-gray-300 group-hover:text-brand transition-colors mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <p class="text-gray-500 text-sm leading-relaxed mb-5">{{ $region['desc'] }}</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($region['dishes'] as $dish)
                    <span class="text-xs bg-cream px-3 py-1 rounded-full text-gray-600 font-medium">{{ $dish }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>

{{-- ============================================================ --}}
{{-- QUOTE BANNER --}}
{{-- ============================================================ --}}
<section class="hero-heritage py-20 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <svg class="w-10 h-10 text-rust mx-auto mb-6 opacity-70" fill="currentColor" viewBox="0 0 24 24">
            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
        </svg>
        <blockquote class="font-serif text-3xl font-bold text-white/90 leading-relaxed mb-6 italic">
            "To cook is to remember. To eat is to belong. To share is to preserve what matters most about who we are."
        </blockquote>
        <p class="text-white/40 text-sm tracking-widest uppercase">Dapoer Nusantara — Founding Philosophy</p>
    </div>
</section>

{{-- ============================================================ --}}
{{-- CTA: EXPLORE MENU --}}
{{-- ============================================================ --}}
<section class="max-w-7xl mx-auto px-6 py-20 text-center">
    <h2 class="font-serif text-3xl font-bold text-brand mb-4">Taste the Heritage Yourself</h2>
    <p class="text-gray-500 text-sm mb-8 max-w-md mx-auto">
        Every dish on our menu carries a story centuries in the making. Explore our curated selection and order your piece of the archipelago's culinary soul.
    </p>
    <a href="{{ route('menu.index') }}"
       class="inline-flex items-center gap-2 btn-brand px-8 py-4 rounded text-sm font-semibold">
        Explore the Menu
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
        </svg>
    </a>
</section>

@endsection
