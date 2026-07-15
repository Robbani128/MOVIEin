# MOVIEin

MOVIEin adalah aplikasi web untuk mencari dan mengelola aktivitas menonton film menggunakan **TMDB API**. Pengguna dapat mencari film, melihat detail film, menyimpan wishlist, memberikan rating dan review, serta mencatat riwayat tontonan.

Project ini dibuat sebagai portfolio untuk menunjukkan implementasi Laravel, REST API, dan konsep MVC.

## Features

* Authentication
* Search Movie
* Movie Detail
* Wishlist
* Rating
* Review
* Watch History
* User Dashboard
* Responsive Design

## Tech Stack

* PHP
* Laravel 12
* MySQL
* HTML5
* CSS3
* Bootstrap 5
* JavaScript
* TMDB API

## Installation

```bash
git clone https://github.com/Robbani128/MOVIEin.git

cd MOVIEin

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan serve
```

Tambahkan konfigurasi database dan `TMDB_API_KEY` pada file `.env` sebelum menjalankan aplikasi.

## License

This project is created for learning and portfolio purposes.
