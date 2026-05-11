@extends('layouts.app')
@section('title', 'Payment Successful')

@section('styles')
<style>
    .success-page { background-color: #F5F0E8; }
</style>
@endsection

@section('content')
<div class="success-page min-h-screen py-16">
    <div class="max-w-2xl mx-auto px-6 text-center">

        {{-- Success Icon --}}
        <div class="flex justify-center mb-6">
            <div class="w-24 h-24 bg-white rounded-2xl shadow-sm flex items-center justify-center">
                <div class="w-14 h-14 bg-brand rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Heading --}}
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Payment Successful</h1>
        <p class="text-xs font-semibold tracking-[0.2em] uppercase text-gray-400 mb-10">
            Order Reference: {{ $order->reference }}
        </p>

        {{-- Order Details Card --}}
        <div class="bg-white rounded-xl shadow-sm overflow-hidden relative mb-8">

            {{-- Decorative corner --}}
            <div class="absolute top-0 right-0 w-20 h-20 rounded-bl-full"
                 style="background: #F5F0E8;"></div>

            <div class="p-8 text-left">
                <h2 class="font-serif text-2xl font-bold text-gray-900 mb-2">Terima Kasih</h2>
                <p class="text-gray-500 text-sm leading-relaxed mb-8 max-w-md">
                    Your commitment to preserving the Archipelago's culinary soul is deeply appreciated.
                    We are preparing your selection with the reverence it deserves, ensuring every spice tells its ancient story.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    {{-- Shipment Details --}}
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.15em] text-gray-400 mb-3">Shipment Details</p>
                        <p class="font-semibold text-gray-900 text-sm">{{ $order->full_name }}</p>
                        <p class="text-gray-600 text-sm">{{ $order->street_address }}</p>
                        <p class="text-gray-600 text-sm">{{ $order->city }}, {{ $order->postal_code }}</p>
                    </div>

                    {{-- Provisions Summary --}}
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.15em] text-gray-400 mb-3">Provisions Summary</p>
                        <div class="space-y-2">
                            @foreach($order->items as $item)
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-700">{{ $item->product_name }}</span>
                                <span class="text-sm font-semibold text-gray-800 ml-4">{{ $item->quantity }}</span>
                            </div>
                            @endforeach
                        </div>
                        <div class="border-t border-gray-100 mt-4 pt-4 flex items-center justify-between">
                            <span class="text-sm italic text-gray-600">Total Amount</span>
                            <span class="font-semibold text-gray-900">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex items-center justify-center gap-4 mb-12">
            <a href="#"
               class="flex items-center gap-2 px-6 py-3 btn-brand rounded text-sm font-semibold">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Track Order
            </a>
            <a href="{{ route('menu.index') }}"
               class="flex items-center gap-2 px-6 py-3 btn-outline rounded text-sm font-semibold">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Back to Menu
            </a>
        </div>

        {{-- Quote --}}
        <p class="text-gray-400 text-sm italic">
            "A taste of history, delivered to your door."
        </p>

    </div>
</div>
@endsection
