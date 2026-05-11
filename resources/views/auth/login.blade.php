@extends('layouts.auth')
@section('title', 'Welcome')

@section('content')
<div class="flex h-screen">

    {{-- Left Panel: Hero Image --}}
    <div class="hidden lg:flex lg:w-3/5 relative overflow-hidden">
        {{-- Background image with dark green overlay --}}
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-brand/60 to-brand/80 z-10"></div>
        <div class="absolute inset-0"
             style="background-image: url('https://images.unsplash.com/photo-1574484284002-952d92456975?w=1400&q=80'); background-size: cover; background-position: center;">
        </div>

        {{-- Fallback gradient if image fails --}}
        <div class="absolute inset-0 bg-gradient-to-br from-brand-dark via-brand to-black/80 z-0"></div>

        {{-- Left panel content --}}
        <div class="relative z-20 flex flex-col justify-end p-12 pb-16 text-white">
            <p class="text-sm font-light tracking-[0.25em] uppercase text-white/70 mb-4">Preserving the Legacy</p>
            <h1 class="font-serif text-5xl font-bold leading-tight mb-4">
                Dapoer<br>Nusantara
            </h1>
            <div class="w-12 h-0.5 bg-rust mb-6"></div>
            <p class="text-white/70 text-sm font-light max-w-sm leading-relaxed">
                Step back into the archives of Indonesia's culinary heritage. Every flavor tells a story of an archipelago bound by tradition.
            </p>
        </div>
    </div>

    {{-- Right Panel: Login Form --}}
    <div class="w-full lg:w-2/5 flex flex-col items-center justify-center px-8 md:px-14 bg-white relative overflow-y-auto">

        {{-- Decorative utensil icon top right --}}
        <div class="absolute top-6 right-6 text-gray-200">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
        </div>

        <div class="w-full max-w-sm">
            {{-- Logo (mobile only) --}}
            <div class="lg:hidden text-center mb-8">
                <a href="{{ route('menu.index') }}" class="font-serif text-brand text-2xl font-bold italic">Dapoer Nusantara</a>
            </div>

            {{-- Heading --}}
            <h2 class="font-serif text-4xl font-bold text-gray-900 mb-1">Welcome</h2>
            <p class="text-gray-500 text-sm mb-8">Continue your journey through the archives.</p>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 rounded px-4 py-3 mb-6 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded px-4 py-3 mb-6 text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- Login Form --}}
            <form method="POST" action="/login" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">
                        Email Address
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           placeholder="name@heritage.com"
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-colors"
                           required>
                </div>

                {{-- Password --}}
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Password
                        </label>
                        <a href="{{ route('password.request') }}" class="text-xs text-rust hover:text-rust-dark font-medium">Forgot Password?</a>
                    </div>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                               placeholder="••••••••"
                               class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-colors pr-12"
                               required>
                        <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="remember" id="remember"
                           class="w-4 h-4 rounded border-gray-300 text-brand focus:ring-brand accent-brand">
                    <label for="remember" class="text-sm text-gray-600">Keep me signed in</label>
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full btn-brand py-3.5 rounded text-sm font-semibold flex items-center justify-center gap-2 tracking-wide">
                    Enter the Archive
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </button>
            </form>

            {{-- Register link --}}
            <p class="text-center text-sm text-gray-500 mt-6">
                New to the legacy?
                <a href="{{ route('register') }}" class="text-rust font-semibold hover:text-rust-dark">Create an Account</a>
            </p>

            {{-- Divider --}}
            <div class="flex items-center gap-4 mt-8">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-xs text-gray-400 tracking-widest font-light italic">EST. 2024</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>
        </div>
    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
@endsection
