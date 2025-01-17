# Aplikasi Peminjaman Buku Perpustakaan Laravel 10

## Langkah-langkah Instalasi

1. **Clone Project**

    - Clone project dari repository dengan menggunakan perintah berikut:
        ```bash
        git clone https://github.com/kaptenPijay/e-perpus-sekolah.git
        ```

2. **Install Composer Dependencies**

    - Jalankan perintah berikut untuk menginstal semua dependensi yang diperlukan:
        ```bash
        composer install
        ```
3. **Copy dan Paste File .env**

    - Salin semua data dari file `.env.example` dan tempelkan di file `.env`:
        ```bash
        cp .env.example .env
        ```

4. **Generate Project Key**

    - Jalankan perintah berikut untuk menghasilkan kunci proyek:
        ```bash
        php artisan key:generate
        ```
        
5. **Configuration Cache**

    - Jalankan perintah berikut untuk konfigurasi cache:
        ```bash
        php artisan config:cache
        ```
        
6. **Migrate Database**

    - Jalankan perintah berikut untuk migrasi database:
        ```bash
        php artisan migrate
        ```
    - Jalankan perintah berikut untuk melakukan seeding default user:
        ```bash
        php artisan db:seed
        ```

6. **Jalankan Server Lokal**
    - Terakhir, jalankan perintah berikut untuk menjalankan proyek secara lokal:
        ```bash
        php artisan serve
        ```
    - Proyek akan berjalan di `http://localhost:8000.

7. **Login**
    - Login menggunakan akun admin dengan username dan password berikut:
        - username: admin@gmail.com
        - password: 123
## Catatan

-   Pastikan Anda memiliki PHP, Composer, dan Laravel CLI yang terinstal di sistem Anda sebelum menjalankan langkah-langkah di atas.
-   Pastikan juga Anda memiliki database yang sudah terbuat dan konfigurasi yang sesuai di file `.env`.
