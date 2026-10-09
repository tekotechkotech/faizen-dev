export const prerender = true;
export async function GET() { return new Response(`<?xml version="1.0"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc>/</loc></url><url><loc>/build</loc></url></urlset>`, { headers: { 'Content-Type': 'application/xml' } }); }
