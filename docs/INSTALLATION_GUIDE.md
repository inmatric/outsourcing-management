# 🧰 INSTALLATION_GUIDE.md

Panduan instalasi untuk menjalankan Laravel secara lokal menggunakan **Laragon**, **PHP 8.2.28**, dan **Composer** di Windows.

---

## ✅ Tools yang Akan Diinstal

- ✅ Git
- ✅ PHP 8.2.28
- ✅ Composer
- ✅ Node.js & NPM
- ✅ Laravel & Vite (untuk front-end dev)
- ✅ Flowbite (UI components TailwindCSS)
- ✅ Laragon (Laravel-friendly stack)
- ✅ Setting Environment Variable
---
## 0️⃣ Instal Git

1. Download Git untuk Windows:  
   👉 https://git-scm.com/download/win

2. Jalankan installer, gunakan pengaturan default.
3. Setelah selesai, buka `cmd` dan ketik:
```bash
   git --version
```
4. (Opsional) Set konfigurasi awal Git:

```bash

git config --global user.name "Nama Kamu"
git config --global user.email "emailkamu@example.com"
```

## 1️⃣ Instal Laragon

1. Download Laragon:
   👉 https://github.com/leokhoa/laragon/releases/download/6.0.0/laragon-wamp.exe

2. Install dengan setting default.
3. Setelah terpasang, buka Laragon, klik kanan → `Start All`.

---

## 2️⃣ Instal PHP 8.2.28 (Manual)

1. Download PHP:
   👉 [PHP 8.2.28 NTS x64](https://windows.php.net/downloads/releases/php-8.2.28-nts-Win32-vs16-x64.zip)

2. Ekstrak ke folder:
   ```bash
   C:\laragon\bin\php\php-8.2.28
   ```

3. Buka Laragon → Menu > PHP > Version → Pilih `php-8.2.28`

---

## 3️⃣ Tambahkan PHP ke Environment Variable

1. Tekan `Win + S` lalu ketik **"Environment Variables"**, buka.
2. Klik "Environment Variables..."
3. Di bagian **System Variables**, cari `Path`, klik `Edit`.
4. Klik `New`, masukkan path:
   ```
   C:\laragon\bin\php\php-8.2.28
   ```
5. Klik OK semuanya.

> ✅ Cek dengan membuka `cmd` dan ketik:
```bash
php -v
```
Hasilnya harus menampilkan versi `PHP 8.2.28`.

---

## 4️⃣ Instal Composer

1. Download Composer:
   👉 https://getcomposer.org/download/

2. Jalankan installer → arahkan ke `php.exe` di:
   ```
   C:\laragon\bin\php\php-8.2.28\php.exe
   ```

3. Cek versi dengan:
```bash
composer -V
```

---
## 5️⃣ Instal Node.js & NPM
Download Node.js versi LTS:
👉 https://nodejs.org/

Install seperti biasa (next-next)

Cek versi:

```bash
node -v
npm -v
```

6️⃣  Setup Laravel Project

Jika kamu sudah clone repo:

```bash
cd nama-folder-project
cp .env.example .env
composer install
php artisan key:generate
npm install && npm run dev
php artisan migrate
php artisan serve
```

> Pastikan `.env` kamu sudah sesuai dengan setting database Laragon:
```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_db
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🧪 Tes Jalan

Buka browser:
```
http://localhost:8000
```

---

## 🔁 Masalah Umum

| Masalah | Solusi |
|--------|--------|
| `php is not recognized` | Periksa `PATH` sudah ditambahkan |
| `Composer tidak jalan` | Reinstall dan pastikan PHP terdeteksi |
| `npm: command not found` | Install [Node.js](https://nodejs.org/en/download) |

---

Selamat ngoding Laravel bareng tim 🎉  
