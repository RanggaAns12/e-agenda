# 📑 E-Agenda - Sistem Informasi Manajemen Agenda & Arsip Surat

E-Agenda adalah aplikasi berbasis web yang dirancang untuk mendigitalisasi manajemen persuratan di lingkungan instansi pemerintah daerah. Sistem ini mempermudah pencatatan, pengarsipan, disposisi, dan klasifikasi surat masuk maupun surat keluar dengan antarmuka yang modern, responsif, dan elegan.

---

## 🚀 Fitur Utama

### 1. Dashboard Statistik Premium
* **Statistik Volume Arsip Bulanan**: Grafik batang interaktif menggunakan **ApexCharts** untuk melacak volume surat masuk dan keluar secara langsung.
* **Filter Tahun Tanpa Reload**: Pergantian tahun data pada grafik dimuat secara instan melalui AJAX/JSON tanpa me-reload halaman.
* **Animasi "Air Naik" (Water Rising)**: Bar chart memiliki efek transisi dinamis seperti air pasang yang naik dari bawah ke atas secara bertahap (sequential delay) saat filter tahun diubah.
* **Gradasi Air & Capsule Design**: Desain batang chart berbentuk kapsul membulat modern dengan perpaduan gradasi warna air premium (*Sky Blue* ke *Royal Blue*).
* **Kartu Statistik Dinamis**: Dilengkapi dengan animasi penghitung angka (*number counter up*) untuk metrik Surat Masuk, Surat Keluar, Disposisi, dan Pengguna.

### 2. Manajemen Surat Masuk (Incoming Letters)
* Pencatatan nomor agenda, nomor surat, instansi asal, tanggal terima, dan isi ringkas.
* Pengunggahan file berkas lampiran (PDF / Gambar) beserta panel **Pratinjau Langsung (Live Preview)** di halaman detail tanpa perlu mengunduh terlebih dahulu.
* Integrasi langsung untuk pembuatan disposisi bagi pimpinan.

### 3. Manajemen Surat Keluar (Outgoing Letters)
* Pencatatan surat keluar, nomor agenda, nomor surat, tanggal surat, tujuan surat, dan isi ringkas.
* Upload berkas lampiran pendukung dengan fitur pratinjau dokumen.

### 4. Lembar Disposisi Surat (Letter Disposition)
* Penerusan perintah/instruksi dari pimpinan kepada petugas pelaksana terkait surat masuk tertentu.
* Pelacakan status pengerjaan yang diberi label warna interaktif (*Proses*, *Diteruskan*, *Selesai*, *Ditolak*).

### 5. Klasifikasi Surat (Letter Classification)
* Manajemen kode klasifikasi arsip surat standar administrasi negara (seperti Keuangan, Kepegawaian, Umum, Keamanan, dll) untuk mempermudah kategorisasi berkas.

### 6. Manajemen Pengguna & Hak Akses (Role-Based Access Control)
* Pembatasan hak akses berbasis peran (*Role-Based Access Control* / RBAC):
  * **Admin**: Memiliki akses penuh terhadap seluruh sistem termasuk menambah, mengubah, dan menghapus akun Petugas pada menu **Pengguna**.
  * **Petugas**: Hanya memiliki akses untuk mengelola Surat Masuk, Surat Keluar, Klasifikasi, dan Disposisi. **Menu Pengguna disembunyikan sepenuhnya** dari sidebar dan dilindungi dari akses URL langsung.

---

## 🛠️ Langkah-Langkah Penginstalan

Ikuti instruksi berikut untuk menjalankan proyek E-Agenda di server lokal Anda:

### 1. Kebutuhan Sistem
* PHP >= 8.2
* Composer >= 2.0
* Node.js & npm
* MySQL / MariaDB (atau database pilihan Anda)

### 2. Persiapan Repositori & Dependensi
Buka terminal di direktori proyek dan jalankan perintah berikut:

```bash
# 1. Install dependensi PHP (Composer)
composer install

# 2. Install dependensi Javascript (NPM)
npm install
```

### 3. Konfigurasi Environment File
Salin file `.env.example` menjadi `.env` dan sesuaikan koneksi database Anda:

```bash
cp .env.example .env
```

Buka file `.env` di text editor Anda, lalu sesuaikan bagian database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_agenda
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi & Pengisian Data Uji (Database Seeding)
Buat database kosong bernama `e_agenda` di MySQL Anda, kemudian jalankan migrasi dan seeder untuk membuat tabel serta mengisinya dengan **50 data tiruan khas Indonesia** untuk setiap fitur:

```bash
# 1. Jalankan migrasi tabel
php artisan migrate

# 2. Jalankan Seeder Database (Membuat data uji instansi Indonesia secara otomatis)
php artisan db:seed
```

### 5. Kompilasi Aset Frontend
Jalankan dev server vite untuk mengompilasi CSS (Tailwind) dan JavaScript secara real-time:

```bash
npm run dev
```

### 6. Jalankan Server Lokal Laravel
Di jendela terminal terpisah, jalankan server pengembangan Laravel:

```bash
php artisan serve
```
Aplikasi sekarang dapat diakses melalui browser Anda di alamat: `http://127.0.0.1:8000`

---

## 🔑 Akun Login Uji Coba

Gunakan kredensial berikut untuk masuk ke dalam aplikasi:

| Peran (Role) | Username | Password | Deskripsi |
| :--- | :--- | :--- | :--- |
| **Administrator** | `admin` | `password` | Akses penuh, dapat mengelola akun pengguna lain |
| **Petugas** | `petugas1` | `password` | Hanya mengelola surat masuk, surat keluar, klasifikasi, & disposisi |

---

## 📁 Struktur Folder Utama Proyek
* **`app/Http/Controllers/`**: Logika bisnis backend utama (termasuk `DashboardController` untuk data agregasi grafik).
* **`app/Models/`**: Model Eloquent data database (`SuratMasuk`, `SuratKeluar`, `Disposisi`, `KlasifikasiSurat`, `User`).
* **`database/seeders/`**: Script pengisi data otomatis untuk uji coba fungsionalitas sistem.
* **`resources/views/`**: Halaman tampilan UI menggunakan Blade Template & Tailwind CSS.
  * `/surat_masuk`: Halaman kelola surat masuk & live preview dokumen.
  * `/surat_keluar`: Halaman kelola surat keluar.
  * `/disposisi`: Halaman lembar disposisi pimpinan.
  * `/klasifikasi`: Halaman kode klasifikasi persuratan.
  * `/users`: Manajemen akun user/petugas (khusus Admin).
  * `/layouts`: Komponen tata letak layout seperti sidebar & navbar.
