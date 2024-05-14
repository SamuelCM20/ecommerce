import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
import path from 'path'

export default defineConfig({
	server: { //Se usa para el docker
		host: '0.0.0.0',
		port: 5173,
		hmr: {
			host: '127.0.0.1'
		}
	},
	plugins: [
		laravel({ // Toma los archivos y los transforma a archivos css y js
			input: ['resources/sass/app.scss', 'resources/js/app.js'],
			refresh: true
		}),
		vue()
	],
	build: { chunkSizeWarningLimit: 1600 },
	resolve: {
		alias: {// alias para llamar a carpetas
			vue: 'vue/dist/vue.esm-bundler.js',
			'@': path.resolve(__dirname, 'resources/js'),
			'~': path.resolve(__dirname, 'node_modules')
		}
	}
})