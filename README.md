<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Pendahuluan

Website donasi yang dibuat guna memenuhi tugas besar mata kuliah pemrograman web. 

# Anggota

1. Adinda Khaerani - M0519005
2. Annas Abdurrahman - M0519017
3. Arilya Syaharani - M0519020

## Instalasi

- Clone repositori 
- Salin file __.env.example__ menjadi __.env__ dan masukkan nama database serta email untuk layanan notifikasi verifikasi email pengguna
- Jalankan ```composer install```
- Jalankan  ```php artisan key:generate```
- Jalankan  ```php artisan migrate --seed```
- Jalankan ```php artisan storage:link```
- Jalankan ```npm install```
- Jalankan ```npm run dev```
- Import __data.sql__ ke database

## Build
- Jalankan ```php artisan serve```
- Buka url aplikasi
- Login dengan akun __annasabdurrahman@admin.com__ dengan password __admin1__
