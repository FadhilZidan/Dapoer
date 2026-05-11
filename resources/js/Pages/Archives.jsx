import { useState } from 'react';
import { Head, Link, router } from '@inertiajs/react';
import AppLayout from '@/Layouts/AppLayout';
import { formatPrice, categoryLabel } from '@/utils/format';

const FILTERS = [
    { id: 'all', label: 'All' },
    { id: 'main', label: 'Main Courses' },
    { id: 'rice', label: 'Rice & Grains' },
    { id: 'sweet', label: 'Sweet Archives' },
    { id: 'condiment', label: 'Condiments' },
];

function ProductCard({ product }) {
    const [adding, setAdding] = useState(false);

    const addToCart = () => {
        setAdding(true);
        router.post('/cart/add', { product_id: product.id, quantity: 1 }, {
            preserveScroll: true,
            onFinish: () => setAdding(false),
        });
    };

    return (
        <div className="bg-white rounded-2xl overflow-hidden shadow-sm card-hover group flex flex-col">
            <div className="relative h-52 overflow-hidden flex-shrink-0">
                <Link href={`/menu/${product.slug}`} className="block h-full">
                    {product.image ? (
                        <img src={product.image} alt={product.name}
                             className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    ) : (
                        <div className="w-full h-full group-hover:scale-105 transition-transform duration-500"
                             style={{ background: 'linear-gradient(135deg, #1B3A2D, #3A6B50)' }}>
                            <div className="w-full h-full flex items-center justify-center">
                                <span className="text-white/10 font-serif text-6xl font-bold select-none">
                                    {product.name.charAt(0)}
                                </span>
                            </div>
                        </div>
                    )}
                </Link>
                <div className="absolute top-3 left-3">
                    <span className="px-3 py-1 rounded-full text-xs font-semibold bg-white/90 text-gray-600 backdrop-blur-sm">
                        {categoryLabel(product.category)}
                    </span>
                </div>
                {product.is_featured && (
                    <div className="absolute top-3 right-3">
                        <span className="px-3 py-1 rounded-full text-xs font-semibold bg-rust text-white">
                            Featured
                        </span>
                    </div>
                )}
            </div>

            <div className="p-5 flex flex-col flex-1">
                {product.region && (
                    <p className="text-xs text-gray-400 uppercase tracking-widest mb-1">{product.region}</p>
                )}
                <Link href={`/menu/${product.slug}`}>
                    <h3 className="font-serif text-lg font-bold text-gray-900 mb-1 hover:text-brand transition-colors leading-tight">
                        {product.name}
                    </h3>
                </Link>
                {product.subtitle && (
                    <p className="text-rust text-xs italic mb-2">{product.subtitle}</p>
                )}
                <p className="text-gray-500 text-xs leading-relaxed line-clamp-2 mb-4 flex-1">{product.description}</p>

                <div className="flex items-center justify-between mt-auto">
                    <div>
                        <span className="font-serif text-lg font-bold text-gray-900">{formatPrice(product.price)}</span>
                        {product.original_price && (
                            <span className="text-gray-400 line-through text-xs ml-2">{formatPrice(product.original_price)}</span>
                        )}
                    </div>
                    <button
                        onClick={addToCart}
                        disabled={adding}
                        className="w-9 h-9 rounded-xl bg-brand text-white flex items-center justify-center hover:bg-brand-dark transition-colors disabled:opacity-60"
                    >
                        {adding ? (
                            <svg className="w-3.5 h-3.5 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4" />
                                <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                            </svg>
                        ) : (
                            <svg className="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2.5} d="M12 4v16m8-8H4" />
                            </svg>
                        )}
                    </button>
                </div>
            </div>
        </div>
    );
}

export default function Archives({ products }) {
    const [activeFilter, setActiveFilter] = useState('all');
    const [search, setSearch] = useState('');

    const filtered = products.filter((p) => {
        const matchesCategory = activeFilter === 'all' || p.category === activeFilter;
        const matchesSearch = search === '' ||
            p.name.toLowerCase().includes(search.toLowerCase()) ||
            (p.description && p.description.toLowerCase().includes(search.toLowerCase()));
        return matchesCategory && matchesSearch;
    });

    return (
        <AppLayout>
            <Head title="Archives" />

            {/* Hero */}
            <section className="bg-brand py-20 relative overflow-hidden">
                <div className="absolute inset-0 opacity-10"
                     style={{
                         backgroundImage: `repeating-linear-gradient(0deg, rgba(255,255,255,0.5) 0px, rgba(255,255,255,0.5) 1px, transparent 1px, transparent 40px),
                                           repeating-linear-gradient(90deg, rgba(255,255,255,0.5) 0px, rgba(255,255,255,0.5) 1px, transparent 1px, transparent 40px)`,
                     }} />
                <div className="relative max-w-7xl mx-auto px-6">
                    <div className="max-w-2xl animate-slide-up">
                        <p className="text-xs font-semibold tracking-[0.3em] uppercase text-rust mb-4">Complete Collection</p>
                        <h1 className="font-serif text-5xl font-bold text-white leading-tight mb-4">
                            The Culinary<br />Archives
                        </h1>
                        <p className="text-white/60 text-sm leading-relaxed">
                            Browse our complete collection of heritage Indonesian dishes, sourced from the four corners of the archipelago.
                            Every recipe has a story. Every flavor has a history.
                        </p>
                    </div>
                </div>
            </section>

            {/* Filter & Search Bar */}
            <div className="bg-white border-b border-gray-100 sticky top-16 z-30 shadow-sm">
                <div className="max-w-7xl mx-auto px-6 py-4 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                    {/* Filter tabs */}
                    <div className="flex items-center gap-2 flex-wrap">
                        {FILTERS.map((f) => (
                            <button
                                key={f.id}
                                onClick={() => setActiveFilter(f.id)}
                                className={`px-4 py-1.5 rounded-full text-xs font-semibold transition-all duration-200 ${
                                    activeFilter === f.id
                                        ? 'bg-brand text-white shadow-sm'
                                        : 'bg-cream text-gray-600 hover:bg-cream-dark'
                                }`}
                            >
                                {f.label}
                            </button>
                        ))}
                    </div>

                    {/* Search */}
                    <div className="sm:ml-auto relative">
                        <svg className="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input
                            type="text"
                            value={search}
                            onChange={(e) => setSearch(e.target.value)}
                            placeholder="Search the archives…"
                            className="pl-9 pr-4 py-2 bg-cream border border-transparent rounded-xl text-sm focus:outline-none focus:border-brand transition-colors w-56"
                        />
                    </div>
                </div>
            </div>

            {/* Grid */}
            <section className="bg-cream py-14 min-h-[60vh]">
                <div className="max-w-7xl mx-auto px-6">
                    {filtered.length > 0 ? (
                        <>
                            <p className="text-xs text-gray-400 uppercase tracking-widest mb-8">
                                {filtered.length} {filtered.length === 1 ? 'Record' : 'Records'} Found
                            </p>
                            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                {filtered.map((product) => (
                                    <ProductCard key={product.id} product={product} />
                                ))}
                            </div>
                        </>
                    ) : (
                        <div className="text-center py-24">
                            <div className="w-20 h-20 bg-white rounded-2xl shadow-sm flex items-center justify-center mx-auto mb-6">
                                <svg className="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                                          d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 className="font-serif text-xl font-bold text-gray-700 mb-2">No records found</h3>
                            <p className="text-gray-400 text-sm">Try adjusting your search or filter.</p>
                            <button
                                onClick={() => { setActiveFilter('all'); setSearch(''); }}
                                className="mt-5 text-brand text-sm font-semibold hover:underline"
                            >
                                Clear filters
                            </button>
                        </div>
                    )}
                </div>
            </section>

            {/* Newsletter */}
            <section className="bg-white py-20">
                <div className="max-w-2xl mx-auto px-6 text-center">
                    <p className="section-label mb-4">Stay Connected</p>
                    <h2 className="font-serif text-3xl font-bold text-gray-900 mb-4">The Heritage Dispatch</h2>
                    <p className="text-gray-500 text-sm leading-relaxed mb-8">
                        Receive stories from the archives, seasonal recipes, and new additions to our collection. No noise — only heritage.
                    </p>
                    <div className="flex gap-3 max-w-md mx-auto">
                        <input
                            type="email"
                            placeholder="your@archive.com"
                            className="flex-1 input-field"
                        />
                        <button className="btn-brand px-6 py-3 rounded-xl text-sm whitespace-nowrap">
                            Subscribe
                        </button>
                    </div>
                    <p className="text-gray-400 text-xs mt-3">
                        No spam. Unsubscribe anytime.
                    </p>
                </div>
            </section>
        </AppLayout>
    );
}
