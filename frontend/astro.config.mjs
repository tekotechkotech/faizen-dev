import { defineConfig } from 'astro/config';
import svelte from '@astrojs/svelte';
import node from '@astrojs/node';

export default defineConfig({
  // Static-first with per-page SSR (`prerender = false`) served by Node adapter.
  output: 'static',
  adapter: node({ mode: 'standalone' }),
  integrations: [svelte()],
  server: { port: 3010, host: true },
  vite: { server: { allowedHosts: ['dev.faizen.biz.id', '.faizen.biz.id', 'localhost'] } },
});
