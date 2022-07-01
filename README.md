Repositori untuk backend test. Dibuat menggunakan Laravel 8 dan database MySQL.

# Getting started
## Installation

Sebelum memulai, silakan cek panduan instalasi Laravel untuk requirements server. [Official Documentation](https://laravel.com/docs/8.x/installation)

Clone repository
   
    git clone https://github.com/YassirAmry/backend-test.git

Pindah ke direktori repo
    
    cd backend-test

Install semua dependencies menggunakan composer
    
    composer install

Copy file .env.example menjadi .env. Kemudian atur konfigurasi app (terutama konfigurasi database)
    
    cp .env.example .env

Generate key application baru
    
    php artisan key:generate

Jalankan database migrations
    
    php artisan migrate

Jalankan database seeders
    
    php artisan db:seed

Jalankan local development server
    
    php artisan serve

Sekarang aplikasi dapat diakses di http://localhost:8000

## Api Documentation

Semua url Api dapat diakses melalui

    http://localhost:8000/api

**Category**
    
    http://localhost:8000/api/categories

**Images**
    
    http://localhost:8000/api/images

**Product**
    
    http://localhost:8000/api/products

## Contact
Yassir Amry (yassiramry02@gmail.com)