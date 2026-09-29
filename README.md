# Task Manager (Laravel)

**Project Code:**

WST21-PM-2026-SF
______________________________

**Student Name:**

Parba, Zyra Mae P.
______________________________

**Course & Year:**

BSIT - 2
______________________________

**Database Used:**

MySQL

## Features
- Add Task - Create new entries with a task title, detailed notes, priority level (High/Low), and a target due date through a clean modal prompt.
- View Tasks - Organize tasks into Pending and Completed categories,view real-time task counts and search entries.
- Edit Task - Easily modify any task's title, description notes, priority status, or scheduled due date.
- Delete Task - Permanently remove unnecessary task entries from the list with a single click.
- Update Status - Mark tasks as complete or toggle them back to pending using the interactive checkboxes.

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

<img width="1911" height="939" alt="image" src="https://github.com/user-attachments/assets/6008c88e-e07b-4210-918c-17ed2358c0f0" />
<img width="1898" height="950" alt="image" src="https://github.com/user-attachments/assets/e5ea6f89-ef68-45ed-9dc7-a4dfded917cf" />
<img width="1919" height="947" alt="image" src="https://github.com/user-attachments/assets/21075c74-26cb-4a02-9b40-bd05518eb9e1" />
<img width="763" height="419" alt="image" src="https://github.com/user-attachments/assets/064dfdae-565e-4b3c-a877-8268977efffb" />








