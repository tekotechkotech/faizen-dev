// TASK-069 analytics events, provider-agnostic (Plausible chosen in 068, no PII)
export const events = ['page_view','view_build','view_solution','view_service','view_article','click_cta','get_started','contact_submit'] as const;
export function track(name: typeof events[number], props: Record<string,string|boolean> = {}) {
  if (typeof window === 'undefined') return;
  (window as any).plausible?.(name, { props });
}
