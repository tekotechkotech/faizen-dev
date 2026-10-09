import { defineConfig } from 'astro/config';
import svelte from '@astrojs/svelte';

export default defineConfig({
  // Astro 5: 'hybrid' removed — 'static' default supports per-page `prerender = false` for SSR later.
  integrations: [svelte()],
  server: { port: 3010 },
});
