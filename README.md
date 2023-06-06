# inosoft - backend test - Dea Bagus

## Development
- Laravel 8.*
- PHP 8.0.*
- Mongodb 4.2.*

## Cara instalasi
- git clone https://github.com/deabagusS/inosoft-backend-deabagus.git
- cd inosoft-backend-deabagus
- composer install
- create file .env then copy source from .env.example then paste in .env finaly save file .env
- php artisan key:generate
- php artisan jwt:secret
- php artisan config:cache
- php artisan db:seed
- php artisan serve
- jika runing aplikasi berhasil secara default akan menggunakan port :8000 
- selanjutnya bisa mengakses localhost:8000