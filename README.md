# Laravel POS (TFA7)

A Point of Sale (POS) web application built with Laravel for **IT0049 Web System Technologies**, extending the TFA6 Eloquent foundation with create and edit forms, request validation (`old()` input preservation and `$errors` feedback), and profile avatar image uploads prepared with Intervention Image and Laravel's `Storage` facade.

## Features & Routes

- **`/`** — Home page introducing the Laravel POS system
- **`/about`** — Overview of the application and technologies used
- **`/customers`** — Displays customer accounts retrieved from MySQL via the `Customer` Eloquent model
- **`/customers/create`** & **`/customers/{customer}/edit`** — Forms to create and edit customer accounts with validation (`full_name` required, `email` required and valid)
- **`/users`** — Displays system user accounts along with prepared circular avatar thumbnails (falling back to `public/images/avatar-placeholder.svg` when no photo is uploaded)
- **`/users/create`** & **`/users/{user}/edit`** — Forms to create and edit user accounts (`username` required and unique, `full_name` required) and upload a profile picture (validated as an image ≤ 2MB, resized/cropped to 150×150 via Intervention Image, and stored on `Storage::disk('public')`)

## Database Schema

- **`customers`**: `id`, `full_name`, `email`, `phone` (nullable), `timestamps`
- **`users`**: `id`, `username` (unique), `full_name`, `avatar` (nullable), `timestamps`

Both tables are pre-populated with 5 sample records each using `Database\Seeders\PosSeeder`.

## Local Setup & Installation

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/MathieuGCG/laravel-tfa7.git](https://github.com/MathieuGCG/laravel-tfa7.git)
   cd laravel-tfa7
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Configure environment variables:**
   Copy `.env.example` to `.env` and generate an application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Set up the MySQL database:**
   Create an empty MySQL database named `laravel_pos` (e.g., via phpMyAdmin), then update your `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_pos
   DB_USERNAME=root
   DB_PASSWORD=

   SESSION_DRIVER=file
   ```

5. **Run migrations and database seeders:**
   ```bash
   php artisan migrate --seed
   ```

6. **Create the public storage symlink (for uploaded user avatars):**
   ```bash
   php artisan storage:link
   ```

7. **Start the development server:**
   ```bash
   php artisan serve
   ```
   Open `http://127.0.0.1:8000` in your browser.