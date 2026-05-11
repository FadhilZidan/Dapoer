import { Head, Link, useForm } from '@inertiajs/react';
import AuthLayout from '@/Layouts/AuthLayout';

export default function Register() {
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post('/register');
    };

    return (
        <AuthLayout title="Create Account">
            <div className="flex h-screen">
                {/* Left panel */}
                <div className="hidden lg:flex lg:w-3/5 relative overflow-hidden">
                    <div className="absolute inset-0 z-10"
                         style={{ background: 'linear-gradient(160deg, rgba(20,43,32,0.85) 0%, rgba(27,58,45,0.75) 60%, rgba(0,0,0,0.6) 100%)' }} />
                    <div className="absolute inset-0"
                         style={{
                             backgroundImage: "url('https://images.unsplash.com/photo-1574484284002-952d92456975?w=1400&q=80')",
                             backgroundSize: 'cover', backgroundPosition: 'center',
                         }} />
                    <div className="absolute inset-0 z-0"
                         style={{ background: 'linear-gradient(135deg, #1B3A2D 0%, #142B20 100%)' }} />
                    <div className="relative z-20 flex flex-col justify-end p-12 pb-16 text-white">
                        <p className="text-xs font-semibold tracking-[0.25em] uppercase text-white/50 mb-4">Join the Legacy</p>
                        <h1 className="font-serif text-5xl font-bold leading-tight mb-4">Dapoer<br />Nusantara</h1>
                        <div className="w-12 h-0.5 bg-rust mb-5" />
                        <p className="text-white/60 text-sm leading-relaxed max-w-sm">
                            Become part of a community that honors Indonesia's culinary heritage. Your journey begins here.
                        </p>
                    </div>
                </div>

                {/* Right: form */}
                <div className="w-full lg:w-2/5 flex flex-col items-center justify-center px-8 md:px-14 bg-white overflow-y-auto py-10">
                    <div className="w-full max-w-sm">
                        <div className="lg:hidden text-center mb-8">
                            <Link href="/menu" className="font-serif text-brand text-2xl font-bold italic">Dapoer Nusantara</Link>
                        </div>

                        <h2 className="font-serif text-4xl font-bold text-gray-900 mb-1">Create Account</h2>
                        <p className="text-gray-500 text-sm mb-8">Begin your journey through the archives.</p>

                        {Object.values(errors).length > 0 && (
                            <div className="bg-red-50 border border-red-200 rounded-lg px-4 py-3 mb-6 text-sm text-red-600">
                                {Object.values(errors)[0]}
                            </div>
                        )}

                        <form onSubmit={submit} className="space-y-5">
                            <div>
                                <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Full Name</label>
                                <input type="text" value={data.name} onChange={(e) => setData('name', e.target.value)}
                                       placeholder="E.g., Aria Kusuma" className="input-field" required autoFocus />
                            </div>
                            <div>
                                <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Email Address</label>
                                <input type="email" value={data.email} onChange={(e) => setData('email', e.target.value)}
                                       placeholder="name@heritage.com" className="input-field" required />
                            </div>
                            <div>
                                <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Password</label>
                                <input type="password" value={data.password} onChange={(e) => setData('password', e.target.value)}
                                       placeholder="Min. 8 characters" className="input-field" required />
                            </div>
                            <div>
                                <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Confirm Password</label>
                                <input type="password" value={data.password_confirmation}
                                       onChange={(e) => setData('password_confirmation', e.target.value)}
                                       placeholder="Repeat your password" className="input-field" required />
                            </div>

                            <button type="submit" disabled={processing}
                                    className="w-full btn-brand py-3.5 rounded-xl text-sm flex items-center justify-center gap-2 disabled:opacity-60">
                                {processing && (
                                    <svg className="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
                                        <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                                    </svg>
                                )}
                                Enter the Archive
                                {!processing && (
                                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                )}
                            </button>
                        </form>

                        <p className="text-center text-sm text-gray-500 mt-6">
                            Already have an account?{' '}
                            <Link href="/login" className="text-rust font-semibold hover:text-rust-dark">Sign In</Link>
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
