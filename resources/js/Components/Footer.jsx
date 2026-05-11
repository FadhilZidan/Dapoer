import { Link } from '@inertiajs/react';

export default function Footer() {
    return (
        <footer className="bg-white mt-24 border-t border-gray-100 py-8">
            <div className="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
                <Link href="/menu" className="font-serif text-brand text-lg font-bold italic">
                    Dapoer Nusantara
                </Link>
                <p className="text-gray-400 text-sm text-center">
                    © 2024 Dapoer Nusantara. Preserving the Indonesian Culinary Legacy.
                </p>
                <div className="flex items-center gap-6">
                    {['Contact Us', 'Privacy Policy', 'Instagram', 'YouTube'].map((item) => (
                        <a key={item} href="#"
                           className="text-sm text-gray-500 hover:text-brand transition-colors">
                            {item}
                        </a>
                    ))}
                </div>
            </div>
        </footer>
    );
}
