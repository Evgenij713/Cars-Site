import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
	server: { 
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: [
				'resources/css/app.css',
                'resources/css/auth.css',
                'resources/css/cars.css',
                'resources/js/create.js',
				'resources/js/delete.js',
                'resources/js/edit.js',
                'resources/js/flash.js',
                'resources/js/form-validation.js',
                'resources/js/logout.js',
                'resources/js/trash.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
