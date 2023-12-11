@echo off
set "php_path=C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe"  REM Ganti dengan path PHP yang sesuai
set "artisan_path=C:\Users\USER\OneDrive\Desktop\bank-sampah" REM Ganti dengan path proyek Laravel Anda

cd %artisan_path%

REM Contoh perintah php artisan
%php_path% artisan config:clear
%php_path% artisan route:clear
%php_path% artisan view:clear
%php_path% artisan cache:clear
%php_path% artisan optimize:clear
REM Tambahkan perintah lain sesuai kebutuhan

echo "Selesai menjalankan perintah Laravel."
pause
