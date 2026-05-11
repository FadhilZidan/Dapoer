<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dapoer Nusantara') — Authentic Heritage Cuisine</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,900;1,400;1,600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#1B3A2D',
                        'brand-dark': '#142B20',
                        rust: '#C4622D',
                        'rust-dark': '#A8441A',
                        cream: '#F5F0E8',
                        'cream-dark': '#EDE8DF',
                        'cream-card': '#EDEBE5',
                    },
                    fontFamily: {
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        body { background-color: #F5F0E8; font-family: 'Inter', system-ui, sans-serif; }
        .font-serif, h1, h2, h3 { font-family: 'Playfair Display', Georgia, serif; }
        input, select, textarea, button { font-family: 'Inter', system-ui, sans-serif; }
        .nav-link-active { color: #C4622D; border-bottom: 2px solid #C4622D; padding-bottom: 2px; }
        .product-card:hover .product-card-img { transform: scale(1.05); }
        .product-card-img { transition: transform 0.4s ease; }
        .btn-brand { background-color: #1B3A2D; color: white; transition: background-color 0.2s; }
        .btn-brand:hover { background-color: #142B20; }
        .btn-outline { border: 1.5px solid #1B3A2D; color: #1B3A2D; background: transparent; transition: all 0.2s; }
        .btn-outline:hover { background-color: #1B3A2D; color: white; }
    </style>
    @yield('styles')
</head>
<body class="min-h-screen">

    {{-- Navigation --}}
    <nav class="bg-white sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            {{-- Brand --}}
            <a href="{{ route('menu.index') }}"
               class="font-serif text-brand text-xl font-bold italic tracking-wide">
                Dapoer Nusantara
            </a>

            {{-- Nav Links --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('menu.index') }}"
                   class="text-sm font-medium {{ request()->routeIs('menu.*') ? 'nav-link-active' : 'text-gray-700 hover:text-brand' }} transition-colors">
                    Menu
                </a>
                <a href="{{ route('heritage') }}"
                   class="text-sm font-medium {{ request()->routeIs('heritage') ? 'nav-link-active' : 'text-gray-700 hover:text-brand' }} transition-colors">
                    Heritage
                </a>
                <a href="{{ route('archives') }}"
                   class="text-sm font-medium {{ request()->routeIs('archives') ? 'nav-link-active' : 'text-gray-700 hover:text-brand' }} transition-colors">
                    Archives
                </a>
                <a href="{{ route('about') }}"
                   class="text-sm font-medium {{ request()->routeIs('about') ? 'nav-link-active' : 'text-gray-700 hover:text-brand' }} transition-colors">
                    About
                </a>
            </div>

            {{-- Icons --}}
            <div class="flex items-center gap-4">
                {{-- Search --}}
                <button class="text-gray-600 hover:text-brand transition-colors" aria-label="Search">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                {{-- Cart --}}
                <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-brand transition-colors relative" aria-label="Cart">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 7H4l1-7z"/>
                    </svg>
                    @php $cartCount = array_sum(array_column(session('cart', []), 'quantity')); @endphp
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-brand text-white text-xs w-4 h-4 rounded-full flex items-center justify-center font-medium">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                {{-- User --}}
                @auth
                    <div class="relative group">
                        <button class="text-gray-600 hover:text-brand transition-colors" aria-label="Account">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-2 w-40 bg-white rounded shadow-lg border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all py-1">
                            <span class="block px-4 py-2 text-sm text-gray-600 border-b border-gray-100">{{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:text-brand hover:bg-cream">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-brand transition-colors" aria-label="Sign In">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-brand/10 border border-brand/20 text-brand text-sm px-6 py-3 text-center">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 text-sm px-6 py-3 text-center">
            {{ session('error') }}
        </div>
    @endif

    {{-- Page Content --}}
    @yield('content')

    {{-- Footer --}}
    <footer class="bg-white mt-24 border-t border-gray-100 py-8">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <a href="{{ route('menu.index') }}" class="font-serif text-brand text-lg font-bold italic">Dapoer Nusantara</a>
            <p class="text-gray-400 text-sm">© 2024 Dapoer Nusantara. Preserving the Indonesian Culinary Legacy.</p>
            <div class="flex items-center gap-6">
                <a href="#" class="text-sm text-gray-500 hover:text-brand transition-colors">Contact Us</a>
                <a href="#" class="text-sm text-gray-500 hover:text-brand transition-colors">Privacy Policy</a>
                <a href="#" class="text-sm text-gray-500 hover:text-brand transition-colors">Instagram</a>
                <a href="#" class="text-sm text-gray-500 hover:text-brand transition-colors">YouTube</a>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
