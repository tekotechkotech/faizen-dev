export function report(e: unknown) { console.error(e); (window as any).Sentry?.captureException?.(e); }
