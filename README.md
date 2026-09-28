# BPM FTD — Laravel

Landing page BPM FTD dengan panel admin dan kotak saran anonim. Saran disimpan di database melalui Laravel.

## Persiapan

Persyaratan: PHP 8.3+ dengan ekstensi PDO SQLite dan Composer.

```powershell
composer install
Copy-Item .env.example .env
New-Item database/database.sqlite -ItemType File
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Di komputer kerja ini, aplikasi juga dapat dijalankan dengan `start-laravel.bat`. Node.js/npm hanya diperlukan jika aset frontend dibangun melalui Vite; halaman saat ini memakai Tailwind CDN.

Database SQLite lokal dan isinya tidak disertakan di repositori. Migrasi membuat tabel yang diperlukan dan seeder mengisi konten contoh.

## Kotak saran

- Widget kanan bawah mengirim `category` dan `message` ke `POST /saran`.
- Laravel memvalidasi data, membatasi pengiriman berulang, lalu menyimpannya di tabel `suggestions`.
- Nama, email, dan alamat IP tidak disimpan oleh fitur ini.
- Pesan tersimpan di database dan dapat dibaca melalui panel admin. Tidak ada email yang dikirim.

## Panel admin

- Buka `/admin/login` atau klik **Admin BPM FTD** di footer.
- Panel mengelola teks beranda, profil anggota, program kerja, pengumuman, dan saran masuk.
- Foto anggota yang diunggah disimpan di `public/uploads/profiles`.
- Isi `BPM_ADMIN_NIM` dan `BPM_ADMIN_PASSWORD_HASH` di `.env` lokal sebelum menggunakan panel. Buat hash password secara lokal dengan:

  ```powershell
  php -r "echo password_hash(readline('Password admin: '), PASSWORD_BCRYPT), PHP_EOL;"
  ```

Jangan commit `.env`, database lokal, atau kredensial admin ke repositori.
