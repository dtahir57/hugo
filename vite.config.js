import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/assets/img/favicons/manifest.json',
                'resources/assets/vendors/simplebar/simplebar.min.js',
                'resources/assets/js/config.js',
                'resources/assets/vendors/simplebar/simplebar.min.css',
                'resources/assets/css/theme-rtl.min.css', 
                'resources/assets/css/theme.min.css',
                'resources/assets/css/user-rtl.min.css',
                'resources/assets/css/user.min.css',
                'resources/assets/vendors/popper/popper.min.js',
                'resources/assets/vendors/bootstrap/bootstrap.min.js',
                'resources/assets/vendors/fontawesome/all.min.js',
                'resources/assets/vendors/lodash/lodash.min.js',
                'resources/assets/vendors/list.js/list.min.js',
                'resources/assets/vendors/feather-icons/feather.min.js',
                'resources/assets/vendors/prism/prism.js',
                'resources/assets/js/phoenix.js',
                'resources/assets/js/ecommerce-dashboard.js',
                'resources/assets/img/team/40x40/57.webp',
                'resources/assets/img/team/72x72/57.webp',
                'resources/assets/img/spot-illustrations/2.png',
                'resources/assets/img/spot-illustrations/dark_2.png',
                'resources/assets/vendors/flatpickr/flatpickr.min.css',
                'resources/assets/vendors/flatpickr/flatpickr.min.js',
                'resources/assets/vendors/choices/choices.min.css',
                'resources/assets/vendors/choices/choices.min.js',
                'resources/assets/img/PNG-logo.webp'
            ],
            refresh: true,
        }),
    ],
    build: {
        // rollupOptions: {
        //     output:{
        //         manualChunks(id) {
        //             if (id.includes('node_modules')) {
        //                 return id.toString().split('node_modules/')[1].split('/')[0].toString();
        //             }
        //         }
        //     }
        // },
        chunkSizeWarningLimit: 500,
    },
});
