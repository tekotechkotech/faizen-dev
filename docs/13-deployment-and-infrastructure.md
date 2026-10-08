# Point 13 — Deployment & Infrastructure

## Principle

> Simple to deploy, easy to maintain, ready to scale.

## Infrastructure Concept

```
Internet
   ↓
Cloudflare
   ↓
Public Website (Astro) / Backend (Laravel)
   ↓
MariaDB
```

The CMS is served by Laravel.

Exact domain and subdomain structure is not locked by this PRD.

## Initial Target

- Linux
- Docker
- Docker Compose
- Git-based deployment
- HTTPS
- Environment variables
- Separate production database
- Automated backup

Kubernetes is explicitly not required.

## Deployment Flow

> Development → Git → CI/Build → Production

## Backup

Requirements:
- Automated database backup
- Retention policy
- Off-server backup
- Media/content backup

## Observability

Keep observability lightweight:
- Application logs
- Server logs
- Error tracking
- Uptime monitoring
- Backup monitoring

A heavy observability stack is not required.
