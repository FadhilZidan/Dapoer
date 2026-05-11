@extends('layouts.auth')
@section('title', 'Forgot Password')

@section('content')
<div class="flex h-screen">

    {{-- Left Panel --}}
    <div class="hidden lg:flex lg:w-3/5 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-brand/60 to-brand/80 z-10"></div>
        <div class="absolute inset-0"
             style="background-image: url('https://images.unsplash.com/photo-1574484284002-952d92456975?w=1400&q=80'); background-size: cover; background-position: center;">
        </div>
        <div class="absolute inset-0 bg-gradient-to-br from-brand-dark via-brand to-black/80 z-0"></div>
        <div class="relative z-20 flex flex-col justify-end p-12 pb-16 text-white">
            <p class="text-sm font-light tracking-[0.25em] uppercase text-white/70 mb-4">Recover Your Access</p>
            <h1 class="font-serif text-5xl font-bold leading-tight mb-4">
                Dapoer<br>Nusantara
            </h1>
            <div class="w-12 h-0.5 bg-rust mb-6"></div>
            <p class="text-white/70 text-sm font-light max-w-sm leading-relaxed">
                We'll send a password reset link to your email address so you can regain access to the archive.
            </p>
        </div>
    </div>

    {{-- Right Panel --}}
    <div class="w-full lg:w-2/5 flex flex-col items-center justify-center px-8 md:px-14 bg-white overflow-y-auto py-10">
        <div class="w-full max-w-sm">

            <div class="lg:hidden text-center mb-8">
                <a href="{{ route('menu.index') }}" class="font-serif text-brand text-2xl font-bold italic">Dapoer Nusantara</a>
            </div>

            <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-xs text-gray-400 hover:text-brand mb-8 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Sign In
            </a>

            <h2 class="font-serif text-4xl font-bold text-gray-900 mb-1">Forgot Password</h2>
            <p class="text-gray-500 text-sm mb-8">Enter your email and we'll send you a reset link.</p>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 rounded px-4 py-3 mb-6 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded px-4 py-3 mb-6 text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           placeholder="name@heritage.com"
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-colors"
                           required autofocus>
                </div>

                <button type="submit"
                        class="w-full btn-brand py-3.5 rounded text-sm font-semibold flex items-center justify-center gap-2 tracking-wide">
                    Send Reset Link
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </button>
            </form>

            <div class="flex items-center gap-4 mt-8">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-xs text-gray-400 tracking-widest font-light italic">EST. 2024</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>
        </div>
    </div>
</div>
@endsection
