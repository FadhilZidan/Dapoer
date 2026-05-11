import { Head } from '@inertiajs/react';

export default function AuthLayout({ title, children }) {
    return (
        <>
            <Head title={title} />
            <div className="h-screen overflow-hidden">{children}</div>
        </>
    );
}
