import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                body: ['Archivo', ...defaultTheme.fontFamily.sans],
                display: ['Archivo', ...defaultTheme.fontFamily.sans],
                mono: ['"IBM Plex Mono"', ...defaultTheme.fontFamily.mono],
            },

            // Token warna diekstrak dari public/images/logo.png.
            // Hanya biru, putih, dan hitam yang dipakai di antarmuka.
            colors: {
                brand: {
                    blue: {
                        50: 'rgb(var(--brand-blue-50) / <alpha-value>)',
                        100: 'rgb(var(--brand-blue-100) / <alpha-value>)',
                        200: 'rgb(var(--brand-blue-200) / <alpha-value>)',
                        300: 'rgb(var(--brand-blue-300) / <alpha-value>)',
                        400: 'rgb(var(--brand-blue-400) / <alpha-value>)',
                        500: 'rgb(var(--brand-blue-500) / <alpha-value>)',
                        600: 'rgb(var(--brand-blue-600) / <alpha-value>)',
                        700: 'rgb(var(--brand-blue-700) / <alpha-value>)',
                        800: 'rgb(var(--brand-blue-800) / <alpha-value>)',
                        900: 'rgb(var(--brand-blue-900) / <alpha-value>)',
                    },
                    ink: 'rgb(var(--brand-ink) / <alpha-value>)',
                    paper: 'rgb(var(--brand-paper) / <alpha-value>)',
                    line: 'rgb(var(--brand-line) / <alpha-value>)',
                    muted: 'rgb(var(--brand-muted) / <alpha-value>)',
                    steel: 'rgb(var(--brand-steel) / <alpha-value>)',
                },
            },

            boxShadow: {
                card: '0 1px 2px rgb(9 9 11 / 0.04), 0 16px 40px -28px rgb(9 9 11 / 0.35)',
                lift: '0 2px 6px rgb(9 9 11 / 0.05), 0 24px 48px -30px rgb(43 13 221 / 0.45)',
            },

            keyframes: {
                'line-up': {
                    from: { opacity: '0', transform: 'translateY(105%)' },
                    to: { opacity: '1', transform: 'translateY(0)' },
                },
                rise: {
                    from: { opacity: '0', transform: 'translateY(18px)', filter: 'blur(6px)' },
                    to: { opacity: '1', transform: 'translateY(0)', filter: 'blur(0)' },
                },
                'car-in': {
                    from: { opacity: '0', transform: 'translateX(-56px)' },
                    to: { opacity: '1', transform: 'translateX(0)' },
                },
                marquee: {
                    from: { transform: 'translateX(0)' },
                    to: { transform: 'translateX(-50%)' },
                },
            },

            animation: {
                'line-up': 'line-up 1.1s cubic-bezier(0.16, 1, 0.3, 1) both',
                rise: 'rise 1.05s cubic-bezier(0.16, 1, 0.3, 1) both',
                'car-in': 'car-in 1.4s cubic-bezier(0.16, 1, 0.3, 1) both',
                marquee: 'marquee 55s linear infinite',
            },
        },
    },

    plugins: [forms],
};
