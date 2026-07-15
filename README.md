# MOVIEin

A modern movie tracking web application built using Laravel 11, MySQL, Bootstrap 5 and the TMDB API.

## Features

- **Browse Movies:** View Trending, Popular, Top Rated, and Upcoming movies.
- **Search:** Search for movies using the TMDB API.
- **Authentication:** Register, Login, and manage your profile (powered by Laravel Breeze).
- **Wishlist:** Save movies to your personal wishlist.
- **Watch History:** Track movies you've watched.
- **Reviews & Ratings:** Write reviews and rate movies.
- **Dashboard:** View your overall statistics (wishlist count, watched count, reviews count).
- **Responsive Design:** A beautiful, responsive, dark-themed UI built with Bootstrap 5.

## Tech Stack

- **Backend:** Laravel 11, PHP
- **Database:** MySQL
- **Frontend:** Bootstrap 5, Vanilla JS, Font Awesome, SweetAlert2
- **External API:** TMDB (The Movie Database) API

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL
- TMDB API Key (v3 Auth)

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Robbani128/MOVIEin.git
   cd MOVIEin
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Set up environment file:**
   Copy the `.env.example` file to `.env` and configure your environment variables.
   ```bash
   cp .env.example .env
   ```

4. **Configure Database and TMDB:**
   Open `.env` and set your database connection details and TMDB API key:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=moviein
   DB_USERNAME=root
   DB_PASSWORD=

   TMDB_BASE_URL=https://api.themoviedb.org/3
   TMDB_TOKEN=your_tmdb_read_access_token_here
   ```

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

7. **Run the Development Server:**
   ```bash
   php artisan serve
   ```

8. **Visit the application:**
   Open `http://localhost:8000` in your browser.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
