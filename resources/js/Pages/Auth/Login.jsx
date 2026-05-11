import { useState } from 'react';
import { Head, Link, useForm } from '@inertiajs/react';
import AuthLayout from '@/Layouts/AuthLayout';

export default function Login() {
    const { data, setData, post, processing, errors } = useForm({
        email: '',
        password: '',
        remember: false,
    });
    const [showPw, setShowPw] = useState(false);

    const submit = (e) => {
        e.preventDefault();
        post('/login');
    };

    return (
        <AuthLayout title="Welcome">
            <div className="flex h-screen">

                {/* Left: hero panel */}
                <div className="hidden lg:flex lg:w-3/5 relative overflow-hidden">
                    <div className="absolute inset-0 z-10"
                         style={{ background: 'linear-gradient(160deg, rgba(20,43,32,0.85) 0%, rgba(27,58,45,0.75) 60%, rgba(0,0,0,0.6) 100%)' }} />
                    <div className="absolute inset-0"
                         style={{
                             backgroundImage: "url('https://images.unsplash.com/photo-1574484284002-952d92456975?w=1400&q=80')",
                             backgroundSize: 'cover',
                             backgroundPosition: 'center',
                         }} />
                    <div className="absolute inset-0 z-0"
                         style={{ background: 'linear-gradient(135deg, #1B3A2D 0%, #142B20 100%)' }} />
                    <div className="relative z-20 flex flex-col justify-end p-12 pb-16 text-white">
                        <p className="text-xs font-semibold tracking-[0.25em] uppercase text-white/50 mb-4">
                            Preserving the Legacy
                        </p>
                        <h1 className="font-serif text-5xl font-bold leading-tight mb-4">
                            Dapoer<br />Nusantara
                        </h1>
                        <div className="w-12 h-0.5 bg-rust mb-5" />
                        <p className="text-white/60 text-sm leading-relaxed max-w-sm">
                            Step back into the archives of Indonesia's culinary heritage. Every flavor tells a story of an archipelago bound by tradition.
                        </p>
                    </div>
                </div>

                {/* Right: form */}
                <div className="w-full lg:w-2/5 flex flex-col items-center justify-center px-8 md:px-14 bg-white relative overflow-y-auto">
                    {/* Decorative icon */}
                    <div className="absolute top-6 right-6 text-gray-100">
                        <svg className="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1}
                                  d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>

                    <div className="w-full max-w-sm">
                        {/* Mobile brand */}
                        <div className="lg:hidden text-center mb-8">
                            <Link href="/menu" className="font-serif text-brand text-2xl font-bold italic">
                                Dapoer Nusantara
                            </Link>
                        </div>

                        <h2 className="font-serif text-4xl font-bold text-gray-900 mb-1">Welcome</h2>
                        <p className="text-gray-500 text-sm mb-8">Continue your journey through the archives.</p>

                        {errors.email && (
                            <div className="bg-red-50 border border-red-200 rounded-lg px-4 py-3 mb-6 text-sm text-red-600">
                                {errors.email}
                            </div>
                        )}

                        <form onSubmit={submit} className="space-y-5">
                            {/* Email */}
                            <div>
                                <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">
                                    Email Address
                                </label>
                                <input
                                    type="email"
                                    value={data.email}
                                    onChange={(e) => setData('email', e.target.value)}
                                    placeholder="name@heritage.com"
                                    className="input-field"
                                    required
                                    autoFocus
                                />
                            </div>

                            {/* Password */}
                            <div>
                                <div className="flex items-center justify-between mb-2">
                                    <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600">
                                        Password
                                    </label>
                                    <a href="#" className="text-xs text-rust hover:text-rust-dark font-medium">
                                        Forgot Password?
                                    </a>
                                </div>
                                <div className="relative">
                                    <input
                                        type={showPw ? 'text' : 'password'}
                                        value={data.password}
                                        onChange={(e) => setData('password', e.target.value)}
                                        placeholder="••••••••"
                                        className="input-field pr-12"
                                        required
                                    />
                                    <button
                                        type="button"
                                        onClick={() => setShowPw(!showPw)}
                                        className="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                                    >
                                        {showPw ? (
                                            <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                            </svg>
                                        ) : (
                                            <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        )}
                                    </button>
                                </div>
                            </div>

                            {/* Remember */}
                            <label className="flex items-center gap-3 cursor-pointer">
                                <input
                                    type="checkbox"
                                    checked={data.remember}
                                    onChange={(e) => setData('remember', e.target.checked)}
                                    className="w-4 h-4 rounded border-gray-300 accent-brand"
                                />
                                <span className="text-sm text-gray-600">Keep me signed in</span>
                            </label>

                            {/* Submit */}
                            <button
                                type="submit"
                                disabled={processing}
                                className="w-full btn-brand py-3.5 rounded-xl text-sm flex items-center justify-center gap-2 disabled:opacity-60"
                            >
                                {processing ? (
                                    <svg className="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
                                        <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                                    </svg>
                                ) : null}
                                Enter the Archive
                                {!processing && (
                                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                )}
                            </button>
                        </form>

                        <p className="text-center text-sm text-gray-500 mt-6">
                            New to the legacy?{' '}
                            <Link href="/register" className="text-rust font-semibold hover:text-rust-dark">
                                Create an Account
                            </Link>
                        </p>

                        <div className="flex items-center gap-4 mt-8">
                            <div className="flex-1 h-px bg-gray-200" />
                            <span className="text-xs text-gray-400 tracking-widest italic">EST. 2024</span>
                            <div className="flex-1 h-px bg-gray-200" />
                        </div>
                    </div>
                </div>
            </div>
        </AuthLayout>
    );
}
