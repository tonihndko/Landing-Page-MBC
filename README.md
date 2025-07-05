# MBC Laboratory Landing Page

Website landing page untuk MBC Laboratory, Telkom University.

---

## Struktur Proyek

```
├── index.html              # Halaman utama landing page
├── style.css               # File CSS utama (jika ada)
├── main.js                 # File JavaScript utama (jika ada)
├── logo mbc.png            # Logo MBC untuk favicon dan header
├── NCM-logo.png            # Logo NCM
├── NCM-logo-removebg-preview.png # Logo NCM transparan
├── pp_linkedin.jpg         # Foto profil developer
├── save_contact.php        # Backend untuk menyimpan pesan kontak ke database
├── view_contacts.php       # Backend untuk menampilkan data kontak
├── submit_contact.php      # (Opsional) Backend alternatif untuk form kontak
```

---

## Instruksi Instalasi Lokal

1. **Clone repository**
   ```bash
   git clone https://github.com/tonihndko/Landing-Page-MBC.git
   cd Landing-Page-MBC
   ```

2. **Siapkan Web Server Lokal**
   - Gunakan XAMPP/Laragon/WAMP (pastikan Apache & MySQL aktif).
   - Letakkan semua file di folder `htdocs` (XAMPP) atau root web server Anda.

3. **Konfigurasi Database**
   - Buat database `mbc_laboratory` di MySQL.
   - Import tabel kontak:
     ```sql
     CREATE TABLE kontak (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100),
       email VARCHAR(100),
       subject VARCHAR(200),
       message TEXT,
       created_at DATETIME DEFAULT CURRENT_TIMESTAMP
     );
     ```
   - Edit file `save_contact.php` dan `view_contacts.php`:
     - Sesuaikan `$host`, `$user`, `$pass`, `$db` dengan konfigurasi MySQL lokal Anda.

4. **Akses Website**
   - Buka browser dan akses: `http://localhost/Landing-Page-MBC/index.html`

---

## Instruksi Deployment ke Azure App Service

1. **Siapkan Azure App Service (PHP)**
   - Buat App Service baru (runtime: PHP, misal 8.x).
   - Deploy semua file ke App Service (bisa via FTP, GitHub Actions, atau Azure CLI).

2. **Siapkan Azure Database for MySQL**
   - Buat database dan user di Azure Database for MySQL.
   - Catat host, username, password, dan nama database.
   - Pastikan firewall Azure MySQL mengizinkan koneksi dari App Service (Allow Azure services = Yes).

3. **Konfigurasi Koneksi di App Service**
   - Edit file `save_contact.php` dan `view_contacts.php`:
     - Ganti `$host`, `$user`, `$pass`, `$db` sesuai info Azure.
     - Untuk user: gunakan format `username@hostname`.
   - (Rekomendasi) Simpan kredensial di Application Settings Azure, lalu akses dengan `getenv()` di PHP.

4. **Konfigurasi SSL (HTTPS)**
   - Di portal Azure, aktifkan HTTPS Only pada App Service.
   - SSL/TLS sudah otomatis dikelola oleh Azure.
   - Untuk koneksi MySQL, gunakan SSL jika diwajibkan oleh Azure (lihat dokumentasi Azure Database for MySQL).

---

## Konfigurasi Backend

- Semua request form kontak mengarah ke `save_contact.php`.
- Data kontak disimpan ke tabel `kontak` di database.
- Untuk menampilkan data, akses `view_contacts.php`.
- Pastikan file PHP dapat mengakses database sesuai environment (lokal/azure).

---

## Catatan Tambahan
- Pastikan file gambar (logo, foto profil) ada di root folder.
- Untuk keamanan, jangan hardcode password di file PHP pada production. Gunakan environment variable.
- Jika ingin menambah fitur, gunakan best practice PHP dan sanitasi input user.

---

**Author:** Toni Handoko

