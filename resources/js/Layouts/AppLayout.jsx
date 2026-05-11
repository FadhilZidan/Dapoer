import { useState, useEffect } from 'react';
import { usePage } from '@inertiajs/react';
import Navbar from '@/Components/Navbar';
import Footer from '@/Components/Footer';
import CartDrawer from '@/Components/CartDrawer';
import Toast from '@/Components/Toast';

export default function AppLayout({ children }) {
    const { cart, flash } = usePage().props;
    const [cartOpen, setCartOpen] = useState(false);
    const [toast, setToast] = useState(null);

    useEffect(() => {
        if (flash?.success) setToast({ type: 'success', message: flash.success });
        else if (flash?.error) setToast({ type: 'error', message: flash.error });
    }, [flash?.success, flash?.error]);

    return (
        <div className="min-h-screen bg-cream">
            <Navbar onCartClick={() => setCartOpen(true)} />

            <main>{children}</main>

            <Footer />

            <CartDrawer
                open={cartOpen}
                onClose={() => setCartOpen(false)}
                cart={cart}
            />

            {toast && (
                <Toast
                    key={flash?.success || flash?.error}
                    type={toast.type}
                    message={toast.message}
                    onClose={() => setToast(null)}
                />
            )}
        </div>
    );
}
