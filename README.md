<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## System Requirements
XAMPP Version <code>XAMPP Version: 7.4.8 for Win 10 Home 64bit</code><br>
PHP Version <code>PHP 7.4.8</code><br>
MySQL Version <code>mysql  Ver 15.1 Distrib 10.4.13-MariaDB</code><br>

## Setup Commands for MASTER branch

1. <code>git clone https://github.com/rocknrold/SITCOM.git </code>
2. <code>cd <project folder> </code>
3. <code>composer install</code>
4. <code>composer update</code>
5. <code>setup .env file</code>
6. <code>php artisan migrate:fresh --seed && php artisan passport:install</code>
7. <code>php artisan serve</code>

## Setup commands for local dev's ( DEV branch )

1. <code>git clone https://github.com/rocknrold/SITCOM.git </code>
2. <code>cd <project folder> </code>
3. <code>git checkout -b <branchName> </code>
4. <code>git pull origin dev </code>
5. <code>composer install</code>
6. <code>composer update</code>
7. <code>setup .env file</code>
8. <code>php artisan migrate:fresh --seed && php artisan passport:install</code>
9. <code>php artisan serve</code>

## Notes
Soon to have laravel sail built on top of docker for virtualization.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
