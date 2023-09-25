import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
        './app/Http/Livewire/**/*.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            // Custom colors for the app
            colors : {
                'ugreen': {
                    '50': '#f3faf3',
                    '100': '#e3f5e4',
                    '200': '#c9e9ca',
                    '300': '#9ed7a2',
                    '400': '#6bbd70',
                    '500': '#459c4b',   // Original
                    '600': '#36833b',
                    '700': '#2d6831',
                    '800': '#28532b',
                    '900': '#224526',
                    '950': '#0e2511',
                },

                'ublue': {
                    '50': '#f1f9fa',
                    '100': '#dceff1',
                    '200': '#bde1e4',
                    '300': '#8ecbd2',
                    '400': '#65b2bc',
                    '500': '#3e919c',   // Original
                    '600': '#367684',
                    '700': '#31616d',
                    '800': '#2f515b',
                    '900': '#2b464e',
                    '950': '#182c34',
                },


            }
        },
    },

    plugins: [forms],
};
