import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    //Configure the server when you want to test the function on mobile
    // server: {
    //     host: '0.0.0.0',
    //     port: 3000, // You can change this to any port you prefer
    //     strictPort: true,
    //     hmr: {
    //         host: '192.168.1.114', // Replace with your local IP address
    //     },
    // },
});
