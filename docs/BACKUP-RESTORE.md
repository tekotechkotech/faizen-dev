# Backup & Restore (TASK-080)

## What is backed up

- MariaDB: `scripts/backup-db.sh` → `$BACKUP_DIR/faizen-YYYY-MM-DD.sql.gz`, 7-day retention, optional `OFFSERVER_TARGET` rsync.
- Media/content: `storage/app/public` lives in the `backend-storage` volume (prod) — snapshot it with the same schedule (tar + rsync off-server).

## Restore (database)

```bash
gunzip -c /var/backups/faizen/faizen-YYYY-MM-DD.sql.gz \
  | docker compose -f compose.prod.yaml exec -T db \
    mariadb -u root -p"$DB_PASSWORD" "$DB_DATABASE"
docker compose -f compose.prod.yaml exec backend php artisan migrate --force
```

## Restore (media)

```bash
tar -xzf media-YYYY-MM-DD.tar.gz -C /tmp/restore
docker cp /tmp/restore/media <backend-container>:/var/www/storage/app/public/media
```

## Verification

After restore: `php artisan migrate:status`, `curl /api/health`, spot-check `/api/builds` + one CMS login.
