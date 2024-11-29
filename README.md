Student Management System with Task Assignment
This project is a Student Management System built with Laravel and MySQL (or SQLite). It allows teachers to manage student tasks and assignments. The system includes user authentication and role management (Admin, Teacher, Student).

Prerequisites
Before setting up the project, ensure you have the following installed on your local machine:

PHP (>= 8.0)
Download from php.net

Composer (PHP package manager for managing dependencies)
Install from getcomposer.org

Laravel
Follow the installation guide

MySQL or SQLite
Use MySQL for production or SQLite for local testing. MySQL download or SQLite download

Node.js and NPM (for front-end assets)
Install from nodejs.org

Setup Instructions
Step 1: Clone the Repository
Clone the project repository to your local machine using Git:

bash
Copy code
git clone https://github.com/AkkiD7/student_managemnet_laravel
Step 2: Install Project Dependencies
PHP Dependencies
Install the PHP dependencies using Composer:

bash
Copy code
composer install
Front-End Dependencies
Install the front-end dependencies (for compiling assets like CSS/JS) using NPM:

bash
Copy code
npm install
Step 3: Set Up the Database
Create a Database
Create a new database in MySQL (or use an existing one):

sql
Copy code
CREATE DATABASE student_management;
Configure Database Settings
Open the .env file in the root directory and configure the database connection settings:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_management
DB_USERNAME=root
DB_PASSWORD=your_password
Run Migrations
Run the migrations to create the required database tables:

bash
Copy code
php artisan migrate
Seed Database with Sample Data
If needed, seed the database with sample data for users, courses, etc.:

bash
Copy code
php artisan db:seed
Step 4: Set Up Authentication
Generate Authentication Scaffolding
Run the Laravel authentication scaffolding to generate views and routes for login, registration, and user management:

bash
Copy code
php artisan make:auth
This will create the authentication views (login, registration, etc.) in resources/views/auth.

Step 5: Configure User Roles (Admin, Teacher, Student)
Seed Users with Roles
Seed the users with roles like teacher and student by editing UsersTableSeeder:

php
Copy code
// database/seeders/UsersTableSeeder.php
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Teacher User
        User::create([
            'name' => 'Teacher User',
            'email' => 'teacher@example.com',
            'password' => Hash::make('teacher123'),
            'role' => 'teacher',
        ]);

        // Student User
        User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => Hash::make('student123'),
            'role' => 'student',
        ]);
    }
}
Run Seeder
Run the seeder to insert the sample users:

bash
Copy code
php artisan db:seed --class=UsersTableSeeder
Step 6: Set Up the Web Server
Run Laravel's Built-In Development Server
Serve the application using the following command:

bash
Copy code
php artisan serve
By default, the application will run on http://127.0.0.1:8000.

Step 7: Access the Application
Open your browser and visit http://127.0.0.1:8000.

Login as Teacher
Use the credentials:

Email: teacher@example.com
Password: teacher123
Login as Student
Use the credentials:

Email: student@example.com
Password: student123
Step 8: Testing and Functionality
Teacher: Can create, update, and delete tasks for students and track task completion.
Student: Can view their assigned tasks and mark them as completed.
