/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.{js,jsx,ts,tsx,blade.php}',
    ],
    theme: {
        extend: {
            colors: {
                brand: '#1B3A2D',
                'brand-dark': '#142B20',
                rust: '#C4622D',
                'rust-dark': '#A8441A',
                cream: '#F5F0E8',
                'cream-dark': '#EDE8DF',
                'cream-card': '#EDEBE5',
            },
            fontFamily: {
                serif: ['"Playfair Display"', 'Georgia', 'serif'],
                sans: ['Inter', 'system-ui', 'sans-serif'],
            },
            animation: {
                'slide-in-right': 'slideInRight 0.3s ease-out',
                'slide-up': 'slideUp 0.3s ease-out',
                'fade-in': 'fadeIn 0.2s ease-out',
                'bounce-once': 'bounceOnce 0.4s ease-out',
            },
            keyframes: {
                slideInRight: {
                    '0%': { transform: 'translateX(100%)' },
                    '100%': { transform: 'translateX(0)' },
                },
                slideUp: {
                    '0%': { transform: 'translateY(20px)', opacity: '0' },
                    '100%': { transform: 'translateY(0)', opacity: '1' },
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                bounceOnce: {
                    '0%, 100%': { transform: 'scale(1)' },
                    '50%': { transform: 'scale(1.25)' },
                },
            },
        },
    },
    plugins: [],
};
