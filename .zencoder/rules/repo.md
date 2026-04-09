---
description: Repository Information Overview
alwaysApply: true
---

# College Management System Information

## Summary
This is a comprehensive **Laravel 9** based college management system designed for academic administration, student management, staff payroll, fees collection, exam management, and more. It includes a backend admin panel and a public-facing website frontend.

## Structure
- **app/**: Contains the core application logic, including Models, Controllers (Admin and Web namespaces), and Middleware.
- **config/**: Application configuration files for database, authentication, permissions, and services.
- **database/**: Database migrations (80+ tables), seeders, and factories for system initialization.
- **public/**: The web server root containing the entry point (`index.php`), compiled assets, and user uploads.
- **resources/**: Source files for Blade templates, Vue.js components, and SCSS styles.
- **routes/**: Route definitions for the web frontend, admin backend (`web.php`), and API endpoints (`api.php`).
- **storage/**: System-generated files, including logs, framework cache, and private uploads.
- **tests/**: Feature and Unit tests using the PHPUnit framework.
- **dashboard/** & **web/**: Directories containing static assets and plugins for the admin dashboard and public website.

## Language & Runtime
**Language**: PHP  
**Version**: ^8.0.1  
**Build System**: Laravel Mix (Webpack wrapper)  
**Package Manager**: Composer (PHP) and NPM (JS)

## Dependencies
**Main Dependencies**:
- **laravel/framework**: ^9.1 (Core framework)
- **spatie/laravel-permission**: ^5.5 (Role-based access control)
- **maatwebsite/excel**: ^3.1 (Excel import/export)
- **intervention/image**: ^2.6 (Image processing)
- **laravel/sanctum**: ^2.14 (API authentication)
- **twilio/sdk** & **nexmo/client**: (SMS notifications)
- **yoeunes/toastr**: (Notification alerts)

**Development Dependencies**:
- **phpunit/phpunit**: ^9.5 (Testing)
- **laravel/sail**: (Docker development environment)
- **fakerphp/faker**: (Mock data generation)
- **vue**: ^2.5 (Frontend framework)
- **bootstrap**: ^4.1 (UI framework)

## Build & Installation
```bash
# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed

# Asset compilation
npm run dev   # Development
npm run prod  # Production
```

## Testing
**Framework**: PHPUnit  
**Test Location**: `tests/` (Feature and Unit subdirectories)  
**Naming Convention**: `*Test.php`  
**Configuration**: `phpunit.xml`

**Run Command**:
```bash
php artisan test
# OR
./vendor/bin/phpunit
```

## Main Files & Resources
- **Entry Point**: `public/index.php`
- **Primary Routes**: `routes/web.php` (Admin and Web groups)
- **Configuration**: `.env`, `config/app.php`, `config/database.php`
- **Asset Config**: `webpack.mix.js`
- **Database Schema**: `database/migrations/`
- **Compiled Assets**: `public/css/web-all.css`, `public/js/web-all.js`
