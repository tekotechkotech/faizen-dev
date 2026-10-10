// Analytics event contract (PRD 15). Provider: Plausible (privacy-friendly, no PII).
// In dev the tracker is a no-op stub that logs to console; production injects
// the Plausible script with the production domain.
export const EVENTS = [
  'page_view', 'view_build', 'view_solution', 'view_service',
  'view_article', 'click_cta', 'get_started', 'contact_submit',
] as const;

export type AnalyticsEvent = (typeof EVENTS)[number];

declare global {
  interface Window {
    plausible?: (event: string, opts?: { props?: Record<string, string> }) => void;
  }
}

export function track(event: AnalyticsEvent, props: Record<string, string> = {}) {
  const clean: Record<string, string> = {};
  for (const [k, v] of Object.entries(props)) clean[k] = String(v).slice(0, 120);
  if (typeof window !== 'undefined' && typeof window.plausible === 'function') {
    window.plausible(event, { props: clean });
  } else if (import.meta.env.DEV) {
    console.debug('[analytics]', event, clean);
  }
}
