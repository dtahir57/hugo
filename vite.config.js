import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/assets/img/favicons/manifest.json',
                'resources/assets/vendors/simplebar/simplebar.min.js',
                'resources/assets/js/config.js'
            ],
            refresh: true,
        }),
    ],
});
