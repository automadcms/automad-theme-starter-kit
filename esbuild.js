import postcss from 'esbuild-postcss';
import esbuild from 'esbuild';
import browserSync from 'browser-sync';
import { lessLoader } from 'esbuild-plugin-less';
import { fileURLToPath } from 'node:url';
import path from 'node:path';
import fs from 'node:fs';

const { DEV_HOST, DEV_PORT, DEV_PATH } = process.env;

if (!DEV_HOST || !DEV_PORT) {
	console.log('Please add a .env file as described in the README.md file.');
	process.exit(1);
}

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const isDev = process.argv.includes('--dev');
const outdir = path.join(__dirname, 'dist');
const outfile = path.join(outdir, 'main.js');

const commonConfig = {
	entryPoints: [path.join(__dirname, 'client', 'index.ts')],
	bundle: true,
	format: 'esm',
	sourcemap: isDev,
	minify: !isDev,
	target: ['es2022'],
	assetNames: '[name]',
	write: true,
	outfile,
	drop: isDev ? [] : ['console'],
	logLevel: 'info',
	loader: { '.svg': 'text', '.woff': 'file', '.woff2': 'file' },
	plugins: [lessLoader(), postcss()],
};

const runBuild = async () => {
	await esbuild.build(commonConfig);
};

const runDev = async () => {
	await runBuild();

	const bs = browserSync.create();

	bs.init({
		host: DEV_HOST,
		port: 3000,
		proxy: `http://127.0.0.1:${DEV_PORT}/${DEV_PATH ?? ''}`,
		open: true,
		notify: false,
		files: ['**/*.php', '**/dist/**/*.{js,css}'],
		serveStatic: [outdir],
	});

	let ctx = await esbuild.context(commonConfig);

	await ctx.watch();
};

if (isDev) {
	runDev().catch((err) => {
		console.error(err);
		process.exit(1);
	});
} else {
	runBuild().catch((err) => {
		console.error(err);
		process.exit(1);
	});
}
