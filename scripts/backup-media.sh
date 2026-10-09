#!/bin/sh
set -eu
tar -czf media-$(date +%F).tar.gz backend/storage/app/public 2>/dev/null || echo "no media yet"
