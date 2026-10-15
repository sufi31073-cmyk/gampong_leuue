# Website Gampong Leuue (Sistem Informasi Desa)

Website ini adalah platform terintegrasi (Sistem Informasi Desa/Gampong) yang dibangun menggunakan **Laravel 11**, **Tailwind CSS v4**, dan **Filament PHP**. 
Sistem ini memfasilitasi pelayanan administrasi warga (E-Surat), portal informasi publik (Kabar, Wisata, UMKM), pelaporan aspirasi, serta transparansi dokumen gampong.

## Fitur Utama

### 1. Panel Admin (Back-End)
- **Manajemen Pengguna (Role):** Akses yang aman untuk admin utama dan perangkat gampong.
- **E-Service (E-Surat):** Admin dapat memverifikasi, memproses, menolak, dan **Mencetak Surat** permohonan dari warga langsung ke bentuk fisik ber-kop surat.
- **Master Data (CMS):** Mengelola Profil Gampong (Visi Misi, Sejarah, Struktur), Berita, Destinasi Wisata, dan Direktori UMKM warga.
- **Transparansi & Aspirasi:** Mengunggah dokumen APBG dan membaca kotak saran/aduan warga.

### 2. Publik (Front-End)
- **Beranda Cerdas:** Desain modern dengan *Glassmorphism* dan animasi interaktif.
- **Layanan Surat Mandiri:** Warga bisa mengajukan surat Keterangan (Domisili, Miskin, dll) via online dari HP/Laptop.
- **Cek Resi Surat:** Memantau status pengajuan dengan memasukkan nomor resi/NIK.
- **Lapor Aspirasi:** Mengirimkan keluhan fasilitas umum secara rahasia dan aman.

---

## Panduan Instalasi (Development)

Pastikan sistem Anda telah terpasang **PHP 8.2+**, **Composer**, **Node.js**, dan **MySQL**.

1. **Clone & Install Dependencies**
   ```bash
   git clone <repo_url>
   cd website-desa
   composer install
   npm install
   ```

2. **Pengaturan Environment**
   Salin file `.env.example` menjadi `.env`.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Atur koneksi database di file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=website_desa
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Migrasi Database & Storage**
   ```bash
   php artisan migrate
   php artisan storage:link
   ```

4. **Buat Akun Admin Pertama**
   Anda bisa menggunakan *Tinker* untuk membuat akun Super Admin:
   ```bash
   php artisan tinker
   # Di dalam tinker jalankan:
   User::create(['name' => 'Admin Utama', 'email' => 'admin@desa.com', 'password' => bcrypt('password'), 'role' => 'admin_utama']);
   ```

5. **Jalankan Aplikasi**
   Buka 2 terminal dan jalankan server lokal:
   ```bash
   # Terminal 1 (Menjalankan server Laravel)
   php artisan serve

   # Terminal 2 (Menjalankan Vite asset compiler)
   npm run dev
   ```

---

## Panduan Penggunaan

### Mengakses Panel Admin
1. Buka browser dan arahkan ke: `http://localhost:8000/admin`
2. Login menggunakan kredensial yang dibuat di langkah instalasi (contoh: `admin@desa.com` / `password`).
3. Di *sidebar*, Anda akan melihat seluruh menu manajemen:
   - **Profil Desa:** Isi data visi misi, sejarah, dll agar tampil di halaman publik `/profil`.
   - **Data Master:** Isi kategori dan template surat.
   - **Pengajuan Surat:** Tempat melihat dan **mencetak surat** yang diajukan warga.

### Proses Cetak Surat
1. Buka menu **Pengajuan Surat** (Letter Requests) di Admin Panel.
2. Saat ada pengajuan baru berstatus "Pending" (Menunggu), periksa data warga (NIK, Nama).
3. Jika disetujui, ubah status menjadi **Diproses** atau **Selesai**.
4. Tombol **Cetak** (ikon printer hijau) akan muncul. Klik tombol tersebut untuk membuka halaman khusus cetak.
5. Klik "Cetak Surat Sekarang" untuk mengeprint surat beserta Kop Surat Resmi Gampong.

### Layanan Mandiri Warga
1. Warga membuka halaman utama web (`http://localhost:8000`).
2. Klik tombol **Urus Surat Sekarang** (atau menu Layanan).
3. Isi NIK, Nama, Keperluan, dan unggah foto lampiran jika ada.
4. Simpan **Nomor Resi** yang muncul setelah pengajuan berhasil.
5. Gunakan form **Lacak Status Surat** dengan nomor resi tersebut untuk melihat prosesnya (Menunggu, Diproses, atau Selesai).

---

## Struktur Direktori Penting
- `app/Filament/Resources/` = Logic dan formulir dari Panel Admin.
- `resources/views/pages/` = Tampilan HTML (Blade) untuk halaman publik (Front-End).
- `resources/views/print/` = Tampilan HTML khusus untuk mencetak E-Surat.
- `app/Http/Controllers/FrontEndController.php` = Pengatur alur halaman depan.
- `tailwind.config.js` = Pengaturan tema, warna, dan animasi Front-End.

---
*Dibuat menggunakan Laravel 11 + Filament v3. Hak Cipta &copy; Gampong Leuue.*
