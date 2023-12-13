import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/',
    server: {
        hmr: {
            host: "render",
        },
    },
    build: {
        // genera el archivo .vite/manifest.json en outDir
        manifest: true,
        rollupOptions: {
            // sobreescribe la entrada por defecto .html
            input: "/path/to/main.js",
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
