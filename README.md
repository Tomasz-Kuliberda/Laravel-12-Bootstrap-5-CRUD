# About The Project

This is a simple CRUD application developed using PHP 8 and the Laravel framework. Bootstrap 5 and a JS library called SweetAlert were used for the front end. SQLite was used as the database.

Project specifications:
- built-in Authorization provided by Laravel.
- CRUD (Create / Read / Update / Delete) for two elements: Companies and Employees.
- Tables created using migrations. Seeded the database with the first user: email “admin@admin.com” and password “password”.
- Made use of Laravel's pagination and data validation.

## Getting Started

Here are instructions on how to run this project locally.

### Prerequisites

Make sure that your local machine has PHP, Composer, and the Laravel installer installed. If you don't, run this command with Windows PowerShell:
```sh
# Run as administrator...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```
After running this command restart your terminal session.

Next, if you have PHP and Composer installed, you may install the Laravel installer via Composer:
```sh
composer global require laravel/installer
```

### Installation

1. Clone the repo:
```sh
git clone https://github.com/Tomasz-Kuliberda/Laravel-12-Bootstrap-5-CRUD.git
```
2. Enter the project
```sh
cd Laravel-12-Bootstrap-5-CRUD
```
3. Install packages
```sh
composer install
```
4. Rename the .env.example file
```sh
mv .env.example .env
```
5. Generate key
```sh
php artisan key:generate
```
6. Get tables
```sh
php artisan migrate
```
7. Seed the tables
```sh
php artisan db:seed
```
8. Create the symbolic link for image storage
```sh
php artisan storage:link
```
9. Run the project
```sh
php artisan serve
```