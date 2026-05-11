import { useState } from 'react';
import { Head, Link } from '@inertiajs/react';
import AppLayout from '@/Layouts/AppLayout';

const VALUES = [
    {
        icon: '🌿',
        title: 'Authenticity',
        desc: 'Every recipe is verified against historical records and regional culinary experts before it earns a place in our archive.',
    },
    {
        icon: '🤝',
        title: 'Community',
        desc: 'We source directly from local producers, farmers, and traditional cooks — keeping the knowledge and income within the communities that created it.',
    },
    {
        icon: '📖',
        title: 'Preservation',
        desc: 'We document every dish we serve — its origins, technique, and cultural significance — so these traditions survive for future generations.',
    },
    {
        icon: '✨',
        title: 'Excellence',
        desc: 'Heritage doesn\'t mean compromise. We hold every ingredient, every preparation, and every delivery to the highest possible standard.',
    },
];

const TIMELINE = [
    { year: '2021', event: 'Foundation', desc: 'Dapoer Nusantara founded by a group of culinary historians and chefs passionate about Indonesian heritage cuisine.' },
    { year: '2022', event: 'First Archive', desc: 'Catalogued and preserved 500 traditional recipes from across the archipelago through field research and community interviews.' },
    { year: '2023', event: 'Online Launch', desc: 'Launched our digital platform, making heritage dishes accessible to food lovers across Indonesia and the world.' },
    { year: '2024', event: 'Growth', desc: 'Expanded to 34 provinces, partnered with 200+ local producers, and served over 50,000 heritage meals.' },
    { year: '2025', event: 'Recognition', desc: 'Recognized by UNESCO as a partner in the safeguarding of Indonesia\'s intangible cultural food heritage.' },
];

const TEAM = [
    { name: 'Dewi Rahayu', role: 'Founder & Culinary Director', initial: 'D' },
    { name: 'Budi Santoso', role: 'Head of Research & Archives', initial: 'B' },
    { name: 'Sari Pertiwi', role: 'Executive Chef', initial: 'S' },
    { name: 'Ahmad Fauzi', role: 'Operations & Sourcing', initial: 'A' },
];

export default function About() {
    const [contactForm, setContactForm] = useState({ name: '', email: '', message: '' });
    const [submitted, setSubmitted] = useState(false);

    const handleSubmit = (e) => {
        e.preventDefault();
        setSubmitted(true);
    };

    return (
        <AppLayout>
            <Head title="About Us" />

            {/* Hero */}
            <section className="relative overflow-hidden py-28 bg-brand">
                <div className="absolute inset-0 opacity-5"
                     style={{
                         backgroundImage: `radial-gradient(ellipse at 70% 50%, #C4622D 0%, transparent 60%)`,
                     }} />
                <div className="relative max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div className="animate-slide-up">
                        <p className="text-xs font-semibold tracking-[0.3em] uppercase text-rust mb-5">Our Story</p>
                        <h1 className="font-serif text-6xl font-bold text-white leading-none mb-6">
                            Guardians of<br />
                            <span className="text-rust italic">Flavor</span>
                        </h1>
                        <p className="text-white/60 text-base leading-relaxed">
                            We are not just a restaurant. We are an archive, a community, a living museum of the world's most diverse culinary tradition.
                        </p>
                        <div className="flex gap-4 mt-8">
                            <Link href="/menu" className="btn-brand px-6 py-3 rounded-xl text-sm">Explore Menu</Link>
                            <Link href="/heritage" className="px-6 py-3 rounded-xl text-sm font-semibold text-white/70 border border-white/20 hover:border-white/50 transition-colors">
                                Our Heritage
                            </Link>
                        </div>
                    </div>

                    {/* Stats grid */}
                    <div className="grid grid-cols-2 gap-4">
                        {[
                            { value: '5,350+', label: 'Recipes Preserved' },
                            { value: '200+', label: 'Local Partners' },
                            { value: '34', label: 'Provinces Represented' },
                            { value: '50k+', label: 'Meals Served' },
                        ].map(({ value, label }) => (
                            <div key={label} className="bg-white/5 border border-white/10 rounded-2xl p-6 text-center">
                                <p className="font-serif text-3xl font-bold text-white mb-1">{value}</p>
                                <p className="text-white/40 text-xs uppercase tracking-widest">{label}</p>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Mission Quote */}
            <section className="bg-cream-dark py-20">
                <div className="max-w-4xl mx-auto px-6 text-center">
                    <svg className="w-10 h-10 text-rust/30 mx-auto mb-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                    </svg>
                    <blockquote className="font-serif text-3xl font-bold text-gray-900 leading-tight mb-6">
                        "Our mission is to ensure that when future generations ask what Indonesia tasted like, there will be a living, breathing answer."
                    </blockquote>
                    <p className="text-gray-400 text-sm">Dewi Rahayu — Founder, Dapoer Nusantara</p>
                </div>
            </section>

            {/* Values */}
            <section className="bg-white py-20">
                <div className="max-w-7xl mx-auto px-6">
                    <div className="text-center mb-14">
                        <p className="section-label mb-3">What We Stand For</p>
                        <h2 className="font-serif text-4xl font-bold text-gray-900">Our Values</h2>
                    </div>
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        {VALUES.map((v) => (
                            <div key={v.title}
                                 className="border-2 border-cream-dark rounded-2xl p-7 hover:border-brand hover:shadow-md transition-all duration-300 group cursor-default">
                                <div className="text-3xl mb-5">{v.icon}</div>
                                <h3 className="font-serif text-lg font-bold text-gray-900 mb-3 group-hover:text-brand transition-colors">{v.title}</h3>
                                <p className="text-gray-500 text-sm leading-relaxed">{v.desc}</p>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Timeline */}
            <section className="bg-cream py-20">
                <div className="max-w-4xl mx-auto px-6">
                    <div className="text-center mb-14">
                        <p className="section-label mb-3">Our Journey</p>
                        <h2 className="font-serif text-4xl font-bold text-gray-900">A Growing Legacy</h2>
                    </div>
                    <div className="relative">
                        <div className="absolute left-[4.5rem] top-0 bottom-0 w-px bg-gray-200" />
                        <div className="space-y-8">
                            {TIMELINE.map((item, i) => (
                                <div key={i} className="flex gap-8 items-start">
                                    <div className="w-16 flex-shrink-0 text-right">
                                        <span className="font-serif text-sm font-bold text-brand">{item.year}</span>
                                    </div>
                                    <div className="flex-shrink-0 w-3 h-3 rounded-full bg-brand mt-1 relative z-10 border-2 border-white ring-2 ring-brand/20" />
                                    <div className="bg-white rounded-xl p-5 flex-1 shadow-sm">
                                        <h3 className="font-serif text-base font-bold text-gray-900 mb-1">{item.event}</h3>
                                        <p className="text-gray-500 text-sm leading-relaxed">{item.desc}</p>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </section>

            {/* Team */}
            <section className="bg-white py-20">
                <div className="max-w-7xl mx-auto px-6">
                    <div className="text-center mb-14">
                        <p className="section-label mb-3">The People</p>
                        <h2 className="font-serif text-4xl font-bold text-gray-900">Meet the Keepers</h2>
                    </div>
                    <div className="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-3xl mx-auto">
                        {TEAM.map((member) => (
                            <div key={member.name} className="text-center group">
                                <div className="w-24 h-24 rounded-2xl mx-auto mb-4 flex items-center justify-center text-white font-serif text-3xl font-bold shadow-sm group-hover:shadow-md transition-shadow"
                                     style={{ background: 'linear-gradient(135deg, #1B3A2D, #3A6B50)' }}>
                                    {member.initial}
                                </div>
                                <h3 className="font-semibold text-gray-900 text-sm">{member.name}</h3>
                                <p className="text-gray-400 text-xs mt-0.5">{member.role}</p>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Stats Banner */}
            <section className="py-16 relative overflow-hidden"
                     style={{ background: 'linear-gradient(135deg, #C4622D 0%, #A3501E 100%)' }}>
                <div className="max-w-7xl mx-auto px-6">
                    <div className="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                        {[
                            { value: '11', label: 'Years of Research' },
                            { value: '34', label: 'Provinces Covered' },
                            { value: '98%', label: 'Customer Satisfaction' },
                            { value: '100%', label: 'Authentic Recipes' },
                        ].map(({ value, label }) => (
                            <div key={label}>
                                <p className="font-serif text-4xl font-bold text-white">{value}</p>
                                <p className="text-white/60 text-xs uppercase tracking-widest mt-1">{label}</p>
                            </div>
                        ))}
                    </div>
                </div>
            </section>

            {/* Contact */}
            <section className="bg-cream py-20">
                <div className="max-w-2xl mx-auto px-6">
                    <div className="text-center mb-12">
                        <p className="section-label mb-3">Get in Touch</p>
                        <h2 className="font-serif text-4xl font-bold text-gray-900">Contact Us</h2>
                        <p className="text-gray-500 text-sm mt-3">Have a question about our heritage dishes or wish to collaborate? We'd love to hear from you.</p>
                    </div>

                    {submitted ? (
                        <div className="bg-white rounded-2xl p-10 shadow-sm text-center animate-fade-in">
                            <div className="w-16 h-16 bg-brand rounded-full flex items-center justify-center mx-auto mb-5">
                                <svg className="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2.5} d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h3 className="font-serif text-2xl font-bold text-gray-900 mb-2">Message Received</h3>
                            <p className="text-gray-500 text-sm">Thank you for reaching out. We'll be in touch within 24 hours.</p>
                            <button onClick={() => setSubmitted(false)} className="mt-6 text-brand text-sm font-semibold hover:underline">
                                Send another message
                            </button>
                        </div>
                    ) : (
                        <form onSubmit={handleSubmit} className="bg-white rounded-2xl p-8 shadow-sm space-y-5">
                            <div>
                                <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Full Name</label>
                                <input
                                    type="text"
                                    value={contactForm.name}
                                    onChange={(e) => setContactForm({ ...contactForm, name: e.target.value })}
                                    placeholder="Your name"
                                    className="input-field"
                                    required
                                />
                            </div>
                            <div>
                                <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Email Address</label>
                                <input
                                    type="email"
                                    value={contactForm.email}
                                    onChange={(e) => setContactForm({ ...contactForm, email: e.target.value })}
                                    placeholder="your@email.com"
                                    className="input-field"
                                    required
                                />
                            </div>
                            <div>
                                <label className="block text-xs font-semibold uppercase tracking-widest text-gray-600 mb-2">Message</label>
                                <textarea
                                    value={contactForm.message}
                                    onChange={(e) => setContactForm({ ...contactForm, message: e.target.value })}
                                    placeholder="Tell us about your inquiry…"
                                    rows={4}
                                    className="input-field resize-none"
                                    required
                                />
                            </div>
                            <button type="submit" className="w-full btn-brand py-3.5 rounded-xl text-sm">
                                Send Message
                            </button>
                        </form>
                    )}
                </div>
            </section>
        </AppLayout>
    );
}
