# Bagian PHP

- Nama file berupa nomor dan urutan nomornya saya sesuaikan dengan urutan task yang ada di PDF Test.

# Bagian Laravel

## Set up

- composer install
- npm install && npm run dev
- setup database di .env
- php artisan migrate
- jika hanya table user yang ingin di seed: php artisan db:seed --class=UserSeeder
- jika semua table ingin di seed: php artisan db:seed
- php artisan storage:link
- php artisan serve
