**ckohl.com — Backend (Laravel API)**

This repository is the backend for ckohl.com. It provides the API and authentication used by the public site and admin tooling.

Key features
- Authentication (registration, login, password reset, token-based API auth)
- REST API for posts, messages, graphics, and user management
- Authorization policies for resources

Quick start
1. Install dependencies:

	composer install

2. Copy environment and generate app key:

	cp .env.example .env
	php artisan key:generate

3. Configure database in `.env`, then migrate (and seed if needed):

	php artisan migrate --seed

4. Run the app (local):

	php artisan serve

Or use Docker Compose if you prefer:

	docker-compose up -d

Testing
- Run unit/feature tests with: `php artisan test`

Where to look
- API routes: routes/api.php
- Controllers: app/Http/Controllers
- Models: app/Models
- Policies: app/Policies
- Factories & seeders: database/

Notes
- Auth is implemented with Laravel's authentication scaffolding and token-based API access. Check `config/auth.php` and any `Sanctum` or token middleware if present.
- If you want changes to the README (add badges, deployment notes, or detailed setup), tell me what to include.

Contact
- Backend for: https://ckohl.com

License
- See project `composer.json` for license information.
