import { useState } from 'react';
import { Link, usePage, router } from '@inertiajs/react';

export default function Navbar({ onCartClick }) {
    const { auth, cart, url } = usePage().props;
    const [userMenuOpen, setUserMenuOpen] = useState(false);
    const currentUrl = usePage().url;

    const isActive = (path) => currentUrl.startsWith(path);

    const logout = () => {
        router.post('/logout');
        setUserMenuOpen(false);
    };

    return (
        <nav className="bg-white sticky top-0 z-30 shadow-sm">
            <div className="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

                {/* Brand */}
                <Link href="/menu" className="font-serif text-brand text-xl font-bold italic tracking-wide">
                    Dapoer Nusantara
                </Link>

                {/* Nav links */}
                <div className="hidden md:flex items-center gap-8">
                    {[
                        { href: '/menu',     label: 'Menu'     },
                        { href: '/heritage', label: 'Heritage' },
                        { href: '/archives', label: 'Archives' },
                        { href: '/about',    label: 'About'    },
                    ].map(({ href, label }) => (
                        <Link
                            key={href}
                            href={href}
                            className={`text-sm font-medium transition-colors ${
                                isActive(href) ? 'nav-link-active' : 'text-gray-700 hover:text-brand'
                            }`}
                        >
                            {label}
                        </Link>
                    ))}
                </div>

                {/* Right icons */}
                <div className="flex items-center gap-4">
                    {/* Cart button */}
                    <button
                        onClick={onCartClick}
                        className="relative text-gray-600 hover:text-brand transition-colors p-1"
                        aria-label="Open cart"
                    >
                        <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                                  d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 7H4l1-7z" />
                        </svg>
                        {(cart?.count ?? 0) > 0 && (
                            <span className="absolute -top-1 -right-1 bg-brand text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center animate-bounce-once">
                                {cart.count}
                            </span>
                        )}
                    </button>

                    {/* User */}
                    {auth?.user ? (
                        <div className="relative">
                            <button
                                onClick={() => setUserMenuOpen(!userMenuOpen)}
                                className="text-gray-600 hover:text-brand transition-colors p-1 flex items-center gap-1.5"
                            >
                                <div className="w-7 h-7 rounded-full bg-brand flex items-center justify-center">
                                    <span className="text-white text-xs font-bold">
                                        {auth.user.name.charAt(0).toUpperCase()}
                                    </span>
                                </div>
                                <svg className={`w-3 h-3 text-gray-400 transition-transform ${userMenuOpen ? 'rotate-180' : ''}`} fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            {userMenuOpen && (
                                <>
                                    <div className="fixed inset-0 z-10" onClick={() => setUserMenuOpen(false)} />
                                    <div className="absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-xl border border-gray-100 py-1.5 z-20 animate-fade-in">
                                        <div className="px-4 py-2 border-b border-gray-100">
                                            <p className="text-xs font-semibold text-gray-900 truncate">{auth.user.name}</p>
                                            <p className="text-xs text-gray-400 truncate">{auth.user.email}</p>
                                        </div>
                                        <button
                                            onClick={logout}
                                            className="w-full text-left px-4 py-2 text-sm text-gray-700 hover:text-brand hover:bg-cream transition-colors"
                                        >
                                            Sign Out
                                        </button>
                                    </div>
                                </>
                            )}
                        </div>
                    ) : (
                        <Link href="/login" className="text-gray-600 hover:text-brand transition-colors p-1" aria-label="Sign In">
                            <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </Link>
                    )}
                </div>
            </div>
        </nav>
    );
}
