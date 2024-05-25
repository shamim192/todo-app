# To-Do List Application

This is a simple To-Do List application built using Laravel. It allows users to create, read, update, and delete tasks. Tasks can be marked as completed or incomplete, and basic styling is implemented to distinguish between completed and incomplete tasks.

# Features
- Create, read, update, and delete tasks.
- Mark tasks as completed or incomplete.
- Basic styling to distinguish between completed and incomplete tasks.

## Requirements

- PHP >= 8.0
- Laravel 11
- Composer
- SQLite

## Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/shamim192/todo-app.git
   cd todo-app
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Set up environment variables:
   ```bash
   cp .env.example .env
   ```

   Configure the `.env` file to use SQLite:
   ```dotenv
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/database/database.sqlite
   ```

   Replace /absolute/path/to with the absolute path to your Laravel project directory.
   Enclose the path in double quotes to ensure it is parsed correctly. like this 
   ```dotenv
   DB_DATABASE="F:/Personal Project/todo-app/database/database.sqlite"
   ```

4. Create the SQLite database file
 ```bash
  touch database/database.sqlite
   ```
5. Generate an application key:
 ```bash
  php artisan key:generate
   ```
6. Run the migrations
 ```bash
  php artisan migrate
   ```
7. Run the serve
 ```bash
  php artisan serve
   ```

   Visit http://localhost:8000/tasks in your web browser to access the to-do list application.

# Usage

- Navigate to the /tasks to view the list of tasks.
- Click on "Create New Task" to add a new task.
- Click on "Edit" to update a task's details.
- Click on "Delete" to remove a task.
- Use the toggle switch to mark a task as completed or incomplete.

# Dependencis

- Laravel Framework.
- jQuery library
- Bootstrap CSS framework
- Font Awesome icon library