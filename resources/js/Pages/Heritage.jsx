import { Head, Link } from '@inertiajs/react';
import AppLayout from '@/Layouts/AppLayout';

const PILLARS = [
    {
        icon: (
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                      d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        ),
        title: 'Ancient Recipes',
        desc: 'Recipes passed down through generations, preserved in handwritten manuscripts and the hands of grandmothers across the archipelago.',
    },
    {
        icon: (
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                      d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        ),
        title: '17,000 Islands',
        desc: 'From Sabang to Merauke, each island contributes its unique flavors, techniques, and stories to the grand tapestry of Indonesian cuisine.',
    },
    {
        icon: (
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        ),
        title: 'Spice Routes',
        desc: 'The Spice Islands drew traders from across the world. Their influence shaped not only our flavors but the entire course of world history.',
    },
    {
        icon: (
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5}
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        ),
        title: 'Living Traditions',
        desc: 'Food is ceremony. From birth to marriage to harvest, Indonesian cuisine is woven into the fabric of communal life and ritual.',
    },
];

const STORIES = [
    {
        region: 'Java',
        title: 'The Philosophy of Rendang',
        body: 'Born in the highlands of West Sumatra among the Minangkabau people, rendang is more than a dish — it is a philosophy. The long, slow cooking process represents patience and perseverance, while the rich spice blend embodies the cultural complexity of the people who created it.',
        year: '16th Century',
        gradient: 'linear-gradient(135deg, #1B3A2D, #2D5A45)',
    },
    {
        region: 'Bali',
        title: 'Nasi Goreng: A Nation\'s Staple',
        body: 'What began as a practical solution — frying leftover rice to prevent waste — became the defining comfort food of a nation. Each region adapted it, adding local spices and proteins, until this simple dish became a canvas of the archipelago\'s diversity.',
        year: 'Ancient Origins',
        gradient: 'linear-gradient(135deg, #8B3A1A, #C4622D)',
    },
    {
        region: 'Sulawesi',
        title: 'The Sacred Spice Trade',
        body: 'Long before Europeans arrived, Maluku\'s nutmeg and cloves were worth their weight in gold. Arab and Chinese traders navigated thousands of miles for these precious commodities, transforming small island kingdoms into centers of world trade and cultural exchange.',
        year: '7th Century',
        gradient: 'linear-gradient(135deg, #2D3A5A, #4A5A8A)',
    },
];

const REGIONS = [
    { name: 'Sumatra', label: 'Bold & Spicy', color: '#1B3A2D' },
    { name: 'Java', label: 'Sweet & Complex', color: '#3A5A1A' },
    { name: 'Bali', label: 'Sacred & Aromatic', color: '#8B3A1A' },
    { name: 'Sulawesi', label: 'Fresh & Seafood', color: '#2D3A5A' },
    { name: 'Maluku', label: 'Spice Origins', color: '#5A1A3A' },
    { name: 'Papua', label: 'Wild & Pure', color: '#3A2D1A' },
];

export default function Heritage() {
    return (
        <AppLayout>
            <Head title="Heritage" />

            {/* Hero */}
            <section className="relative min-h-[70vh] flex items-end overflow-hidden">
                <div className="absolute inset-0 z-0" style={{ background: 'linear-gradient(135deg, #0D1F16 0%, #1B3A2D 50%, #142B20 100%)' }} />
                <div className="absolute inset-0 z-10 opacity-20"
                     style={{
                         backgroundImage: `repeating-linear-gradient(45deg, rgba(196,98,45,0.3) 0px, rgba(196,98,45,0.3) 1px, transparent 1px, transparent 60px),
                                           repeating-linear-gradient(-45deg, rgba(196,98,45,0.15) 0px, rgba(196,98,45,0.15) 1px, transparent 1px, transparent 60px)`,
                     }} />

                <div className="relative z-20 max-w-7xl mx-auto px-6 pb-20 pt-32 w-full">
                    <div className="max-w-3xl animate-slide-up">
                        <p className="text-xs font-semibold tracking-[0.3em] uppercase text-rust mb-5">Culinary Archives</p>
                        <h1 className="font-serif text-6xl md:text-7xl font-bold text-white leading-none mb-6">
                            A Thousand<br />
                            <span className="text-rust italic">Years</span> of Flavor
                        </h1>
                        <p className="text-white/60 text-lg leading-relaxed max-w-xl">
                            The Indonesian kitchen is one of humanity's greatest living archives.
                            Every dish is a document, every spice a story, every bite a journey through centuries of civilization.
                        </p>
                    </div>

                    {/* Stats */}
                    <div className="flex flex-wrap gap-12 mt-16 border-t border-white/10 pt-12">
                        {[
                            { value: '5,350+', label: 'Documented Recipes' },
                            { value: '34', label: 'Provinces' },
                            { value: '300+', label: 'Ethnic Groups' },
                            { value: '3,000+', label: 'Years of History' },
                        ].map(({ value, label }) => (
                            <div key={label}>
                                <p className="font-serif text-3xl font-bold text-white">{value}</p>
                                <p className="text-white/40 text-xs uppercase tracking-widest mt-1">{label}</p>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Four Pillars */}
            <section className="bg-cream py-20">
                <div className="max-w-7xl mx-auto px-6">
                    <div className="text-center mb-14">
                        <p className="section-label mb-3">Foundations</p>
                        <h2 className="font-serif text-4xl font-bold text-gray-900">The Four Pillars of Heritage</h2>
                    </div>
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        {PILLARS.map((pillar) => (
                            <div key={pillar.title} className="bg-white rounded-2xl p-7 shadow-sm hover:shadow-md transition-all duration-300 group">
                                <div className="w-12 h-12 bg-brand/10 rounded-xl flex items-center justify-center text-brand mb-5 group-hover:bg-brand group-hover:text-white transition-all duration-300">
                                    {pillar.icon}
                                </div>
                                <h3 className="font-serif text-lg font-bold text-gray-900 mb-3">{pillar.title}</h3>
                                <p className="text-gray-500 text-sm leading-relaxed">{pillar.desc}</p>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Heritage Stories */}
            <section className="bg-white py-20">
                <div className="max-w-7xl mx-auto px-6">
                    <div className="mb-14">
                        <p className="section-label mb-3">Chronicles</p>
                        <h2 className="font-serif text-4xl font-bold text-gray-900">Heritage Stories</h2>
                    </div>
                    <div className="space-y-6">
                        {STORIES.map((story, i) => (
                            <div key={i} className={`flex flex-col ${i % 2 === 1 ? 'lg:flex-row-reverse' : 'lg:flex-row'} rounded-2xl overflow-hidden shadow-sm`}>
                                <div className="lg:w-2/5 h-64 lg:h-auto flex-shrink-0 flex items-center justify-center p-12"
                                     style={{ background: story.gradient }}>
                                    <div className="text-center">
                                        <p className="text-white/50 text-xs uppercase tracking-widest mb-2">{story.region}</p>
                                        <p className="font-serif text-5xl font-bold text-white/20">{story.year}</p>
                                    </div>
                                </div>
                                <div className="flex-1 p-10 bg-cream-dark flex flex-col justify-center">
                                    <p className="text-xs font-semibold tracking-[0.2em] uppercase text-rust mb-3">{story.region}</p>
                                    <h3 className="font-serif text-2xl font-bold text-gray-900 mb-4">{story.title}</h3>
                                    <p className="text-gray-600 text-sm leading-relaxed">{story.body}</p>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Regions of Flavor */}
            <section className="bg-cream py-20">
                <div className="max-w-7xl mx-auto px-6">
                    <div className="text-center mb-14">
                        <p className="section-label mb-3">Geography</p>
                        <h2 className="font-serif text-4xl font-bold text-gray-900">Regions of Flavor</h2>
                        <p className="text-gray-500 text-sm mt-3 max-w-lg mx-auto">
                            Each region of the archipelago has developed a distinct culinary identity shaped by climate, trade, and culture.
                        </p>
                    </div>
                    <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                        {REGIONS.map((region) => (
                            <div key={region.name}
                                 className="rounded-2xl p-6 text-center cursor-pointer hover:scale-105 transition-transform duration-300 shadow-sm"
                                 style={{ background: region.color }}>
                                <p className="font-serif text-lg font-bold text-white mb-1">{region.name}</p>
                                <p className="text-white/50 text-xs">{region.label}</p>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Quote Banner */}
            <section className="py-24 relative overflow-hidden"
                     style={{ background: 'linear-gradient(135deg, #1B3A2D 0%, #142B20 100%)' }}>
                <div className="absolute inset-0 opacity-5"
                     style={{
                         backgroundImage: `radial-gradient(circle at 20% 50%, #C4622D 0%, transparent 50%),
                                           radial-gradient(circle at 80% 50%, #C4622D 0%, transparent 50%)`,
                     }} />
                <div className="relative max-w-4xl mx-auto px-6 text-center">
                    <svg className="w-12 h-12 text-rust/40 mx-auto mb-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                    </svg>
                    <blockquote className="font-serif text-3xl md:text-4xl font-bold text-white leading-tight mb-8">
                        "To eat Indonesian food is to taste the convergence of centuries — where spice routes meet rice paddies,
                        and ancient ritual meets daily sustenance."
                    </blockquote>
                    <p className="text-white/40 text-sm uppercase tracking-widest">Dapoer Nusantara — Heritage Foundation</p>
                </div>
            </section>

            {/* CTA */}
            <section className="bg-white py-20">
                <div className="max-w-3xl mx-auto px-6 text-center">
                    <p className="section-label mb-4">Begin the Journey</p>
                    <h2 className="font-serif text-4xl font-bold text-gray-900 mb-5">Experience the Heritage</h2>
                    <p className="text-gray-500 text-sm leading-relaxed mb-8 max-w-xl mx-auto">
                        Every dish in our menu carries a story. Explore our curated selection of authentic Indonesian heritage cuisine
                        and taste centuries of tradition in every bite.
                    </p>
                    <div className="flex items-center justify-center gap-4">
                        <Link href="/menu" className="btn-brand px-8 py-3.5 rounded-xl text-sm">
                            Explore the Menu
                        </Link>
                        <Link href="/archives" className="btn-outline px-8 py-3.5 rounded-xl text-sm">
                            Browse Archives
                        </Link>
                    </div>
                </div>
            </section>
        </AppLayout>
    );
}
