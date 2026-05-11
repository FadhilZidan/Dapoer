@extends('layouts.app')
@section('title', 'About')

@section('styles')
<style>
    .about-hero {
        background: linear-gradient(150deg, #1B3A2D 0%, #142B20 50%, #0D1F17 100%);
    }
    .value-card { transition: all 0.3s ease; }
    .value-card:hover { background-color: #1B3A2D; color: white; }
    .value-card:hover h3, .value-card:hover p { color: inherit; }
    .value-card:hover .value-icon { background: rgba(255,255,255,0.12); }
    .value-card:hover .value-icon svg { color: white; }
    .team-card:hover .team-bg { transform: scale(1.04); }
    .team-bg { transition: transform 0.4s ease; }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -33px;
        top: 6px;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #1B3A2D;
        border: 2px solid #F5F0E8;
        box-shadow: 0 0 0 2px #1B3A2D;
    }
</style>
@endsection

@section('content')

{{-- ============================================================ --}}
{{-- HERO --}}
{{-- ============================================================ --}}
<section class="about-hero text-white overflow-hidden relative">
    <div class="absolute inset-0">
        <div class="absolute top-1/4 right-10 w-80 h-80 rounded-full border border-white/5"></div>
        <div class="absolute top-1/3 right-20 w-52 h-52 rounded-full border border-white/5"></div>
        <div class="absolute bottom-10 left-10 w-60 h-60 rounded-full border border-white/5"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-28 relative z-10">
        <div class="max-w-2xl">
            <p class="text-xs font-semibold tracking-[0.3em] uppercase text-rust mb-5">Our Story</p>
            <h1 class="font-serif text-6xl font-bold leading-none mb-6">
                We Are<br>Custodians,<br><em class="not-italic text-white/50">Not Chefs.</em>
            </h1>
            <div class="w-14 h-0.5 bg-rust mb-7"></div>
            <p class="text-white/60 text-base leading-relaxed">
                Dapoer Nusantara was not founded to create new cuisines. It was founded to <em class="text-white/85 not-italic">protect</em> the ones that already exist — to ensure the recipes of grandmothers are not swallowed by the noise of the modern world.
            </p>
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- MISSION STATEMENT --}}
{{-- ============================================================ --}}
<section class="bg-white py-20 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- Left: Large pull quote --}}
            <div class="relative">
                <div class="absolute -top-4 -left-4 font-serif text-[180px] font-bold text-cream-dark leading-none select-none pointer-events-none">"</div>
                <div class="relative z-10 pl-4">
                    <p class="font-serif text-2xl font-bold text-brand leading-relaxed mb-6 italic">
                        "Every spice in our kitchen has a postcode. Every recipe has a lineage. Every dish has earned the right to be called heritage."
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand flex items-center justify-center">
                            <span class="font-serif text-white font-bold text-sm">DN</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">Budi Santoso</p>
                            <p class="text-xs text-gray-400">Founder, Dapoer Nusantara — 2024</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Mission text --}}
            <div>
                <p class="text-xs font-semibold tracking-[0.25em] uppercase text-rust mb-4">Our Mission</p>
                <h2 class="font-serif text-3xl font-bold text-brand mb-6">Preserving What Matters</h2>
                <div class="space-y-4 text-gray-600 text-sm leading-relaxed">
                    <p>
                        Indonesia is home to over 5,350 traditional dishes — a number that rivals the biodiversity of its rainforests. Yet each decade, dozens of these recipes vanish as the grandmothers who held them pass on without a successor who cared to learn.
                    </p>
                    <p>
                        Dapoer Nusantara was founded in 2024 with a single, uncompromising mandate: to document, prepare, and deliver authentic heritage recipes to Indonesians who believe that knowing where your food comes from is inseparable from knowing who you are.
                    </p>
                    <p>
                        We partner with regional cooks, elderly recipe keepers, agricultural cooperatives, and food historians across the archipelago. We do not adapt recipes for modern palates. We present them as they were given to us — with all their complexity, their heat, their time, and their soul.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- VALUES --}}
{{-- ============================================================ --}}
<section class="max-w-7xl mx-auto px-6 py-20">

    <div class="text-center mb-14">
        <p class="text-xs font-semibold tracking-[0.25em] uppercase text-rust mb-3">What Guides Us</p>
        <h2 class="font-serif text-4xl font-bold text-brand">Our Values</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

        <div class="value-card bg-white rounded-xl p-8 shadow-sm cursor-default group">
            <div class="value-icon w-12 h-12 bg-brand/10 rounded-lg flex items-center justify-center mb-5 transition-all">
                <svg class="w-6 h-6 text-brand transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h3 class="font-serif text-xl font-bold text-gray-900 mb-3 transition-colors">Authenticity First</h3>
            <p class="text-gray-500 text-sm leading-relaxed transition-colors">
                We never take shortcuts. No MSG, no artificial thickeners, no compressed timelines. If a recipe calls for eight hours, we give it eight hours. Heritage is non-negotiable.
            </p>
        </div>

        <div class="value-card bg-brand rounded-xl p-8 shadow-sm cursor-default">
            <div class="value-icon w-12 h-12 bg-white/15 rounded-lg flex items-center justify-center mb-5">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="font-serif text-xl font-bold text-white mb-3">Regional Integrity</h3>
            <p class="text-white/65 text-sm leading-relaxed">
                A Minangkabau Rendang is not a Javanese Rendang. Each regional variation carries its own identity and must be honored as such. We cook each dish in the tradition of its origin, not in the convenience of a unified kitchen.
            </p>
        </div>

        <div class="value-card bg-white rounded-xl p-8 shadow-sm cursor-default group">
            <div class="value-icon w-12 h-12 bg-rust/10 rounded-lg flex items-center justify-center mb-5 transition-all">
                <svg class="w-6 h-6 text-rust transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>
            <h3 class="font-serif text-xl font-bold text-gray-900 mb-3 transition-colors">Community Partnership</h3>
            <p class="text-gray-500 text-sm leading-relaxed transition-colors">
                We pay farmers above market rate, source directly from village cooperatives, and share recipe royalties with the communities that preserved them. Heritage must benefit the people who kept it alive.
            </p>
        </div>

        <div class="value-card bg-cream-dark rounded-xl p-8 shadow-sm cursor-default group">
            <div class="value-icon w-12 h-12 bg-brand/10 rounded-lg flex items-center justify-center mb-5 transition-all">
                <svg class="w-6 h-6 text-brand transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <h3 class="font-serif text-xl font-bold text-gray-900 mb-3 transition-colors">Documentation</h3>
            <p class="text-gray-500 text-sm leading-relaxed transition-colors">
                Every recipe we prepare is also written, photographed, and archived. Our kitchen is also a library. We believe a recipe only truly survives when it exists in both the hands and on the page.
            </p>
        </div>

        <div class="value-card bg-white rounded-xl p-8 shadow-sm cursor-default group">
            <div class="value-icon w-12 h-12 bg-brand/10 rounded-lg flex items-center justify-center mb-5 transition-all">
                <svg class="w-6 h-6 text-brand transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                </svg>
            </div>
            <h3 class="font-serif text-xl font-bold text-gray-900 mb-3 transition-colors">Zero Adaptation</h3>
            <p class="text-gray-500 text-sm leading-relaxed transition-colors">
                We do not "modernize" recipes for mass appeal. Klepon is supposed to be green. Sambal Bajak is supposed to be hot. Es Campur is supposed to be chaotic. We keep it that way.
            </p>
        </div>

        <div class="value-card bg-white rounded-xl p-8 shadow-sm cursor-default group">
            <div class="value-icon w-12 h-12 bg-rust/10 rounded-lg flex items-center justify-center mb-5 transition-all">
                <svg class="w-6 h-6 text-rust transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
            </div>
            <h3 class="font-serif text-xl font-bold text-gray-900 mb-3 transition-colors">Slow Food, Always</h3>
            <p class="text-gray-500 text-sm leading-relaxed transition-colors">
                Speed is the enemy of depth. We prepare in small batches, with attention, using methods unchanged for centuries. We believe the act of cooking slowly is itself an act of cultural preservation.
            </p>
        </div>

    </div>
</section>

{{-- ============================================================ --}}
{{-- TIMELINE --}}
{{-- ============================================================ --}}
<section class="bg-white py-20 px-6">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-14">
            <p class="text-xs font-semibold tracking-[0.25em] uppercase text-rust mb-3">How We Got Here</p>
            <h2 class="font-serif text-4xl font-bold text-brand">Our Journey</h2>
        </div>

        <div class="relative pl-10 border-l-2 border-cream-dark space-y-10">

            @php
            $timeline = [
                [
                    'year' => '1980s',
                    'title' => 'The First Kitchen',
                    'desc' => 'Ibu Siti Rahayu, grandmother of our founder, begins documenting family recipes in a handwritten ledger in her home kitchen in Solo, Central Java. She calls it "Catatan Dapoer" — Notes from the Kitchen.',
                ],
                [
                    'year' => '2001',
                    'title' => 'The Inheritance',
                    'desc' => 'Budi Santoso inherits his grandmother\'s recipe ledger. As a student of food science in Yogyakarta, he begins to understand what those handwritten pages actually mean: they are a primary source of living Indonesian culinary history.',
                ],
                [
                    'year' => '2014',
                    'title' => 'The Research Years',
                    'desc' => 'Over ten years, Budi travels across the archipelago — from the highlands of West Sumatra to the fishing villages of Maluku — interviewing elderly cooks, attending ceremonies, and documenting recipes that had never been written down.',
                ],
                [
                    'year' => '2021',
                    'title' => 'The Founding Vision',
                    'desc' => 'After losing several recipe keepers to age and illness during the pandemic, Budi commits to building an institution that transforms personal kitchens into a national culinary archive. Dapoer Nusantara begins to take shape.',
                ],
                [
                    'year' => '2024',
                    'title' => 'Dapoer Nusantara Opens',
                    'desc' => 'Dapoer Nusantara launches as a premium heritage cuisine delivery service, carrying eleven verified heritage recipes from five Indonesian regions, with a commitment to expand the archive by twenty entries each year.',
                ],
            ];
            @endphp

            @foreach($timeline as $event)
            <div class="timeline-item relative">
                <span class="inline-block text-xs font-bold tracking-widest uppercase text-rust mb-1">{{ $event['year'] }}</span>
                <h3 class="font-serif text-lg font-bold text-gray-900 mb-2">{{ $event['title'] }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $event['desc'] }}</p>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- TEAM --}}
{{-- ============================================================ --}}
<section class="max-w-7xl mx-auto px-6 py-20">

    <div class="text-center mb-14">
        <p class="text-xs font-semibold tracking-[0.25em] uppercase text-rust mb-3">The People</p>
        <h2 class="font-serif text-4xl font-bold text-brand">Meet the Custodians</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        @php
        $team = [
            [
                'name'   => 'Budi Santoso',
                'role'   => 'Founder & Chief Curator',
                'origin' => 'Solo, Central Java',
                'desc'   => 'Food scientist and culinary historian with 20 years of field research across the archipelago.',
                'color1' => '#1B3A2D',
                'color2' => '#2D5A45',
            ],
            [
                'name'   => 'Dewi Rahayu',
                'role'   => 'Head of Recipe Archives',
                'origin' => 'Padang, West Sumatra',
                'desc'   => 'Third-generation Minangkabau cook and keeper of over 80 documented regional recipes.',
                'color1' => '#7B3A1A',
                'color2' => '#C4622D',
            ],
            [
                'name'   => 'I Wayan Karma',
                'role'   => 'Regional Correspondent — Bali',
                'origin' => 'Ubud, Bali',
                'desc'   => 'Balinese ritual cook and cultural anthropologist specializing in ceremonial food practices.',
                'color1' => '#2A3A5A',
                'color2' => '#3A5A8A',
            ],
            [
                'name'   => 'Fatimah Zahra',
                'role'   => 'Sourcing & Farmer Relations',
                'origin' => 'Maluku',
                'desc'   => 'Agricultural liaison who manages our direct relationships with 40+ farmers and spice cooperatives.',
                'color1' => '#3A1A5A',
                'color2' => '#6A3A8A',
            ],
        ];
        @endphp

        @foreach($team as $member)
        <div class="team-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
            <div class="relative h-44 overflow-hidden">
                <div class="team-bg w-full h-full flex items-end justify-end p-4"
                     style="background: linear-gradient(135deg, {{ $member['color1'] }}, {{ $member['color2'] }});">
                    <span class="font-serif text-white/10 text-7xl font-bold leading-none select-none">
                        {{ substr($member['name'], 0, 1) }}
                    </span>
                </div>
                <div class="absolute bottom-3 left-3">
                    <span class="text-xs bg-white/90 text-gray-600 font-medium px-2.5 py-1 rounded-full">
                        {{ $member['origin'] }}
                    </span>
                </div>
            </div>
            <div class="p-5">
                <h3 class="font-serif font-bold text-gray-900 leading-tight">{{ $member['name'] }}</h3>
                <p class="text-xs text-rust font-medium mt-0.5 mb-3">{{ $member['role'] }}</p>
                <p class="text-gray-500 text-xs leading-relaxed">{{ $member['desc'] }}</p>
            </div>
        </div>
        @endforeach

    </div>
</section>

{{-- ============================================================ --}}
{{-- NUMBERS --}}
{{-- ============================================================ --}}
<section class="about-hero py-16 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php
            $numbers = [
                ['value' => '11',   'label' => 'Verified Heritage Recipes'],
                ['value' => '40+',  'label' => 'Partner Farmers & Cooperatives'],
                ['value' => '5',    'label' => 'Indonesian Regions Represented'],
                ['value' => '4',    'label' => 'Generations of Recipe Knowledge'],
            ];
            @endphp
            @foreach($numbers as $num)
            <div>
                <p class="font-serif text-5xl font-bold text-white mb-2">{{ $num['value'] }}</p>
                <p class="text-white/50 text-sm">{{ $num['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================================================ --}}
{{-- CONTACT --}}
{{-- ============================================================ --}}
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="bg-white rounded-2xl p-12 shadow-sm">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="text-xs font-semibold tracking-[0.25em] uppercase text-rust mb-4">Get in Touch</p>
                <h2 class="font-serif text-4xl font-bold text-brand mb-5">We'd Love to<br>Hear From You</h2>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">
                    Whether you have a recipe to share, a partnership proposal, a catering inquiry, or simply want to tell us about the dish your grandmother used to make — our doors (and dapoer) are always open.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <div class="w-8 h-8 bg-cream-dark rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        heritage@dapoernusantara.id
                    </div>
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <div class="w-8 h-8 bg-cream-dark rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        Jl. Senopati No. 14, Kebayoran Baru, Jakarta Selatan
                    </div>
                    <div class="flex items-center gap-3 text-sm text-gray-600">
                        <div class="w-8 h-8 bg-cream-dark rounded flex items-center justify-center">
                            <svg class="w-4 h-4 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        Mon–Sat, 08:00 – 18:00 WIB
                    </div>
                </div>
            </div>

            <form class="space-y-4" onsubmit="return false;">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Name</label>
                        <input type="text" placeholder="Aria Kusuma"
                               class="w-full px-4 py-3 bg-cream-dark border border-transparent rounded text-sm placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-all">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Email</label>
                        <input type="email" placeholder="name@heritage.com"
                               class="w-full px-4 py-3 bg-cream-dark border border-transparent rounded text-sm placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Subject</label>
                    <input type="text" placeholder="I'd like to share a recipe from..."
                           class="w-full px-4 py-3 bg-cream-dark border border-transparent rounded text-sm placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-all">
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Message</label>
                    <textarea rows="4" placeholder="Tell us your story..."
                              class="w-full px-4 py-3 bg-cream-dark border border-transparent rounded text-sm placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-all resize-none"></textarea>
                </div>
                <button type="submit" class="w-full btn-brand py-3.5 rounded text-sm font-semibold">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>

@endsection
