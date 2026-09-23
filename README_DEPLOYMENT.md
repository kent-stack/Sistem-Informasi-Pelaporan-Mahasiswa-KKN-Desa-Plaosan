# 🚀 Panduan Deployment - KKN Plaosan Portal

## Persyaratan Server (Requirements)

| Software | Versi Minimum |
|----------|--------------|
| PHP | 8.2+ |
| MySQL / MariaDB | 8.0+ / 10.4+ |
| Composer | 2.x |
| Web Server | Apache/Nginx |
| XAMPP (alternatif) | 8.2+ |

> **Catatan**: Node.js/NPM **TIDAK diperlukan**. Aset CSS/JS sudah dikompilasi dan siap pakai di folder `public/build/`.

---

## Step-by-Step Deployment

### Step 1: Clone Repository

```bash
git clone https://github.com/USERNAME/REPO_NAME.git
cd REPO_NAME
```

### Step 2: Install Dependencies PHP

```bash
composer install --optimize-autoloader --no-dev
```

### Step 3: Konfigurasi Environment

```bash
# Salin file .env.example menjadi .env
cp .env.example .env

# Generate APP_KEY (WAJIB!)
php artisan key:generate
```

Kemudian edit file `.env` dan sesuaikan:

```env
APP_URL=http://your-domain.com   # Ganti dengan domain/IP server

DB_HOST=127.0.0.1               # Host database
DB_PORT=3306                     # Port database
DB_DATABASE=kkn                  # Nama database (buat dulu di phpMyAdmin/CLI)
DB_USERNAME=root                 # Username database
DB_PASSWORD=                     # Password database (isi jika ada)
```

### Step 4: Buat Database

Buat database bernama `kkn` melalui:
- **phpMyAdmin**: Klik "New" → ketik `kkn` → klik "Create"
- **MySQL CLI**: `CREATE DATABASE kkn CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;`

### Step 5: Jalankan Migrasi & Seeder

```bash
# Buat semua tabel yang diperlukan
php artisan migrate

# Isi data user (admin + seluruh mahasiswa)
php artisan db:seed
```

> **Info**: Seeder akan membuat akun admin dan 43 akun mahasiswa secara otomatis.

### Step 6: Buat Storage Link (PENTING untuk Upload Foto!)

```bash
php artisan storage:link
```

> **⚠️ KRITIS**: Tanpa perintah ini, fitur upload foto laporan **TIDAK AKAN BERFUNGSI**. Perintah ini membuat symbolic link dari `public/storage` → `storage/app/public`.

### Step 7: Set Permissions (Linux/Mac Server)

```bash
# Berikan izin tulis pada folder storage dan cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Pastikan web server memiliki kepemilikan
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

> Jika menggunakan **XAMPP di Windows**, langkah ini bisa dilewati.

### Step 8: Optimasi untuk Produksi

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 9: Jalankan Aplikasi

**Opsi A - Development Server (untuk testing):**
```bash
php artisan serve --host=0.0.0.0 --port=8000
```
Akses di: `http://IP-SERVER:8000`

**Opsi B - XAMPP (Apache):**
1. Pindahkan folder proyek ke `C:\xampp\htdocs\kkn`
2. Akses di: `http://localhost/kkn/public/`

**Opsi C - Apache Virtual Host (Produksi):**

Buat file konfigurasi Apache (misal `/etc/apache2/sites-available/kkn.conf`):
```apache
<VirtualHost *:80>
    ServerName your-domain.com
    DocumentRoot /var/www/kkn/public

    <Directory /var/www/kkn/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Lalu aktifkan:
```bash
sudo a2ensite kkn.conf
sudo a2enmod rewrite
sudo systemctl restart apache2
```

---

## 🔐 Kredensial Login

### Admin Panel
| Field | Value |
|-------|-------|
| URL | `http://domain/admin` |
| NIM | `ADMIN01` |
| Password | `AdminPlaosan2026!` |

### Mahasiswa
Login menggunakan **NIM** dan **password** masing-masing yang sudah di-set di `database/seeders/UserSeeder.php`.

---

## ⚠️ Troubleshooting

### CSS/Tampilan Tidak Muncul
```bash
# Pastikan APP_URL di .env sudah benar
# Clear cache:
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Foto Upload Gagal / Gambar Tidak Tampil
```bash
# Pastikan storage link sudah dibuat
php artisan storage:link

# Pastikan folder memiliki izin tulis
chmod -R 775 storage/app/public
```

### Error 500 / Halaman Blank
```bash
# Periksa log error:
cat storage/logs/laravel.log

# Pastikan APP_KEY sudah di-generate:
php artisan key:generate

# Clear semua cache:
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### Admin Panel Tidak Bisa Diakses
Pastikan seeder sudah dijalankan:
```bash
php artisan db:seed --class=UserSeeder
```

### Database Error
```bash
# Re-migrate (HATI-HATI: menghapus semua data!)
php artisan migrate:fresh --seed
```

---

## 📁 Struktur Penting

```
kkn/
├── app/                    # Kode aplikasi Laravel
├── database/
│   ├── migrations/         # Struktur tabel database
│   └── seeders/            # Data awal (admin + mahasiswa)
├── public/
│   ├── build/              # CSS/JS terkompilasi (sudah siap)
│   ├── documents/          # Template dokumen download
│   ├── images/             # Gambar statis (foto rektor dll)
│   └── storage -> ../storage/app/public  # Symlink upload foto
├── resources/views/        # Halaman-halaman website
├── routes/web.php          # Routing URL
├── storage/app/public/     # Folder penyimpanan upload foto
└── .env                    # Konfigurasi environment (dibuat dari .env.example)
```

---

## ✅ Checklist Sebelum Go-Live

- [ ] `composer install` berhasil
- [ ] `.env` sudah dikonfigurasi (APP_KEY, DB_*)
- [ ] Database `kkn` sudah dibuat
- [ ] `php artisan migrate` berhasil
- [ ] `php artisan db:seed` berhasil
- [ ] `php artisan storage:link` sudah dijalankan
- [ ] Halaman utama bisa diakses
- [ ] Login admin berhasil (`ADMIN01` / `AdminPlaosan2026!`)
- [ ] Upload foto laporan berfungsi
- [ ] Semua halaman (Home, Projects, Participants, Downloads, Report, Contact) bisa dimuat
