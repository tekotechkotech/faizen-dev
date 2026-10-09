import { defineConfig } from 'astro/config';
import svelte from '@astrojs/svelte';

// HTML-first, MPA/SSG/SSR. Default prerender true (SSG).
// Dynamic pages (build detail, inquiry) set `export const prerender = false` per-page.
export default defineConfig({
  output: 'static',
  integrations: [svelte()],
});
