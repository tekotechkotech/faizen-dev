# Point 12 — Security & Authentication

## Principle

> Secure by default, simple by design.

## Public Website

- Public content is read-only.
- Sensitive data must not be exposed.
- Only necessary public APIs are exposed.
- Rate limiting is applied where appropriate.
- Backend validation is required.
- Security headers are required.
- HTTPS is required.
- Frontend credentials must not be exposed.

## CMS

The CMS requires:
- Authentication
- Password hashing
- Session management
- Authorization/role handling
- CSRF protection
- Login rate limiting
- Audit trail for important changes
- Secure file uploads
- MIME and size validation

## Initial Role

Initial role:

- ADMIN

Additional roles are added only when actually needed.

## API

Operations must be distinguished between public and private operations.

## Security Scope

Do not overengineer with unnecessary OAuth, JWT, microservices, or other complexity when the CMS does not require it.
