# AW Backend

A modern Laravel 12 web application backend with authentication and real-time capabilities.

## Tech Stack

- **Backend:** Laravel 12 (PHP 8.2+)
- **Frontend:** Vite, Tailwind CSS 4, Alpine.js
- **Authentication:** Laravel Breeze
- **Architecture:** Laravel Actions

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- Database (MySQL/PostgreSQL/SQLite)

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd aw-be
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Setup environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure your database in `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations:
```bash
php artisan migrate --force
```

6. Build frontend assets:
```bash
npm run build
```

## Available Commands

### Development
Start all development services (server, queue, logs, vite):
```bash
composer run dev
```

### Individual Services
- Start Laravel server: `php artisan serve`
- Start queue worker: `php artisan queue:listen --tries=1 --timeout=0`
- Start logs: `php artisan pail --timeout=0`
- Start Vite dev server: `npm run dev`

### Testing
```bash
composer run test
# or
php artisan test
```

### Code Quality
```bash
# Format code with Laravel Pint
./vendor/bin/pint

# Generate IDE helper files
php artisan ide-helper:generate
php artisan ide-helper:models
```

## Project Structure

```
├── app/                 Application core code
│   ├── Actions/         Laravel Actions (business logic)
│   ├── Models/          Eloquent models
│   └── Http/Controllers/ Controllers
├── database/            Database migrations and seeders
├── resources/           Frontend assets (JS, CSS)
│   └── js/             Alpine.js components
├── routes/             Application routes
│   ├── api.php         API routes
│   ├── channels.php    Broadcasting channels
│   ├── console.php     Console routes
│   └── web.php         Web routes
└── tests/              PHPUnit tests
```

## Security

If you discover any security vulnerabilities, please email the maintainers instead of using the issue tracker.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
