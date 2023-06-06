# inosoft - backend test - Dea Bagus

## Development
- Laravel 8.*
- PHP 8.0.*
- Mongodb 4.2.

## API Dokumentation
- https://documenter.getpostman.com/view/18634650/2s93sZ5t8P

## Cara instalasi
- git clone https://github.com/deabagusS/inosoft-backend-deabagus.git
- cd inosoft-backend-deabagus
- composer install
- create file .env lalu copy source dari .env.example lalu paste ke file .env kemudian save file .env
- php artisan key:generate
- php artisan jwt:secret
- php artisan config:cache
- php artisan db:seed
- ./vendor/bin/phpunit (jalankan perintah erikut di console optional untuk unit test)
- php artisan serve
- jika runing aplikasi berhasil secara default akan menggunakan port :8000 
- selanjutnya bisa mengakses localhost:8000

## note
untuk collection postman sudah di sertakan juga didalam directory project. 
nama file inosoft-backend-deabagus.postman_collection.json