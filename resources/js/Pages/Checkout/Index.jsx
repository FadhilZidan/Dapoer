import { useState } from 'react';
import { Head, useForm } from '@inertiajs/react';
import AppLayout from '@/Layouts/AppLayout';
import { formatPrice } from '@/utils/format';

const PAYMENT_METHODS = [
    {
        id: 'card',
        label: 'Credit or Debit Card',
        sub: 'Visa, Mastercard, AMEX',
        icon: (
            <svg className="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                      d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
        ),
    },
    {
        id: 'bank_transfer',
        label: 'Bank Transfer (VA)',
        sub: 'BCA, Mandiri, BNI',
        icon: (
            <svg className="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                      d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
            </svg>
        ),
    },
    {
        id: 'ewallet',
        label: 'E-Wallet',
        sub: 'GoPay, OVO, ShopeePay',
        icon: (
            <svg className="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                      d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
            </svg>
        ),
    },
];

export default function CheckoutIndex({ cart, subtotal, tax, shipping, total }) {
    const { data, setData, post, processing, errors } = useForm({
        full_name: '',
        street_address: '',
        city: '',
        postal_code: '',
        payment_method: 'card',
    });

    const submit = (e) => {
        e.preventDefault();
        post('/checkout');
    };

    return (
        <AppLayout>
            <Head title="Checkout" />

            <div className="max-w-7xl mx-auto px-6 py-10">
                <div className="mb-8">
                    <h1 className="font-serif text-4xl font-bold text-gray-900">Checkout</h1>
                    <p className="text-gray-500 text-sm mt-1">
                        Review your culinary selection and provide delivery details to proceed.
                    </p>
                </div>

                <form onSubmit={submit}>
                    <div className="grid grid-cols-1 lg:grid-cols-5 gap-8">

                        {/* ─── Left: form ─── */}
                        <div className="lg:col-span-3 space-y-8">

                            {/* Shipping */}
                            <div>
                                <h2 className="font-serif text-xl font-bold text-gray-900 flex items-center gap-2 mb-6">
                                    <svg className="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                                              d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8l1.415 8.487A2 2 0 008.397 18h7.206a2 2 0 001.982-1.513L19 8" />
                                    </svg>
                                    Shipping Address
                                </h2>

                                <div className="space-y-4">
                                    <div>
                                        <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Full Name</label>
                                        <input
                                            type="text"
                                            value={data.full_name}
                                            onChange={(e) => setData('full_name', e.target.value)}
                                            placeholder="E.g., Aria Kusuma"
                                            className={`input-field ${errors.full_name ? 'border-red-400' : ''}`}
                                            required
                                        />
                                        {errors.full_name && <p className="text-red-500 text-xs mt-1">{errors.full_name}</p>}
                                    </div>
                                    <div>
                                        <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Street Address</label>
                                        <input
                                            type="text"
                                            value={data.street_address}
                                            onChange={(e) => setData('street_address', e.target.value)}
                                            placeholder="123 Jalan Senopati"
                                            className="input-field"
                                            required
                                        />
                                    </div>
                                    <div className="grid grid-cols-2 gap-4">
                                        <div>
                                            <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">City</label>
                                            <input
                                                type="text"
                                                value={data.city}
                                                onChange={(e) => setData('city', e.target.value)}
                                                placeholder="Jakarta Selatan"
                                                className="input-field"
                                                required
                                            />
                                        </div>
                                        <div>
                                            <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Postal Code</label>
                                            <input
                                                type="text"
                                                value={data.postal_code}
                                                onChange={(e) => setData('postal_code', e.target.value)}
                                                placeholder="12190"
                                                className="input-field"
                                                required
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {/* Payment */}
                            <div>
                                <h2 className="font-serif text-xl font-bold text-gray-900 flex items-center gap-2 mb-6">
                                    <svg className="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                                              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    Payment Method
                                </h2>

                                <div className="space-y-3">
                                    {PAYMENT_METHODS.map((method) => (
                                        <label
                                            key={method.id}
                                            className={`flex items-center justify-between p-4 rounded-xl border-2 cursor-pointer transition-all ${
                                                data.payment_method === method.id
                                                    ? 'border-brand bg-white shadow-sm'
                                                    : 'border-transparent bg-cream-dark hover:border-gray-200'
                                            }`}
                                        >
                                            <div className="flex items-center gap-3">
                                                <div className={`w-5 h-5 rounded-full border-2 flex items-center justify-center transition-colors ${
                                                    data.payment_method === method.id ? 'border-brand' : 'border-gray-300'
                                                }`}>
                                                    {data.payment_method === method.id && (
                                                        <div className="w-2.5 h-2.5 rounded-full bg-brand" />
                                                    )}
                                                </div>
                                                <input
                                                    type="radio"
                                                    name="payment_method"
                                                    value={method.id}
                                                    checked={data.payment_method === method.id}
                                                    onChange={() => setData('payment_method', method.id)}
                                                    className="sr-only"
                                                />
                                                <div>
                                                    <p className="text-sm font-semibold text-gray-900">{method.label}</p>
                                                    <p className="text-xs text-gray-500">{method.sub}</p>
                                                </div>
                                            </div>
                                            {method.icon}
                                        </label>
                                    ))}
                                </div>

                                {/* Card fields */}
                                {data.payment_method === 'card' && (
                                    <div className="mt-4 bg-cream-dark rounded-xl p-5 space-y-4 animate-fade-in">
                                        <div>
                                            <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Card Number</label>
                                            <input type="text" placeholder="0000 0000 0000 0000" maxLength={19}
                                                   className="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:border-brand transition-colors" />
                                        </div>
                                        <div className="grid grid-cols-2 gap-4">
                                            <div>
                                                <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Expiry</label>
                                                <input type="text" placeholder="MM/YY" maxLength={5}
                                                       className="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:border-brand transition-colors" />
                                            </div>
                                            <div>
                                                <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">CVV</label>
                                                <input type="text" placeholder="123" maxLength={4}
                                                       className="w-full px-4 py-3 bg-white border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:border-brand transition-colors" />
                                            </div>
                                        </div>
                                    </div>
                                )}
                            </div>
                        </div>

                        {/* ─── Right: summary ─── */}
                        <div className="lg:col-span-2">
                            <div className="bg-white rounded-2xl p-6 sticky top-24 shadow-sm">
                                <h2 className="font-serif text-xl font-bold text-gray-900 mb-6">Order Summary</h2>

                                <div className="space-y-4 mb-6">
                                    {cart.map((item, i) => (
                                        <div key={i} className="flex gap-3">
                                            <div className="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0">
                                                {item.image ? (
                                                    <img src={item.image} alt={item.name} className="w-full h-full object-cover" />
                                                ) : (
                                                    <div className="w-full h-full" style={{ background: 'linear-gradient(135deg, #1B3A2D, #3A6B50)' }} />
                                                )}
                                            </div>
                                            <div className="flex-1 min-w-0">
                                                <div className="flex items-start justify-between gap-2">
                                                    <p className="text-sm font-semibold text-gray-900 leading-tight">{item.name}</p>
                                                    <p className="text-sm font-semibold text-gray-800 whitespace-nowrap">{formatPrice(item.price)}</p>
                                                </div>
                                                <p className="text-xs text-gray-400 mt-0.5">Qty: {item.quantity}</p>
                                            </div>
                                        </div>
                                    ))}
                                </div>

                                <div className="border-t border-gray-100 pt-4 space-y-2 mb-4">
                                    {[
                                        { label: 'Subtotal', value: subtotal },
                                        { label: 'Tax (11%)', value: tax },
                                        { label: 'Shipping', value: shipping },
                                    ].map(({ label, value }) => (
                                        <div key={label} className="flex justify-between text-sm">
                                            <span className="text-gray-500">{label}</span>
                                            <span className="text-gray-800">{formatPrice(value)}</span>
                                        </div>
                                    ))}
                                </div>

                                <div className="flex justify-between items-center border-t border-gray-100 pt-4 mb-6">
                                    <span className="font-bold text-gray-900">Total</span>
                                    <span className="font-serif text-xl font-bold text-rust">{formatPrice(total)}</span>
                                </div>

                                <button
                                    type="submit"
                                    disabled={processing}
                                    className="w-full btn-brand py-4 rounded-xl text-sm flex items-center justify-center gap-2 disabled:opacity-60"
                                >
                                    {processing && (
                                        <svg className="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                            <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
                                            <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                                        </svg>
                                    )}
                                    {processing ? 'Processing…' : 'Place Order'}
                                </button>

                                <p className="text-center text-xs text-gray-400 mt-3 leading-relaxed">
                                    By placing your order, you agree to our{' '}
                                    <a href="#" className="underline hover:text-brand">Terms</a> and{' '}
                                    <a href="#" className="underline hover:text-brand">Privacy Policy</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
