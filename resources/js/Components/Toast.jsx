import { useEffect, useState } from 'react';

export default function Toast({ type = 'success', message, onClose }) {
    const [visible, setVisible] = useState(false);

    useEffect(() => {
        setVisible(true);
        const t = setTimeout(() => {
            setVisible(false);
            setTimeout(onClose, 300);
        }, 3000);
        return () => clearTimeout(t);
    }, []);

    const isSuccess = type === 'success';

    return (
        <div
            className={`fixed top-5 right-5 z-[999] flex items-center gap-3 px-5 py-4 rounded-xl shadow-2xl max-w-sm transition-all duration-300 ${
                visible ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-4'
            } ${isSuccess ? 'bg-brand text-white' : 'bg-red-600 text-white'}`}
        >
            <div className={`w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 ${
                isSuccess ? 'bg-white/15' : 'bg-white/20'
            }`}>
                {isSuccess ? (
                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2.5} d="M5 13l4 4L19 7" />
                    </svg>
                ) : (
                    <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2.5} d="M6 18L18 6M6 6l12 12" />
                    </svg>
                )}
            </div>
            <p className="text-sm font-medium flex-1">{message}</p>
            <button onClick={() => { setVisible(false); setTimeout(onClose, 300); }}
                    className="text-white/60 hover:text-white ml-1 flex-shrink-0">
                <svg className="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    );
}
