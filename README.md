# 🏢 YPKS - Yayasan Pendidikan Karanganyar Surakarta

### Portal Profil Lembaga & Manajemen Pendidikan

Aplikasi profil institusi modern berbasis **Yii2 Advanced Framework** dan **AdminLTE 3**. Sistem ini dirancang untuk mengelola profil yayasan, rincian lembaga pendidikan, berita terbaru, dan galeri dokumentasi secara terpusat dan modern di bawah naungan **Yayasan Pendidikan Karanganyar Surakarta (YPKS)**.

---

## 🚀 Fitur Utama
- **Modern UI/UX**: Desain premium dengan Glassmorphism, Masonry Gallery, dan Animate-on-Scroll.
- **Dynamic Content**: Kalkulasi otomatis "Tahun Berkarya" dan jumlah "Lembaga Aktif".
- **Institution Management**: CRUD Lembaga terintegrasi dengan Profil Detail (1-to-1 relationship).
- **Inbox Messaging**: Sistem kontak yang menyimpan pesan pengunjung langsung ke database admin.
- **Role-based Admin**: Dashboard AdminLTE yang personal (Branding YPKS & Username Dinamis).

---

## 📋 Prasyarat Sistem
Pastikan lingkungan server Anda memiliki:
- **PHP** >= 7.4 (Rekomendasi 8.1)
- **Composer** (Dependency Manager)
- **MySQL/MariaDB**
- **Laragon / XAMPP** (Local development)

---

## 🛠️ Langkah Instalasi

### 1. Clone Repositori
```bash
git clone https://github.com/suryadragn/ypks.git
cd ypks
```

### 2. Install Dependensi PHP
Jalankan perintah berikut di terminal/cmd:
```bash
composer install
```

### 3. Inisialisasi Aplikasi
Jalankan perintah ini dan pilih `0` (Development) lalu ketik `yes` untuk konfirmasi:
```bash
php init
```

### 4. Pengaturan Database
1. Buat database baru di MySQL dengan nama `ypks`.
2. Buka file `.env` di folder root dan sesuaikan konfigurasinya:
```env
DB_DSN="mysql:host=localhost;dbname=ypks"
DB_USERNAME="root"
DB_PASSWORD=""
APP_NAME="Yapendikra"
```

### 5. Jalankan Migrasi & Seeding Data
Gunakan perintah ini untuk membuat tabel dan memasukkan data lembaga awal:
```bash
php yii migrate
```

---

## 🖥️ Cara Menjalankan
Akses website melalui browser:
- **Frontend (Pengunjung)**: `http://localhost/ypks/public/`
- **Backend (Admin)**: `http://localhost/ypks/public/admin`

---

## 🔐 Akses Administrator
Untuk login ke Dashboard Admin, silakan gunakan akun yang sudah didaftarkan lewat fitur Signup atau buat akun melalui terminal:
```bash
# Contoh mendaftarkan user via Signup di frontend lalu login ke backend
```

---

## 🏗️ Struktur Folder Utama
- `backend/`: Sistem manajemen konten (Admin Panel).
- `frontend/`: Halaman publik (Profile, Berita, Galeri).
- `common/`: Berbagi model (Lembaga, Berita, Galeri) antar sistem.
- `public/`: Direktori publik (Webroot) untuk penyimpanan gambar & aset.

---
**© 2026 Yayasan Pendidikan Karanganyar Surakarta.**  
*Ditenagai oleh Yii2 Framework*
