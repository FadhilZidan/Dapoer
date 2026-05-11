@extends('layouts.auth')
@section('title', 'Reset Password')

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
            <p class="text-sm font-light tracking-[0.25em] uppercase text-white/70 mb-4">Set a New Password</p>
            <h1 class="font-serif text-5xl font-bold leading-tight mb-4">
                Dapoer<br>Nusantara
            </h1>
            <div class="w-12 h-0.5 bg-rust mb-6"></div>
            <p class="text-white/70 text-sm font-light max-w-sm leading-relaxed">
                Choose a strong password to protect your access to the culinary archive.
            </p>
        </div>
    </div>

    {{-- Right Panel --}}
    <div class="w-full lg:w-2/5 flex flex-col items-center justify-center px-8 md:px-14 bg-white overflow-y-auto py-10">
        <div class="w-full max-w-sm">

            <div class="lg:hidden text-center mb-8">
                <a href="{{ route('menu.index') }}" class="font-serif text-brand text-2xl font-bold italic">Dapoer Nusantara</a>
            </div>

            <h2 class="font-serif text-4xl font-bold text-gray-900 mb-1">Reset Password</h2>
            <p class="text-gray-500 text-sm mb-8">Enter your new password below.</p>

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded px-4 py-3 mb-6 text-sm text-red-700">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $email) }}"
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-colors"
                           required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">New Password</label>
                    <input type="password" name="password"
                           placeholder="Min. 8 characters"
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-colors"
                           required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation"
                           placeholder="Repeat your password"
                           class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:border-brand focus:bg-white transition-colors"
                           required>
                </div>

                <button type="submit"
                        class="w-full btn-brand py-3.5 rounded text-sm font-semibold flex items-center justify-center gap-2 tracking-wide">
                    Reset Password
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
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
