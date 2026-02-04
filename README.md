# SSO RSD Balung (Single Sign-On System)

<p align="center">
  <strong>Sistem Single Sign-On untuk RSD Balung</strong><br>
  Dikembangkan oleh Fasilkom UNEJ
</p>

---

## 📋 Daftar Isi

- [Tentang Proyek](#tentang-proyek)
- [Fitur Utama](#fitur-utama)
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Konfigurasi](#konfigurasi)
- [Penggunaan](#penggunaan)
- [Struktur Proyek](#struktur-proyek)
- [Dokumentasi API](#dokumentasi-api)
- [Tim Pengembang](#tim-pengembang)
- [Lisensi](#lisensi)

---

## 🏥 Tentang Proyek

**SSO RSD Balung** adalah sistem otentikasi terpusat (Single Sign-On) yang dirancang khusus untuk Rumah Sakit Daerah (RSD) Balung. Sistem ini memungkinkan pengguna dari berbagai departemen dan aplikasi di RSD Balung untuk melakukan login sekali dan mengakses semua sistem terintegrasi tanpa perlu login ulang.

Sistem ini dibangun menggunakan **Laravel Framework** dengan **Laravel Passport** sebagai implementasi OAuth 2.0 untuk keamanan autentikasi tingkat enterprise.

### Tujuan Proyek

- Memberikan solusi otentikasi terpusat yang aman dan efisien
- Menyederhanakan manajemen pengguna dan akses di berbagai aplikasi
- Meningkatkan keamanan dan kontrol akses
- Mengurangi beban pengguna dalam manajemen password

---

## ✨ Fitur Utama

- **Single Sign-On (SSO)**: Login sekali untuk mengakses semua aplikasi terintegrasi
- **OAuth 2.0 Implementation**: Menggunakan Laravel Passport untuk keamanan standar industri
- **Role-Based Access Control (RBAC)**: Manajemen peran dan izin yang fleksibel
- **User Management**: Manajemen pengguna terpusat dengan interface yang user-friendly
- **API Authentication**: Token-based authentication untuk integrasi aplikasi pihak ketiga
- **Audit Logging**: Pencatatan aktivitas untuk keperluan keamanan dan compliance
- **Multi-Application Support**: Dukungan untuk multiple client applications
- **Refresh Token Management**: Pembaruan token yang aman dan terkontrol

---

## 🛠 Teknologi yang Digunakan

| Komponen             | Versi  | Deskripsi                       |
| -------------------- | ------ | ------------------------------- |
| **PHP**              | 8.2+   | Bahasa pemrograman backend      |
| **Laravel**          | 11.x   | Web application framework       |
| **Laravel Passport** | Latest | OAuth 2.0 server implementation |
| **MySQL/MariaDB**    | Latest | Database management system      |
| **Node.js**          | Latest | Build tools & asset compilation |
| **Vite**             | Latest | Frontend build tool             |
| **Tailwind CSS**     | Latest | CSS framework                   |

---

## 📦 Persyaratan Sistem

### Minimum Requirements

- **PHP**: 8.2 atau lebih tinggi
- **Composer**: 2.0 atau lebih tinggi
- **Node.js**: 18.0 atau lebih tinggi (untuk development)
- **Database**: MySQL 5.7+ atau MariaDB 10.2+
- **Web Server**: Apache, Nginx, atau built-in PHP server

### Recommended Setup

- **PHP**: 8.3+
- **MySQL**: 8.0+
- **Node.js**: 20 LTS
- **Nginx**: Latest stable version

---

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/ahmadrahardan/sso-passport.git
cd sso-passport
```

### 2. Install Dependencies

#### Install PHP Dependencies

```bash
composer install
```

#### Install Node Dependencies

```bash
npm install
```

### 3. Setup Environment

Copy file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database dan aplikasi Anda:

```env
APP_NAME="SSO RSD Balung"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sso_rsd_balung
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Setup Database

#### Create Database

```bash
mysql -u root -p -e "CREATE DATABASE sso_rsd_balung CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

#### Run Migrations

```bash
php artisan migrate
```

#### Seed Database (Optional)

```bash
php artisan db:seed
```

### 6. Generate Passport Keys

```bash
php artisan passport:install
```

### 7. Build Assets

```bash
npm run build
```

### 8. Verify Installation

```bash
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

---

## ⚙️ Konfigurasi

### Konfigurasi Aplikasi

#### `config/app.php`

Pengaturan dasar aplikasi seperti nama, timezone, dan service providers.

#### `config/passport.php`

Pengaturan OAuth 2.0 dan token expiration:

```php
'token_expiration_time' => 31536000, // 1 tahun
'refresh_token_expiration_time' => 63072000, // 2 tahun
```

#### `config/auth.php`

Konfigurasi guard dan provider untuk autentikasi.

### Konfigurasi Database

Pastikan koneksi database di `.env` sudah benar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sso_rsd_balung
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Konfigurasi Mail (Opsional)

Untuk notifikasi email:

```env
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=465
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@rsdbaling.id
MAIL_FROM_NAME="SSO RSD Balung"
```

---

## 💻 Penggunaan

### Memulai Development Server

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

### Development dengan File Watching

```bash
npm run dev
```

### Production Build

```bash
npm run build
```

### Running Tests

```bash
php artisan test
```

---

## 📁 Struktur Proyek

```
sso-passport/
├── app/                    # Kode aplikasi utama
│   ├── Http/              # Controllers, Middleware, Requests
│   ├── Models/            # Eloquent Models
│   └── Providers/         # Service Providers
├── bootstrap/             # Bootstrap files
├── config/                # Konfigurasi aplikasi
├── database/              # Migrations, Factories, Seeders
├── public/                # Aset publik (images, files)
├── resources/             # Views, CSS, JavaScript
│   ├── css/
│   ├── js/
│   └── views/
├── routes/                # Route definitions
├── storage/               # Logs, cache, OAuth keys
├── tests/                 # Unit & Feature Tests
├── vendor/                # Composer dependencies
├── .env.example           # Environment template
├── artisan               # Laravel CLI
├── composer.json         # PHP dependencies
├── package.json          # Node dependencies
└── README.md             # Dokumentasi (file ini)
```

## 👥 Tim Pengembang

**SSO RSD Balung** dikembangkan oleh mahasiswa dan dosen dari:

- **Fasilkom UNEJ** (Fakultas Ilmu Komputer, Universitas Negeri Jember)
- **RSD Balung** (Rumah Sakit Daerah Balung)

---

## 📞 Support & Kontribusi

Untuk dukungan teknis atau kontribusi, silakan hubungi tim pengembang melalui:

- **GitHub Issues**: [Ahmad Rahardan/sso-passport](https://github.com/ahmadrahardan/sso-passport)
- **Email**: [hubungi@rsdbaling.id](mailto:hubungi@rsdbaling.id)

---

## 🔄 Changelog

Lihat [CHANGELOG](CHANGELOG.md) untuk riwayat perubahan dan updates terbaru.

---

**Dikembangkan dengan ❤️ oleh Fasilkom UNEJ untuk RSD Balung**
