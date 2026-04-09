# AI Coding Assistant Instructions for College Management System
## Project Overview
This is a Laravel 9-based college management system with comprehensive modules for academic administration, student management, staff payroll, fees collection, exam management, library, hostel, and transport. The system includes both an admin backend and a public website frontend.
## Architecture & Key Components
### Core Framework
- **Laravel 9** with PHP 8.0+
- **Database**: MySQL with extensive migrations (80+ tables)
- **Authentication**: Laravel Sanctum + custom User/Student models
- **Permissions**: Spatie Laravel Permission package for role-based access
### Major Modules
- **Academic**: Faculty, Program, Batch, Session, Semester, Section, Subject management
- **Student Management**: Enrollment, attendance, transfers, leaves, documents
- **Staff Management**: User profiles, designations, departments, payroll, attendance
- **Fees System**: Fee categories, discounts, fines, receipts, transactions
- **Exam System**: Exam types, routines, marking, grades, result contributions
- **Library**: Books, categories, members, issue/return tracking
- **Hostel**: Rooms, members, room types
- **Transport**: Routes, vehicles, members
- **CMS Features**: Pages, menus, events, notifications, galleries, news
### Frontend Stack
- **Build Tool**: Laravel Mix (Webpack wrapper)
- **JS Framework**: Vue.js 2.5
- **CSS Framework**: Bootstrap 4.1 + custom SCSS
- **Assets**: Combined CSS/JS bundles for web frontend
## Critical Workflows
### Development Setup
```bash
composer install
npm install
cp .env.example .env  # Configure database
php artisan migrate
php artisan db:seed
npm run dev  # For development builds
npm run prod  # For production builds
```
### Database Operations
- Use `php artisan migrate` for schema changes
- Many migrations have complex relationships (pivot tables, polymorphic relations)
- Seeders populate initial data for faculties, programs, etc.
### Asset Compilation
- `npm run dev` - Development build with source maps
- `npm run watch` - Auto-recompile on changes
- `npm run prod` - Minified production build
- Assets compiled to `public/css` and `public/js`
### Permission System
- Uses Spatie Permission with `Role` and `Permission` models
- Users have roles like 'admin', 'staff', 'student'
- Check permissions with `$user->hasPermissionTo('permission.name')`
## Project-Specific Patterns
### Model Relationships
- Extensive use of `belongsTo`, `hasMany`, `belongsToMany`
- Polymorphic relations for flexible content (e.g., `Content` model with `contentable`)
- Pivot tables for many-to-many (e.g., `enroll_subject_subject`)
### Controller Structure
- Namespaced under `Admin` for backend, `Web` for frontend
- Resource controllers for CRUD operations
- AJAX endpoints for dynamic filtering (districts, batches, etc.)
### View Organization
- Admin views: `resources/views/admin/`
- Web views: `resources/views/web/`
- Blade templates with Bootstrap components
- Modal-based CRUD interfaces
### Route Patterns
- Admin routes: `/admin/*` with auth middleware
- Web routes: Public-facing with XSS protection
- Many routes commented out (phased development)
- Dynamic department routes: `/department/{slug}`
### File Upload Handling
- Uploads stored in `storage/app/public/` with symlinks
- Multiple upload directories: `student/`, `staff/`, `content/`, etc.
- Image processing with Intervention Image package
### Notification System
- Email/SMS notifications via custom models
- Events and notifications displayed on home page
- Department-specific content filtering
## Common Development Tasks
### Adding New Module
1. Create migration: `php artisan make:migration create_table_name`
2. Create model: `php artisan make:model ModelName`
3. Add relationships and fillable fields
4. Create controller: `php artisan make:controller Admin/ModuleController --resource`
5. Add routes in `routes/web.php`
6. Create views in `resources/views/admin/module/`
7. Update permissions if needed
### Frontend Changes
1. Modify SCSS in `resources/sass/`
2. Update JS in `resources/js/`
3. Run `npm run dev` to compile
4. Check compiled files in `public/css/web-all.css`
### Database Changes
- Always create migrations, never modify tables directly
- Use foreign keys with `constrained()` and `cascadeOnDelete()`
- Test migrations with `php artisan migrate:rollback`
## Key Files to Reference
### Configuration
- `config/permission.php` - Permission settings
- `config/database.php` - Database connections
- `webpack.mix.js` - Asset compilation config
### Core Models
- `app/User.php` - Staff/Admin users with roles
- `app/Models/Student.php` - Student profiles
- `app/Models/Program.php` - Academic programs
- `app/Models/Subject.php` - Course subjects
### Controllers
- `app/Http/Controllers/Admin/DashboardController.php` - Admin dashboard
- `app/Http/Controllers/Web/HomeController.php` - Public home page
### Views
- `resources/views/layouts/admin.blade.php` - Admin layout
- `resources/views/web/home.blade.php` - Public home page
- `resources/views/admin/upcoming-event/` - Event management
### Migrations
- Recent migrations show active development (events, notifications)
- Many legacy migrations from initial build
## Testing & Validation
- Use `php artisan tinker` for model testing
- Check compiled assets after frontend changes
- Test admin routes require authentication
- Validate file uploads and permissions
## Deployment Notes
- Run `composer install --optimize-autoloader --no-dev`
- Run `npm run prod` for optimized assets
- Set proper file permissions for storage/
- Configure database and mail settings in .env</content>
<parameter name="filePath">d:\php8\serverphp8\htdocs\collegenew\college\.github\copilot-instructions.md