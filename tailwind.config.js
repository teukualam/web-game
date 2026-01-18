import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    // Menambahkan mode class agar dark mode bisa dipicu secara manual via Alpine.js
    darkMode: 'class',

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                // Animasi untuk teks 404
                'glitch-text': {
                    '0%': { transform: 'translate(0)' },
                    '20%': { transform: 'translate(-2px, 2px)' },
                    '40%': { transform: 'translate(-2px, -2px)' },
                    '60%': { transform: 'translate(2px, 2px)' },
                    '80%': { transform: 'translate(2px, -2px)' },
                    '100%': { transform: 'translate(0)' },
                },
                // Animasi untuk ikon 419
                'spin-scale': {
                    '0%': { transform: 'rotate(0deg) scale(0.8)' },
                    '50%': { transform: 'rotate(180deg) scale(1.1)' },
                    '100%': { transform: 'rotate(360deg) scale(0.8)' },
                },
                // Animasi untuk tombol & teks utama
                'pulse-btn': {
                    '0%, 100%': { transform: 'scale(1)' },
                    '50%': { transform: 'scale(1.05)' },
                },
                'shake-x': {
                    '0%, 100%': { transform: 'translateX(0)' },
                    '10%, 30%, 50%, 70%, 90%': { transform: 'translateX(-4px)' },
                    '20%, 40%, 60%, 80%': { transform: 'translateX(4px)' },
                },
                'tilt': {
                    '0%, 100%': { transform: 'rotate(0deg)' },
                    '25%': { transform: 'rotate(1deg)' },
                    '75%': { transform: 'rotate(-1deg)' },
                },
            },
            animation: {
                'glitch-text': 'glitch-text 0.8s infinite alternate',
                'spin-scale': 'spin-scale 2s linear infinite',
                'pulse-btn': 'pulse-btn 2s ease-in-out infinite',
                'shake-x': 'shake-x 0.5s ease-in-out',
                'tilt': 'tilt 4s ease-in-out infinite',
            },
        },
    },

    plugins: [forms],
};