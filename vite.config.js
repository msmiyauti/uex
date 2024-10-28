import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/maps.js',
                'resources/js/consulta.js',
                'resources/css/maps.css',
                'resources/css/custom.css',
            ],
            refresh: true,
        }),
    ],
    // resolve: {
    //     alias: {
    //         '$': 'jQuery'
    //     },
    // },
});
