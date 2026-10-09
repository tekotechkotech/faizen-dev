#!/bin/sh
set -eu
docker compose exec -T db mariadb-dump -ufaizen -p"$DB_PASSWORD" faizen > backup-$(date +%F).sql
