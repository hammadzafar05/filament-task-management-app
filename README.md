# Filament | Task Management Web App

The project is a task management application designed to help users organize and track their tasks efficiently. It allows users to create, update, and delete tasks, assign them to specific users, set task statuses, and add relevant tags for easy categorization. The application provides a user-friendly interface for managing tasks, making it simple for users to keep track of their to-do lists and prioritize their work effectively. With its intuitive design and comprehensive functionality, the app aims to streamline task management and enhance productivity for individuals and teams alike.


## Features

- User authentication and authorization
- Task creation, editing, and deletion
- Task assignment to specific users
- Setting and updating task statuses
- Tagging tasks for easy categorization
- User-friendly interface for efficient task management
- Streamlined task tracking and prioritization

## Getting Started

### Prerequisites

- [Node.js](https://nodejs.org/) and npm (Node Package Manager)
- [MySQL](https://www.mysql.com/) or [PostgreSQL](https://www.postgresql.org/) database
- [Composer](https://getcomposer.org/) for PHP dependencies

### Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/hammadzafar05/filament-task-management-app.git
   ```

2. Navigate to the project directory:
   ```sh
   cd filament-task-management-app
   ```

3. Install Node.js dependencies:
   ```sh
   npm install
   ```

4. Install PHP dependencies:
   ```sh
   composer install
   ```

5. Set up environment variables:
   - Duplicate the `.env.example` file and rename it to `.env`.
   - Update the database credentials and other necessary configurations.

6. Generate an application key:
   ```sh
   php artisan key:generate
   ```

7. Run database migrations:
   ```sh
   php artisan migrate
   ```

8. Seed the database:
   ```sh
   php artisan db:seed
   ```

### Usage

1. Navigate to the application URL in your browser.
2. Register an account or log in if you already have one.
3. Create, edit, and delete tasks as needed.
4. Assign tasks to specific users and set appropriate statuses.
5. Add relevant tags to tasks for easy categorization and tracking.
6. For Filament Admin Panel go to '/admin' via URL Or From "Login as Admin" button on the Login Page.

## Development

### Built With

- Laravel
- Livewire
- Filament
- Alpine
- Tailwind

## Contact

Hammad Zafar - [hammadarain05@gmail.com]
Project Link: [https://github.com/hammadzafar05/filament-task-management-app.git](https://github.com/hammadzafar05/filament-task-management-app.git)
