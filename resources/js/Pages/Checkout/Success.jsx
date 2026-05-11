import { Head, Link } from '@inertiajs/react';
import AppLayout from '@/Layouts/AppLayout';
import { formatPrice } from '@/utils/format';

export default function CheckoutSuccess({ order }) {
    return (
        <AppLayout>
            <Head title="Payment Successful" />

            <div className="min-h-screen bg-cream py-16">
                <div className="max-w-2xl mx-auto px-6 text-center">

                    {/* Success icon */}
                    <div className="flex justify-center mb-6 animate-slide-up">
                        <div className="w-24 h-24 bg-white rounded-2xl shadow-sm flex items-center justify-center">
                            <div className="w-14 h-14 bg-brand rounded-full flex items-center justify-center">
                                <svg className="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2.5} d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <h1 className="font-serif text-4xl font-bold text-gray-900 mb-2">Payment Successful</h1>
                    <p className="text-xs font-semibold tracking-[0.2em] uppercase text-gray-400 mb-10">
                        Order Reference: {order.reference}
                    </p>

                    {/* Order card */}
                    <div className="bg-white rounded-2xl shadow-sm overflow-hidden relative mb-8 text-left">
                        <div className="absolute top-0 right-0 w-20 h-20 rounded-bl-full bg-cream pointer-events-none" />

                        <div className="p-8">
                            <h2 className="font-serif text-2xl font-bold text-gray-900 mb-2">Terima Kasih</h2>
                            <p className="text-gray-500 text-sm leading-relaxed mb-8 max-w-md">
                                Your commitment to preserving the Archipelago's culinary soul is deeply appreciated.
                                We are preparing your selection with the reverence it deserves, ensuring every spice
                                tells its ancient story.
                            </p>

                            <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                                {/* Shipment */}
                                <div>
                                    <p className="text-xs font-bold uppercase tracking-[0.15em] text-gray-400 mb-3">
                                        Shipment Details
                                    </p>
                                    <p className="font-semibold text-gray-900 text-sm">{order.full_name}</p>
                                    <p className="text-gray-600 text-sm">{order.street_address}</p>
                                    <p className="text-gray-600 text-sm">{order.city}, {order.postal_code}</p>
                                </div>

                                {/* Items */}
                                <div>
                                    <p className="text-xs font-bold uppercase tracking-[0.15em] text-gray-400 mb-3">
                                        Provisions Summary
                                    </p>
                                    <div className="space-y-2">
                                        {order.items.map((item) => (
                                            <div key={item.id} className="flex items-center justify-between">
                                                <span className="text-sm text-gray-700">{item.product_name}</span>
                                                <span className="text-sm font-semibold text-gray-800 ml-4">{item.quantity}</span>
                                            </div>
                                        ))}
                                    </div>
                                    <div className="border-t border-gray-100 mt-4 pt-4 flex items-center justify-between">
                                        <span className="text-sm italic text-gray-600">Total Amount</span>
                                        <span className="font-semibold text-gray-900">{formatPrice(order.total)}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Action buttons */}
                    <div className="flex items-center justify-center gap-4 mb-12">
                        <button className="btn-brand flex items-center gap-2 px-6 py-3 rounded-xl text-sm">
                            <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Track Order
                        </button>
                        <Link href="/menu" className="btn-outline flex items-center gap-2 px-6 py-3 rounded-xl text-sm">
                            <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Back to Menu
                        </Link>
                    </div>

                    <p className="text-gray-400 text-sm italic">
                        "A taste of history, delivered to your door."
                    </p>
                </div>
            </div>
        </AppLayout>
    );
}
