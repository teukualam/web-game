### BAGIAN 1: Persiapan Kamu (Sebagai Pengirim) 📤

Sebelum menyalin ke Flashdisk, lakukan ini:

#### 1\. Export Database (Wajib\!)

Project kamu tidak akan jalan tanpa data game dan user yang sudah kamu input.

1.  Buka **phpMyAdmin** (`http://localhost/phpmyadmin`).
2.  Pilih database kamu: **`db_webgame`**.
3.  Klik menu **Export** di bagian atas.
4.  Klik tombol **Export** (Quick).
5.  Kamu akan dapat file bernama **`db_webgame.sql`**. Simpan file ini.

#### 2\. Bersihkan Cache (Opsional tapi Bagus)

Buka terminal VS Code, jalankan:

```bash
php artisan optimize:clear
```

#### 3\. Kompres Project ke ZIP (Sangat Penting\!) 📦

Folder Laravel berisi ribuan file kecil (di dalam folder `vendor` dan `node_modules`). Jika kamu copy folder biasa ke Flashdisk, **bisa memakan waktu berjam-jam**.

1.  Masuk ke file manager/explorer.
2.  Klik kanan folder project `web-game`.
3.  Pilih **Compress to ZIP** (atau Add to Archive).
4.  Copy file **`web-game.zip`** dan **`db_webgame.sql`** ke Flashdisk.

-----

### BAGIAN 2: Panduan untuk User Penerima (Instruksi Setup) 📥

Kamu bisa copy-paste instruksi ini ke file `README.txt` dan masukkan ke Flashdisk agar temanmu bisa membacanya.

Berikut langkah-langkah yang harus dilakukan temanmu di komputernya:

#### Syarat Utama:

  * Sudah install **XAMPP** (Pastikan PHP versi 8.2 atau lebih baru).
  * Sudah install **Composer** (Jika perlu update dependency).
  * Sudah install **Node.js** (Untuk tampilan CSS/Tailwind).

#### Langkah 1: Ekstrak File

1.  Copy file ZIP dari Flashdisk ke komputer (disarankan simpan di `C:\xampp\htdocs` jika pakai Windows, atau folder Project biasa).
2.  **Ekstrak** file ZIP tersebut.

#### Langkah 2: Setup Database

1.  Nyalakan **Apache** dan **MySQL** di XAMPP.
2.  Buka browser, masuk ke `http://localhost/phpmyadmin`.
3.  Buat database baru dengan nama persis: **`db_webgame`** (sesuai yang ada di file `.env` project).
4.  Klik database tersebut, lalu pilih menu **Import**.
5.  Pilih file **`db_webgame.sql`** dari Flashdisk, lalu klik **Import**.

#### Langkah 3: Konfigurasi Environment (.env)

1.  Buka folder project di VS Code.
2.  Cek file bernama **`.env`**.
3.  Pastikan settingan database sesuai dengan komputer penerima (biasanya password root kosong jika XAMPP standar):
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_webgame
    DB_USERNAME=root
    DB_PASSWORD=
    ```

#### Langkah 4: Perbaiki Gambar (Storage Link) ⚠️ **PENTING**

Karena folder berpindah komputer, link gambar (symlink) biasanya rusak. Gambar game tidak akan muncul jika ini tidak dilakukan.

1.  Buka Terminal di dalam folder project.
2.  Hapus link lama (jika ada) dan buat baru dengan perintah:
    ```bash
    php artisan storage:link
    ```
    *(Jika muncul error "symlink already exists", hapus dulu folder `public/storage` secara manual, baru jalankan perintah di atas lagi).*

#### Langkah 5: Jalankan Aplikasi 🚀

User perlu membuka **2 Terminal** di VS Code:

**Terminal 1 (Menjalankan PHP):**

```bash
php artisan serve
```

**Terminal 2 (Menjalankan Aset/Tampilan):**

```bash
npm run dev
```

Sekarang buka browser di: `http://127.0.0.1:8000`.

-----

### FAQ (Masalah yang Sering Muncul)

**Q: Tampilannya berantakan / CSS tidak memuat?**
A: Pastikan perintah `npm run dev` sudah dijalankan dan biarkan terminalnya terbuka. Jika masih error, coba jalankan `npm install` lalu `npm run build`.

**Q: Muncul Error "Vendor not found" atau "Autoload error"?**
A: Jika folder `vendor` tidak ikut ter-copy (atau corrupt), jalankan perintah ini di terminal:

```bash
composer install
```

**Q: Tidak bisa Login?**
A: Pastikan data di database sudah ter-import dengan benar. Gunakan email/password yang sudah ada di database hasil import tadi.

Selamat berbagi project\! 🎉