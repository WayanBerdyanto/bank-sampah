@echo off
set "php_path=C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe"  REM Ganti dengan path PHP yang sesuai
set "artisan_path=C:\Users\USER\OneDrive\Desktop\bank-sampah" REM Ganti dengan path proyek Laravel Anda

cd %artisan_path%

REM Menjalankan perintah php artisan migrate:fresh
%php_path% artisan migrate:fresh

REM Menjalankan perintah php artisan db:seed --class=UserSeeder
%php_path% artisan db:seed --class=UserSeeder

echo "Selesai menjalankan perintah Laravel."
pause
