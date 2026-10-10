#!/usr/bin/env bash
# Automated MariaDB backup (TASK-078/079). Run via cron/systemd on the host.
# Keeps 7 daily dumps locally; sync off-server (example: rclone/rsync target from env).
set -euo pipefail

BACKUP_DIR="${BACKUP_DIR:-/var/backups/faizen}"
RETENTION_DAYS="${RETENTION_DAYS:-7}"
STAMP="$(date +%F)"
mkdir -p "$BACKUP_DIR"

docker compose -f compose.prod.yaml exec -T db \
  mariadb-dump -u root -p"$DB_PASSWORD" "$DB_DATABASE" \
  | gzip > "$BACKUP_DIR/faizen-$STAMP.sql.gz"

find "$BACKUP_DIR" -name 'faizen-*.sql.gz' -mtime +"$RETENTION_DAYS" -delete

if [ -n "${OFFSERVER_TARGET:-}" ]; then
  rsync -a "$BACKUP_DIR/" "$OFFSERVER_TARGET/"
fi

echo "backup done: $BACKUP_DIR/faizen-$STAMP.sql.gz"
