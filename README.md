# Task Manager (Laravel)

**Project Code:** WST21-PM-2026-SF

**Student Name:** Parba, Zyra Mae P.

**Course & Year:** BSIT2

**Database Used:** MySQL

## Features
- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status

## Setup
1. `composer install`
2. Copy `.env.example` to `.env` and set your database credentials.
3. Run `php artisan key:generate`.
4. Run `php artisan migrate`.
5. Run `php artisan serve` and visit `http://127.0.0.1:8000`.

## Files included
This repo contains the app-specific files for the task manager feature — drop them
into a fresh Laravel project (`composer create-project laravel/laravel task-manager`)
at the matching paths:

- `database/migrations/2026_09_26_000000_create_tasks_table.php`
- `app/Models/Task.php`
- `app/Http/Controllers/TaskController.php`
- `routes/web.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/tasks/index.blade.php`
- `resources/views/tasks/_row.blade.php`
- `resources/views/tasks/create.blade.php`
- `resources/views/tasks/edit.blade.php`

--------------SCREENSHOTS--------------




