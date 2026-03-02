# 📋 Sistem Feedback & Aspirasi Siswa

Aplikasi web berbasis **CodeIgniter 3** untuk mengelola pelaporan aspirasi dan feedback siswa kepada pihak sekolah. Siswa dapat mengajukan laporan/aspirasi, sedangkan admin dapat memantau, merespons, dan memperbarui status laporan tersebut.

---

## 🧰 Teknologi yang Digunakan

| Teknologi       | Keterangan                        |
| --------------- | --------------------------------- |
| PHP             | Bahasa pemrograman utama          |
| CodeIgniter 3   | Framework PHP (MVC)               |
| MySQL / MariaDB | Database                          |
| XAMPP / LAMPP   | Web server lokal (Apache + MySQL) |
| Bootstrap       | Styling tampilan frontend         |

---

## 📁 Struktur Folder `application/`

Folder `application/` adalah inti dari proyek ini, mengikuti pola arsitektur **MVC (Model-View-Controller)** dari CodeIgniter.

```
application/
├── config/          # Konfigurasi aplikasi (database, routing, autoload, dll.)
├── controllers/     # Logika utama aplikasi (menerima request & mengatur alur data)
├── models/          # Interaksi dengan database
├── views/           # Tampilan halaman HTML
├── core/            # Ekstensi core CI (jika ada)
├── helpers/         # Helper functions tambahan
├── hooks/           # Hooks CI (jika ada)
├── libraries/       # Library tambahan
├── language/        # File bahasa
├── logs/            # File log error
├── cache/           # Folder cache
└── third_party/     # Library pihak ketiga
```

---

### ⚙️ `application/config/`

Berisi file-file konfigurasi penting:

| File            | Keterangan                                                             |
| --------------- | ---------------------------------------------------------------------- |
| `config.php`    | Konfigurasi umum aplikasi (base URL, encryption key, timezone, dll.)   |
| `database.php`  | Konfigurasi koneksi database (host, username, password, nama database) |
| `routes.php`    | Pengaturan routing URL. Default controller: `SiswaAuth`                |
| `autoload.php`  | Menentukan library/helper yang otomatis dimuat (termasuk `session`)    |
| `constants.php` | Konstanta global aplikasi                                              |

---

### 🎮 `application/controllers/`

Controller adalah penghubung antara request dari browser, model (database), dan view (tampilan).

#### `SiswaAuth.php`

Mengatur autentikasi untuk **siswa**.

- `index()` – Menampilkan halaman login siswa. Jika sudah login, redirect ke halaman pelaporan.
- `login_action()` – Memproses login siswa menggunakan NIS dan Kelas.
- `logout()` – Menghapus session dan redirect ke halaman login.

#### `AdminAuth.php`

Mengatur autentikasi untuk **admin**.

- `index()` – Menampilkan halaman login admin. Jika sudah login sebagai admin, redirect ke dashboard admin; jika sebagai siswa, redirect ke pelaporan.
- `login_action()` – Memproses login admin menggunakan username dan password.
- `logout()` – Menghapus session dan redirect ke halaman login admin.

#### `Pelaporan.php`

Mengelola fitur **pelaporan aspirasi oleh siswa**.

- `index()` – Menampilkan daftar pelaporan milik siswa yang sedang login (role: 2).
- `add()` – Menyimpan data pelaporan baru ke tabel `input_aspirasi`.
- `detail($id)` – Menampilkan detail pelaporan beserta daftar aspirasi/feedback yang terkait.

#### `Aspirasi.php`

Mengelola fitur **aspirasi/feedback oleh admin** terhadap pelaporan siswa.

- `index()` – Menampilkan daftar semua pelaporan (khusus admin, role: 1).
- `add()` – Menyimpan data aspirasi (feedback + status) ke tabel `aspirasi`.
- `detail($id)` – Menampilkan detail pelaporan beserta riwayat aspirasi yang diberikan.

#### `Siswa.php`

Manajemen data **siswa** (CRUD) oleh admin.

- `index()` – Menampilkan daftar seluruh siswa.
- `add()` – Menambah data siswa baru (NIS, nama, kelas, jenis kelamin).
- `edit()` – Mengubah data siswa berdasarkan NIS lama.
- `delete($id)` – Menghapus data siswa.
- `api()` – Mengembalikan data siswa dalam format JSON.

#### `Kategori.php`

Manajemen **kategori pelaporan** (CRUD) oleh admin.

- `index()` – Menampilkan daftar kategori.
- `add()` – Menambah kategori baru.
- `edit()` – Mengubah nama kategori.
- `delete($id)` – Menghapus kategori.

#### `Admin.php`

Manajemen akun **admin** (CRUD).

- `index()` – Menampilkan daftar akun admin.
- `add()` – Menambah akun admin baru.
- `edit()` – Mengubah data akun admin.
- `delete($id)` – Menghapus akun admin.

---

### 🗃️ `application/models/`

Model bertugas berkomunikasi langsung dengan database menggunakan Query Builder CodeIgniter.

| Model                | Tabel Utama                  | Keterangan                                       |
| -------------------- | ---------------------------- | ------------------------------------------------ |
| `SiswaModel.php`     | `siswa`                      | Login siswa, CRUD data siswa                     |
| `AdminModel.php`     | `admin`                      | Validasi login admin, CRUD akun admin            |
| `KategoriModel.php`  | `kategori`                   | CRUD data kategori pelaporan                     |
| `PelaporanModel.php` | `input_aspirasi`, `aspirasi` | CRUD pelaporan & aspirasi (digunakan oleh siswa) |
| `AspirasiModel.php`  | `input_aspirasi`, `aspirasi` | CRUD pelaporan & aspirasi (digunakan oleh admin) |

---

### 🖼️ `application/views/`

Berisi file tampilan (HTML + PHP) yang dirender oleh controller.

```
views/
├── template.php          # Layout utama yang digunakan oleh semua halaman
├── welcome_message.php   # Halaman welcome default CI
├── page/                 # Halaman-halaman utama aplikasi
│   ├── login_view.php          # Halaman login admin
│   ├── login_siswa.php         # Halaman login siswa
│   ├── aspirasi_view.php       # Halaman daftar aspirasi (admin)
│   ├── aspirasi_detail_view.php # Halaman detail aspirasi + form feedback
│   ├── pelaporan_view.php      # Halaman daftar pelaporan (siswa)
│   ├── pelaporan_detail_view.php # Halaman detail pelaporan (siswa)
│   ├── siswa_view.php          # Halaman manajemen data siswa
│   ├── kategori_view.php       # Halaman manajemen kategori
│   └── admin_view.php          # Halaman manajemen akun admin
└── errors/               # Tampilan halaman error
```

Semua halaman utama di-_load_ melalui `template.php` yang bertindak sebagai layout bersama (header, sidebar, konten, footer).

---

### 🗄️ Struktur Database

Database terdiri dari 5 tabel:

| Tabel            | Keterangan                                                                              |
| ---------------- | --------------------------------------------------------------------------------------- |
| `admin`          | Data akun admin (id, username, password, nama)                                          |
| `siswa`          | Data siswa (NIS, nama, kelas, jenis kelamin)                                            |
| `kategori`       | Kategori pelaporan (id_kategori, nama_kategori)                                         |
| `input_aspirasi` | Data pelaporan dari siswa (id_pelaporan, NIS, kategori, lokasi, keterangan, tanggal)    |
| `aspirasi`       | Data feedback/respons dari admin (id_aspirasi, status, id_pelaporan, feedback, tanggal) |

File SQL tersedia di folder `file_database/`:

- `db-template.sql` – File database utama beserta data contoh

---

## 🚀 Cara Menjalankan Aplikasi

### 1. Persyaratan

- **XAMPP** atau **LAMPP** terinstall (Apache + MySQL)
- PHP versi **7.4** atau lebih baru
- Browser modern (Chrome, Firefox, Edge)

### 2. Clone / Salin Project

Salin seluruh folder project ke direktori root server:

- **XAMPP (Windows):** `C:/xampp/htdocs/web-rpl-bc`
- **LAMPP (Linux):** `/opt/lampp/htdocs/web-rpl-bc`

### 3. Import Database

1. Buka **phpMyAdmin** di browser: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Buat database baru dengan nama: `web_rpl_bc`
3. Pilih database tersebut, lalu klik tab **Import**
4. Upload file `file_database/db-template.sql`
5. Klik **Go / Impor**

### 4. Konfigurasi Database

Buka file `application/config/database.php` dan sesuaikan pengaturan berikut:

```php
$db['default'] = array(
    'hostname' => 'localhost',   // Host database (biasanya localhost)
    'username' => 'root',        // Username MySQL (default XAMPP: root)
    'password' => '',            // Password MySQL (default XAMPP: kosong)
    'database' => 'db-ubay',     // Nama database yang sudah dibuat
    'dbdriver' => 'mysqli',
    // ...
);
```

### 5. Konfigurasi Base URL

Buka file `application/config/config.php`, pastikan `base_url` sesuai:

```php
$config['base_url'] = 'http://localhost/web-rpl-bc/';
```

### 6. Jalankan Server

1. Aktifkan **Apache** dan **MySQL** melalui panel XAMPP/LAMPP
2. Buka browser dan akses: [http://localhost/web-rpl-bc](http://localhost/web-rpl-bc)

---

## 🔐 Akun Default

### Login Siswa

| Field | Contoh 1     | Contoh 2      |
| ----- | ------------ | ------------- |
| NIS   | `1001`       | `1002`        |
| Kelas | `XII RPL 2`  | `XII RPL 2`   |
| Nama  | `Adam Baker` | `Maria Scott` |

### Login Admin

| Field    | Nilai  |
| -------- | ------ |
| Username | `john` |
| Password | `john` |

---

## 🗺️ Alur Penggunaan

```
[Siswa] → Login (NIS + Kelas) → Input Pelaporan → Lihat Status
[Admin] → Login (Username + Password) → Lihat Pelaporan → Berikan Feedback/Aspirasi → Update Status
```

---

## 👥 Role Pengguna

| Role  | Nilai | Akses                                                                |
| ----- | ----- | -------------------------------------------------------------------- |
| Admin | `1`   | Dashboard admin, manajemen siswa, kategori, aspirasi, dan akun admin |
| Siswa | `2`   | Halaman pelaporan pribadi, input laporan baru, lihat status          |
