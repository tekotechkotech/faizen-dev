# Error Tracking Provider (TASK-070)

Decision: **no external APM/Sentry in v1**. Keep observability lightweight per PRD 13:

- Laravel exceptions → `storage/logs/laravel.log` (stack/single channel), audited CMS writes via `Log::info('cms.*')`.
- Uptime: external HTTP check on `/api/health` + `/` every 5 min (provider-agnostic; e.g. Uptime Kuma / Cloudflare / Better Uptime — pick one at deploy time, endpoint contract is fixed).
- Backup monitoring: `scripts/backup-db.sh` prints the artifact path; cron mail/on-failure hook alerts.

Upgrade to Sentry only on explicit decision with a DSN rotation plan. No SDK added until then.
