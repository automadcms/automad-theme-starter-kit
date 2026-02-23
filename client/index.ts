/*!
 * Automad Theme Starter Kit
 *
 * © 2026 Marc Anton Dahmen
 * Licensed under the MIT license
 */

/**
 * This is the main entry point for esbuild.
 */
import 'dist-font-inter/variable';
import '@fontsource-variable/jetbrains-mono';
import 'modern-normalize/modern-normalize.css';

/**
 * All additional .less files can be imported directly
 * inside "./styles/index.less" and should NOT be added here.
 */
import './styles/index.less';

/**
 * All TypeScript modules you want to use can be added here.
 */
import 'automad-theme-ui-kit';
