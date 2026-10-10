const SITE = 'https://dev.faizen.biz.id';
const API = import.meta.env.PUBLIC_API_URL ?? 'http://localhost:8010/api';

async function slugs(path: string): Promise<string[]> {
  try {
    const res = await fetch(`${API}/${path}`);
    if (!res.ok) return [];
    const j = await res.json();
    const arr = Array.isArray(j) ? j : (j.data ?? []);
    return arr.map((x: any) => x.slug).filter(Boolean);
  } catch {
    return [];
  }
}

export async function GET() {
  const staticRoutes = ['', '/build', '/solutions', '/services', '/articles', '/with-us', '/lets-build-together', '/privacy', '/terms'];
  const [builds, solutions, services, articles] = await Promise.all([
    slugs('builds'), slugs('solutions'), slugs('services'), slugs('articles'),
  ]);
  const urls = [
    ...staticRoutes,
    ...builds.map((s) => `/build/${s}`),
    ...solutions.map((s) => `/solutions/${s}`),
    ...services.map((s) => `/services/${s}`),
    ...articles.map((s) => `/articles/${s}`),
  ];
  const body = `<?xml version="1.0" encoding="UTF-8"?>\n<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n${urls
    .map((u) => `  <url><loc>${SITE}${u}</loc></url>`)
    .join('\n')}\n</urlset>`;
  return new Response(body, { headers: { 'Content-Type': 'application/xml' } });
}
