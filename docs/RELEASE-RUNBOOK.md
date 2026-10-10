# Release Runbook (TASK-096)

Flow: **Development → Git → CI/Build → Production** (PRD 13).

## Pre-release

1. `git checkout prd-dev && git pull`; CI green (`.github/workflows/ci.yml`: frontend build + backend test).
2. `docker compose exec backend php artisan migrate:fresh --seed --force` on staging; run `docs/QA-BATCH5.md` checklist.
3. Set prod secrets: `DB_PASSWORD`, `APP_KEY` (`php artisan key:generate --show`), `APP_URL`, `PUBLIC_API_URL`, `ADMIN_EMAIL`, `ADMIN_PASSWORD`.

## Deploy

```bash
git tag vX.Y.Z && git push origin vX.Y.Z
ssh prod 'cd /srv/faizen && git fetch && git checkout vX.Y.Z'
ssh prod 'DB_PASSWORD=... APP_KEY=... APP_URL=https://... PUBLIC_API_URL=https://.../api docker compose -f compose.prod.yaml up --build -d'
ssh prod 'docker compose -f compose.prod.yaml exec backend php artisan migrate --force'
```

Cloudflare: DNS → server, HTTPS Full (strict), cache static. No K8s.

## Post-deploy

- `curl /api/health` + homepage 200; CMS login; backup script installed (`scripts/backup-db.sh` via cron daily + `OFFSERVER_TARGET`).
- Rollback: previous tag + `up -d` + DB restore per `BACKUP-RESTORE.md`.
