import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: 'ojt.local', // Use your custom domain
        port: 5173,         // Optional, choose the port you want to use
        https: false,       // Set to true if using HTTPS (requires SSL configuration)
    },
});
