import { Head, Link, router } from '@inertiajs/react';
import AppLayout from '@/Layouts/AppLayout';
import { formatPrice } from '@/utils/format';

function AddToCartBtn({ productId, className = '', children }) {
    const add = () => router.post('/cart/add', { product_id: productId, quantity: 1 }, { preserveScroll: true });
    return (
        <button onClick={add} className={className}>
            {children}
        </button>
    );
}

function ProductImage({ product, className = '' }) {
    const gradients = {
        main: 'linear-gradient(135deg, #1B3A2D, #2D5A45)',
        rice: 'linear-gradient(135deg, #3A5A2D, #5A8A45)',
        sweet: 'linear-gradient(135deg, #8B3A1A, #C4622D)',
        condiment: 'linear-gradient(135deg, #5A1A1A, #8B2D2D)',
    };
    if (product.image) {
        return <img src={product.image} alt={product.name} className={className} />;
    }
    return (
        <div
            className={`w-full h-full flex items-center justify-center ${className}`}
            style={{ background: gradients[product.category] ?? gradients.main }}
        >
            <span className="text-white/15 font-serif text-4xl font-bold select-none">
                {product.name.charAt(0)}
            </span>
        </div>
    );
}

export default function MenuIndex({ featured, riceGrains, sweetArchives }) {
    const sweetFeatured = sweetArchives.find((p) => p.is_featured);
    const sweetOthers   = sweetArchives.filter((p) => !p.is_featured);

    return (
        <AppLayout>
            <Head title="Menu" />

            <div className="max-w-7xl mx-auto px-6 py-12">

                {/* Hero */}
                <div className="mb-14 animate-slide-up">
                    <h1 className="font-serif text-5xl font-bold text-brand leading-tight mb-4 max-w-xl">
                        Authentic Heritage<br />on Your Plate
                    </h1>
                    <p className="text-gray-500 text-sm leading-relaxed max-w-lg">
                        Discover the deep flavors of the Indonesian archipelago. Our curated menu celebrates centuries of
                        culinary traditions, bringing time-honored recipes from local kitchens to your table.
                    </p>
                </div>

                {/* ─── Signature Selection ─── */}
                <section className="mb-16">
                    <div className="flex items-center justify-between mb-7">
                        <h2 className="font-serif text-2xl font-bold text-gray-900">Signature Selection</h2>
                        <span className="section-label">Chef's Recommendations</span>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {featured.map((product) => (
                            <div key={product.id} className="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 group">
                                <div className="flex h-52">
                                    <div className="w-48 flex-shrink-0 overflow-hidden">
                                        <Link href={`/menu/${product.slug}`} className="block h-full">
                                            <ProductImage
                                                product={product}
                                                className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            />
                                        </Link>
                                    </div>
                                    <div className="flex-1 p-5 flex flex-col justify-between">
                                        <div>
                                            {product.region && (
                                                <p className="section-label mb-1">{product.region}</p>
                                            )}
                                            <Link href={`/menu/${product.slug}`}>
                                                <h3 className="font-serif text-xl font-bold text-gray-900 mb-2 leading-tight hover:text-brand transition-colors">
                                                    {product.name}
                                                </h3>
                                            </Link>
                                            <p className="text-gray-500 text-xs leading-relaxed line-clamp-3">{product.description}</p>
                                        </div>
                                        <div className="flex items-center justify-between mt-4">
                                            <span className="font-serif text-xl font-bold text-brand">
                                                {formatPrice(product.price)}
                                            </span>
                                            <AddToCartBtn
                                                productId={product.id}
                                                className="btn-brand flex items-center gap-2 px-4 py-2 rounded-lg text-xs"
                                            >
                                                <svg className="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                                                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                                Add to Cart
                                            </AddToCartBtn>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </section>

                {/* ─── Rice & Grains ─── */}
                <section className="mb-16">
                    <h2 className="font-serif text-2xl font-bold text-gray-900 mb-7">Rice & Grains</h2>

                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {riceGrains.map((product) => (
                            <div key={product.id} className="bg-white rounded-xl overflow-hidden shadow-sm card-hover group">
                                <div className="relative h-44 overflow-hidden">
                                    <Link href={`/menu/${product.slug}`} className="block h-full">
                                        <ProductImage
                                            product={product}
                                            className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        />
                                    </Link>
                                </div>
                                <div className="p-4">
                                    <Link href={`/menu/${product.slug}`}>
                                        <h3 className="font-serif text-lg font-bold text-gray-900 mb-1 hover:text-brand transition-colors">
                                            {product.name}
                                        </h3>
                                    </Link>
                                    <p className="text-gray-500 text-xs leading-relaxed line-clamp-2 mb-4">{product.description}</p>
                                    <div className="flex items-center justify-between">
                                        <span className="font-semibold text-sm text-gray-800">{formatPrice(product.price)}</span>
                                        <AddToCartBtn
                                            productId={product.id}
                                            className="flex items-center gap-1.5 text-xs font-semibold text-brand hover:text-brand-dark transition-colors"
                                        >
                                            <span className="w-5 h-5 border border-brand rounded-full flex items-center justify-center">
                                                <svg className="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2.5} d="M12 4v16m8-8H4" />
                                                </svg>
                                            </span>
                                            Add to Cart
                                        </AddToCartBtn>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </section>

                {/* ─── Sweet Archives ─── */}
                <section className="mb-16">
                    <h2 className="font-serif text-2xl font-bold text-gray-900 mb-7">Sweet Archives</h2>

                    <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {/* Featured sweet */}
                        {sweetFeatured && (
                            <div className="bg-white rounded-xl overflow-hidden shadow-sm group">
                                <div className="relative h-52 overflow-hidden">
                                    <Link href={`/menu/${sweetFeatured.slug}`} className="block h-full">
                                        <ProductImage
                                            product={sweetFeatured}
                                            className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        />
                                    </Link>
                                </div>
                                <div className="p-5">
                                    <Link href={`/menu/${sweetFeatured.slug}`}>
                                        <h3 className="font-serif text-2xl font-bold text-gray-900 mb-2 hover:text-brand transition-colors">
                                            {sweetFeatured.name}
                                        </h3>
                                    </Link>
                                    <p className="text-gray-500 text-sm leading-relaxed mb-4">{sweetFeatured.description}</p>
                                    <div className="flex items-center justify-between">
                                        <span className="font-serif text-2xl font-bold text-rust">{formatPrice(sweetFeatured.price)}</span>
                                        <AddToCartBtn
                                            productId={sweetFeatured.id}
                                            className="px-5 py-2 rounded-lg text-sm font-semibold text-white bg-rust hover:bg-rust-dark transition-colors"
                                        >
                                            Add to Cart
                                        </AddToCartBtn>
                                    </div>
                                </div>
                            </div>
                        )}

                        {/* Other sweets */}
                        <div className="flex flex-col gap-4">
                            {sweetOthers.slice(0, 2).map((product) => (
                                <div key={product.id} className="bg-white rounded-xl overflow-hidden shadow-sm flex h-32 group">
                                    <div className="w-28 flex-shrink-0 overflow-hidden">
                                        <Link href={`/menu/${product.slug}`} className="block h-full">
                                            <ProductImage
                                                product={product}
                                                className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            />
                                        </Link>
                                    </div>
                                    <div className="flex-1 p-4 flex flex-col justify-between">
                                        <div>
                                            <Link href={`/menu/${product.slug}`}>
                                                <h3 className="font-serif font-bold text-gray-900 leading-tight hover:text-brand transition-colors">
                                                    {product.name}
                                                </h3>
                                            </Link>
                                            <p className="text-gray-500 text-xs line-clamp-2 mt-0.5">{product.description}</p>
                                        </div>
                                        <div className="flex items-center justify-between">
                                            <span className="text-sm font-semibold text-rust">{formatPrice(product.price)}</span>
                                            <AddToCartBtn
                                                productId={product.id}
                                                className="w-6 h-6 rounded-full border border-gray-300 hover:border-brand hover:text-brand flex items-center justify-center text-gray-500 transition-colors"
                                            >
                                                <svg className="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2.5} d="M12 4v16m8-8H4" />
                                                </svg>
                                            </AddToCartBtn>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </section>

            </div>
        </AppLayout>
    );
}
