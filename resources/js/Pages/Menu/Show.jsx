import { useState } from 'react';
import { Head, Link, router } from '@inertiajs/react';
import AppLayout from '@/Layouts/AppLayout';
import { formatPrice } from '@/utils/format';

const categoryNames = { main: 'Main Courses', rice: 'Rice & Grains', sweet: 'Sweet Archives', condiment: 'Condiments' };

export default function MenuShow({ product, related }) {
    const [qty, setQty] = useState(1);
    const [adding, setAdding] = useState(false);

    const addToCart = () => {
        setAdding(true);
        router.post('/cart/add', { product_id: product.id, quantity: qty }, {
            preserveScroll: true,
            onFinish: () => setAdding(false),
        });
    };

    return (
        <AppLayout>
            <Head title={product.name} />

            <div className="max-w-7xl mx-auto px-6 py-10">

                {/* Breadcrumb */}
                <nav className="flex items-center gap-2 text-xs text-gray-400 mb-10">
                    {[
                        { label: 'Menu', href: '/menu' },
                        { label: categoryNames[product.category] ?? product.category },
                        { label: product.name },
                    ].map((crumb, i, arr) => (
                        <span key={i} className="flex items-center gap-2">
                            {i > 0 && (
                                <svg className="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                                </svg>
                            )}
                            {crumb.href ? (
                                <Link href={crumb.href} className="hover:text-brand transition-colors">{crumb.label}</Link>
                            ) : (
                                <span className={i === arr.length - 1 ? 'text-gray-600 font-medium' : ''}>{crumb.label}</span>
                            )}
                        </span>
                    ))}
                </nav>

                {/* Product hero */}
                <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-16">

                    {/* Image */}
                    <div className="relative">
                        <div className="rounded-2xl overflow-hidden aspect-square relative">
                            {product.image ? (
                                <img src={product.image} alt={product.name} className="w-full h-full object-cover" />
                            ) : (
                                <div className="w-full h-full flex items-center justify-center"
                                     style={{ background: 'linear-gradient(135deg, #1B3A2D 0%, #2D5A45 50%, #1B3A2D 100%)' }}>
                                    <span className="text-white/10 font-serif text-8xl font-bold select-none">
                                        {product.name.charAt(0)}
                                    </span>
                                </div>
                            )}
                        </div>
                        {/* Floating quote */}
                        <div className="absolute bottom-6 left-6 right-16 bg-white/95 backdrop-blur-sm rounded-xl p-4 shadow-lg">
                            <p className="text-gray-700 text-sm font-light italic leading-relaxed">
                                "The world's most delicious food."
                            </p>
                            <p className="text-gray-400 text-xs mt-1">CNN International 2011, 2017</p>
                        </div>
                    </div>

                    {/* Details */}
                    <div className="flex flex-col justify-center">
                        {product.region && (
                            <p className="text-xs text-gray-400 uppercase tracking-widest mb-2">{product.region}</p>
                        )}

                        <h1 className="font-serif text-4xl font-bold text-gray-900 leading-tight mb-2">
                            {product.name}
                        </h1>

                        {product.subtitle && (
                            <p className="text-rust font-medium italic mb-5">{product.subtitle}</p>
                        )}

                        <div className="flex items-center gap-3 mb-5">
                            <span className="font-serif text-3xl font-bold text-gray-900">
                                {formatPrice(product.price)}
                            </span>
                            {product.original_price && (
                                <span className="text-gray-400 line-through text-lg">
                                    {formatPrice(product.original_price)}
                                </span>
                            )}
                        </div>

                        <p className="text-gray-600 text-sm leading-relaxed mb-8">{product.description}</p>

                        {/* Quantity + Add */}
                        <div className="flex items-center gap-4 mb-5">
                            <span className="text-xs font-semibold uppercase tracking-widest text-gray-700">Quantity</span>
                            <div className="flex items-center border border-gray-200 rounded-xl overflow-hidden">
                                <button onClick={() => setQty(Math.max(1, qty - 1))}
                                        className="w-10 h-10 flex items-center justify-center text-gray-500 hover:bg-gray-50 active:bg-gray-100 transition-colors">
                                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M20 12H4" />
                                    </svg>
                                </button>
                                <span className="w-12 h-10 flex items-center justify-center text-sm font-bold text-gray-900 border-x border-gray-200">
                                    {qty}
                                </span>
                                <button onClick={() => setQty(Math.min(99, qty + 1))}
                                        className="w-10 h-10 flex items-center justify-center text-gray-500 hover:bg-gray-50 active:bg-gray-100 transition-colors">
                                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div className="flex items-center gap-3">
                            <button
                                onClick={addToCart}
                                disabled={adding}
                                className="flex-1 btn-brand py-3.5 rounded-xl text-sm flex items-center justify-center gap-2 disabled:opacity-70"
                            >
                                {adding ? (
                                    <svg className="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
                                        <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                                    </svg>
                                ) : (
                                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                )}
                                {adding ? 'Adding…' : 'Add to Cart'}
                            </button>
                            <button className="w-12 h-12 border border-gray-200 rounded-xl flex items-center justify-center text-gray-400 hover:text-rust hover:border-rust transition-colors">
                                <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                                          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                        </div>

                        {/* Badges */}
                        {(product.heat_level || product.cook_time) && (
                            <div className="flex items-center gap-6 mt-7 pt-7 border-t border-gray-100">
                                {product.heat_level && (
                                    <div className="flex items-center gap-2">
                                        <svg className="w-4 h-4 text-rust" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C8.5 2 6 4.5 6 7c0 2 1 3.5 2.5 4.5C7 13 6 15 6 17c0 2.8 2.2 5 5 5h2c2.8 0 5-2.2 5-5 0-2-1-4-2.5-5.5C17 10.5 18 9 18 7c0-2.5-2.5-5-6-5z" />
                                        </svg>
                                        <div>
                                            <p className="text-xs text-gray-400 uppercase tracking-wider">Heat Level</p>
                                            <p className="text-xs font-semibold text-gray-700">{product.heat_level}</p>
                                        </div>
                                    </div>
                                )}
                                {product.cook_time && (
                                    <div className="flex items-center gap-2">
                                        <svg className="w-4 h-4 text-rust" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>
                                            <p className="text-xs text-gray-400 uppercase tracking-wider">Cook Time</p>
                                            <p className="text-xs font-semibold text-gray-700">{product.cook_time}</p>
                                        </div>
                                    </div>
                                )}
                            </div>
                        )}
                    </div>
                </div>

                {/* Heritage Narrative */}
                {(product.heritage_narrative || product.key_ingredients?.length > 0) && (
                    <section className="mb-16">
                        <div className="grid grid-cols-1 lg:grid-cols-3 gap-10">
                            <div className="lg:col-span-2">
                                <h2 className="font-serif text-2xl font-bold text-gray-900 mb-5">The Heritage Narrative</h2>
                                {product.heritage_narrative?.split('\n\n').map((para, i) => (
                                    <p key={i} className="text-gray-600 text-sm leading-relaxed mb-4">{para}</p>
                                ))}
                            </div>
                            {product.key_ingredients?.length > 0 && (
                                <div>
                                    <div className="bg-cream-dark rounded-2xl p-6">
                                        <h3 className="font-serif text-lg font-bold text-gray-900 mb-5">Key Ingredients</h3>
                                        <ul className="space-y-3">
                                            {product.key_ingredients.map((ing, i) => (
                                                <li key={i} className="flex items-center justify-between py-2 border-b border-gray-200 last:border-0">
                                                    <span className="text-sm text-gray-700">{ing}</span>
                                                    <svg className="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </li>
                                            ))}
                                        </ul>
                                    </div>
                                </div>
                            )}
                        </div>
                    </section>
                )}

                {/* Related */}
                {related.length > 0 && (
                    <section>
                        <div className="flex items-center justify-between mb-7">
                            <div>
                                <p className="section-label mb-1">Complete the Experience</p>
                                <h2 className="font-serif text-2xl font-bold text-gray-900">Related Heritage Dishes</h2>
                            </div>
                            <Link href="/menu" className="flex items-center gap-1 text-sm font-semibold text-brand hover:text-brand-dark transition-colors">
                                View Full Menu
                                <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </Link>
                        </div>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                            {related.map((rel) => (
                                <div key={rel.id} className="bg-white rounded-xl overflow-hidden shadow-sm card-hover group">
                                    <div className="relative h-44 overflow-hidden">
                                        {rel.image ? (
                                            <img src={rel.image} alt={rel.name} className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                                        ) : (
                                            <div className="w-full h-full" style={{ background: 'linear-gradient(135deg, #1B3A2D, #3A6B50)' }} />
                                        )}
                                    </div>
                                    <div className="p-4">
                                        <div className="flex items-start justify-between mb-2">
                                            <h3 className="font-serif font-bold text-gray-900">{rel.name}</h3>
                                            <span className="text-sm font-semibold text-gray-700 ml-2 whitespace-nowrap">
                                                Rp {Math.round(rel.price / 1000)}k
                                            </span>
                                        </div>
                                        <p className="text-gray-500 text-xs line-clamp-2 mb-4">{rel.description}</p>
                                        <Link href={`/menu/${rel.slug}`}
                                              className="block w-full text-center py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:border-brand hover:text-brand transition-colors">
                                            Select Options
                                        </Link>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </section>
                )}

            </div>
        </AppLayout>
    );
}
