import { useEffect } from 'react';
import { Link, router } from '@inertiajs/react';
import { formatPrice } from '@/utils/format';

export default function CartDrawer({ open, onClose, cart }) {
    const items = cart?.items ?? [];

    useEffect(() => {
        const onKey = (e) => e.key === 'Escape' && onClose();
        if (open) {
            document.addEventListener('keydown', onKey);
            document.body.style.overflow = 'hidden';
        }
        return () => {
            document.removeEventListener('keydown', onKey);
            document.body.style.overflow = '';
        };
    }, [open, onClose]);

    const updateQty = (id, qty) =>
        router.post('/cart/update', { product_id: id, quantity: qty }, { preserveScroll: true });

    const removeItem = (id) =>
        router.post('/cart/remove', { product_id: id }, { preserveScroll: true });

    return (
        <>
            {/* Backdrop */}
            <div
                onClick={onClose}
                className={`fixed inset-0 bg-black/40 backdrop-blur-sm z-40 transition-opacity duration-300 ${
                    open ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'
                }`}
            />

            {/* Drawer panel */}
            <aside
                className={`fixed right-0 top-0 h-full w-full max-w-sm bg-white z-50 shadow-2xl flex flex-col transform transition-transform duration-300 ease-out ${
                    open ? 'translate-x-0' : 'translate-x-full'
                }`}
            >
                {/* Header */}
                <div className="flex items-center justify-between px-6 py-5 border-b border-gray-100">
                    <div>
                        <h2 className="font-serif font-bold text-gray-900 text-lg">Your Selection</h2>
                        <p className="text-xs text-gray-400 mt-0.5">
                            {cart?.count ?? 0} {cart?.count === 1 ? 'item' : 'items'}
                        </p>
                    </div>
                    <button
                        onClick={onClose}
                        className="w-9 h-9 rounded-full flex items-center justify-center text-gray-400 hover:text-gray-700 hover:bg-gray-100 transition-colors"
                    >
                        <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {/* Items */}
                <div className="flex-1 overflow-y-auto px-6 py-5">
                    {items.length === 0 ? (
                        <div className="flex flex-col items-center justify-center h-full text-center py-12">
                            <div className="w-20 h-20 bg-cream rounded-full flex items-center justify-center mb-5">
                                <svg className="w-9 h-9 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 7H4l1-7z" />
                                </svg>
                            </div>
                            <p className="font-serif font-bold text-gray-600 mb-2">Your cart is empty</p>
                            <p className="text-xs text-gray-400 mb-6 max-w-[180px]">
                                Explore our heritage menu to get started
                            </p>
                            <Link
                                href="/menu"
                                onClick={onClose}
                                className="text-sm font-semibold text-brand hover:text-brand-dark transition-colors flex items-center gap-1"
                            >
                                Browse Menu
                                <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                                </svg>
                            </Link>
                        </div>
                    ) : (
                        <ul className="space-y-5">
                            {items.map((item) => (
                                <li key={item.id} className="flex gap-3 animate-slide-up">
                                    {/* Thumbnail */}
                                    <div className="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                        {item.image ? (
                                            <img src={item.image} alt={item.name} className="w-full h-full object-cover" />
                                        ) : (
                                            <div
                                                className="w-full h-full"
                                                style={{ background: 'linear-gradient(135deg, #1B3A2D, #3A6B50)' }}
                                            />
                                        )}
                                    </div>

                                    {/* Info */}
                                    <div className="flex-1 min-w-0">
                                        <p className="text-sm font-semibold text-gray-900 truncate">{item.name}</p>
                                        <p className="text-sm font-bold text-brand mt-0.5">{formatPrice(item.price)}</p>

                                        <div className="flex items-center gap-3 mt-2">
                                            {/* Qty controls */}
                                            <div className="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                                                <button
                                                    onClick={() => updateQty(item.id, item.quantity - 1)}
                                                    className="w-7 h-7 flex items-center justify-center text-gray-500 hover:bg-gray-50 active:bg-gray-100 transition-colors"
                                                >
                                                    <svg className="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M20 12H4" />
                                                    </svg>
                                                </button>
                                                <span className="w-8 h-7 flex items-center justify-center text-xs font-bold text-gray-900 border-x border-gray-200">
                                                    {item.quantity}
                                                </span>
                                                <button
                                                    onClick={() => updateQty(item.id, item.quantity + 1)}
                                                    className="w-7 h-7 flex items-center justify-center text-gray-500 hover:bg-gray-50 active:bg-gray-100 transition-colors"
                                                >
                                                    <svg className="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 4v16m8-8H4" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <button
                                                onClick={() => removeItem(item.id)}
                                                className="text-xs text-gray-400 hover:text-red-500 transition-colors"
                                            >
                                                Remove
                                            </button>
                                        </div>
                                    </div>

                                    {/* Line total */}
                                    <p className="text-xs font-semibold text-gray-600 whitespace-nowrap pt-0.5">
                                        {formatPrice(item.price * item.quantity)}
                                    </p>
                                </li>
                            ))}
                        </ul>
                    )}
                </div>

                {/* Footer */}
                {items.length > 0 && (
                    <div className="px-6 py-5 border-t border-gray-100 bg-white space-y-3">
                        <div className="flex justify-between items-center">
                            <span className="text-sm text-gray-500">Subtotal</span>
                            <span className="font-bold text-gray-900">{formatPrice(cart?.total ?? 0)}</span>
                        </div>
                        <p className="text-xs text-gray-400">Tax & shipping calculated at checkout</p>
                        <Link
                            href="/checkout"
                            onClick={onClose}
                            className="btn-brand block w-full text-center py-3.5 rounded-xl text-sm"
                        >
                            Proceed to Checkout
                        </Link>
                        <button
                            onClick={onClose}
                            className="block w-full text-center text-sm text-gray-400 hover:text-brand transition-colors py-1"
                        >
                            Continue Shopping
                        </button>
                    </div>
                )}
            </aside>
        </>
    );
}
