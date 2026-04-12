# SITALAS — Sistem Informasi Tata Laksana Surat

SITALAS adalah aplikasi berbasis web untuk pencatatan, pengendalian, dan penemuan kembali surat masuk dan surat keluar secara mudah, cepat, dan akurat. Dibangun menggunakan framework **Laravel** dengan antarmuka berbasis **Blade**.

---

## Teknologi

| Komponen   | Teknologi              |
|------------|------------------------|
| Backend    | PHP, Laravel           |
| Templating | Blade                  |
| Database   | MySQL / MariaDB        |
| Build Tool | Vite                   |

---

## Fitur

- Pencatatan surat masuk dan surat keluar
- Pengendalian dan disposisi surat
- Penemuan kembali surat dengan pencarian cepat
- Manajemen pengguna dan hak akses
- Riwayat dan log aktivitas surat

---

## Prasyarat

Pastikan perangkat pengembangan telah memiliki:

- PHP >= 8.0
- Composer
- Node.js >= 16
- npm
- MySQL / MariaDB

---

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/endrajanitra/sitalas.git
cd sitalas
```

### 2. Install Dependensi

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

Sesuaikan konfigurasi database pada file `.env`:

```env
APP_NAME=SITALAS
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sitalas
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi dan Seeding Database

```bash
php artisan migrate --seed
```

### 5. Build Asset Frontend

```bash
npm run build
```

Untuk mode pengembangan dengan hot reload:

```bash
npm run dev
```

### 6. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi akan tersedia di `http://localhost:8000`.

---

## Struktur Direktori

```
sitalas/
├── app/
│   ├── Http/
│   │   ├── Controllers/    # Logika aplikasi
│   │   └── Middleware/     # Middleware autentikasi & otorisasi
│   └── Models/             # Eloquent models
├── database/
│   ├── migrations/         # Skema database
│   └── seeders/            # Data awal
├── resources/
│   └── views/              # Tampilan Blade
├── routes/
│   └── web.php             # Definisi rute
└── public/                 # Aset publik
```

---

## Akun Default

Setelah menjalankan seeder, gunakan kredensial berikut untuk masuk:

| Role          | Email                  | Password  |
|---------------|------------------------|-----------|
| Administrator | admin@sitalas.test     | password  |

> Segera ubah password setelah login pertama kali.

---

## Kontribusi

Kontribusi sangat disambut. Untuk berkontribusi:

1. Fork repositori ini
2. Buat branch fitur baru (`git checkout -b feature/nama-fitur`)
3. Commit perubahan (`git commit -m 'feat: deskripsi perubahan'`)
4. Push ke branch (`git push origin feature/nama-fitur`)
5. Buat Pull Request

---

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
