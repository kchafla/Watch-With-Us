#! /bin/bash

composer install

npm install

cp .env.example .env

php artisan key:generate

chmod 777 storage/logs
chmod 777 storage/framework/sessions
chmod 777 storage/framework/views
chmod 777 storage/logs/laravel.log
chmod 777 storage/logs/laravel.log
