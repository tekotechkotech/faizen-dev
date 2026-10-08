# Point 17 — Company Settings

## Purpose

Company information must be editable through the CMS rather than hard-coded into deployment configuration.

## Fields

- Company Name
- Tagline / Descriptor
- Description
- Logo
- Favicon
- Email
- Phone / WhatsApp
- Address
- Social Media

A Website field is intentionally excluded because this CMS manages the website itself.

## Storage

> CMS → Settings → Company Profile → Database

Company content must not be stored in JSON or `.env`.

## Environment Configuration

`.env` is reserved for system configuration and secrets, such as:
- APP_KEY
- DB_PASSWORD
- API_SECRET
- MAIL_PASSWORD

Company profile content belongs in the database.
