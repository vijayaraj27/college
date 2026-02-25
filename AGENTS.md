# AGENTS.md

## Cursor Cloud specific instructions

### Overview

This is **PSR Edu**, a Laravel 9 PHP monolith for college/university education management. It features a public-facing website and an admin dashboard with modules for students, staff, admissions, fees, exams, attendance, and more.

### System dependencies (pre-installed in VM snapshot)

- **PHP 8.1** with extensions: mysql, xml, mbstring, curl, zip, gd, bcmath, intl, opcache
- **Composer** (global at `/usr/local/bin/composer`)
- **MariaDB 10.11** (service name: `mariadb`)
- **Node.js 22** + npm

### Starting services

Before running the app, start MariaDB:
```
sudo service mariadb start
```

### Running the dev server

The app entry point is `index.php` at the project root (not `public/index.php`). The standard `php artisan serve` will **not** work because `server.php` expects `public/index.php`. Use the PHP built-in server directly:

```
php -S 0.0.0.0:8000 -t /workspace /workspace/index.php
```

### Database

- DB name: `psredu`, user: `psredu`, password: `psredu` (all local-only)
- The SQL dump `psredu.sql` bootstraps the full schema and seed data. Import with FK checks disabled:
  ```
  echo "SET FOREIGN_KEY_CHECKS=0;" | cat - psredu.sql | mariadb -u psredu -ppsredu psredu
  ```
- No `.env.example` is committed. The `.env` must be created manually (see README or prior setup).

### Key commands

| Task | Command |
|---|---|
| Install PHP deps | `composer install --no-interaction` |
| Install JS deps | `npm install` |
| Build frontend assets | `npm run dev` |
| Lint (PHP style) | `./vendor/bin/pint --test` |
| Run tests | `./vendor/bin/phpunit` |
| Generate app key | `php artisan key:generate` |

### Gotchas

- `composer install` post-autoload script (`artisan package:discover`) queries the DB. The database must be populated **before** running `composer install`, or the post-install script will fail. If this happens, import the SQL dump first and then re-run `php artisan package:discover`.
- `FILESYSTEM_DRIVER` defaults to `s3` in `config/filesystems.php`. Set `FILESYSTEM_DRIVER=local` in `.env` to avoid S3 errors.
- The `StudentController` referenced in routes does not exist in the codebase, causing `php artisan route:list` to error. This is a pre-existing issue and does not affect normal app operation.
- Admin login credentials (from seed data): `admin@mail.com` / `admin1234`.
