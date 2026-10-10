const BASE =
  import.meta.env.PUBLIC_API_URL ?? 'http://localhost:8010/api';

async function get<T>(path: string): Promise<T | null> {
  try {
    const res = await fetch(`${BASE}${path}`);
    if (!res.ok) return null;
    return (await res.json()) as T;
  } catch {
    return null;
  }
}

export interface Build {
  id: number; title: string; slug: string;
  short_description?: string; description?: string;
  thumbnail?: string; cover?: string; status: string;
}
export interface Solution {
  id: number; name: string; slug: string;
  short_description?: string; description?: string;
  status: string; pricing?: string; url?: string;
}
export interface Service {
  id: number; title: string; slug: string;
  short_description?: string; description?: string; status: string;
}
export interface Article {
  id: number; title: string; slug: string;
  excerpt?: string; content?: string; category: string; author?: string;
}
export interface HeroSlide {
  id: number; type: string; reference_id?: number;
  title_override?: string; description_override?: string; image_override?: string;
}
export interface Company {
  company_name: string; tagline?: string; description?: string;
  email?: string; phone_whatsapp?: string; address?: string;
}

const paged = <T,>(v: T[] | { data: T[] } | null): T[] =>
  !v ? [] : Array.isArray(v) ? v : (v.data ?? []);

export const api = {
  builds: async () => paged<Build>(await get('/builds')),
  build: (slug: string) => get<Build>(`/builds/${slug}`),
  solutions: async () => paged<Solution>(await get('/solutions')),
  solution: (slug: string) => get<Solution>(`/solutions/${slug}`),
  services: async () => paged<Service>(await get('/services')),
  service: (slug: string) => get<Service>(`/services/${slug}`),
  articles: async () => paged<Article>(await get('/articles')),
  article: (slug: string) => get<Article>(`/articles/${slug}`),
  heros: async () => paged<HeroSlide>(await get('/heros')),
  company: () => get<Company>('/company-settings'),
};
