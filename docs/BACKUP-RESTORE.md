# Backup & restore (078-080)
DB: scripts/backup-db.sh daily via cron, retain 7. Media: scripts/backup-media.sh. Restore: mysql < backup.sql, tar -xzf media. Tested via compose.
