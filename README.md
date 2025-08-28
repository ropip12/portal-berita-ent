# portal-berita-ent
Portal Berita ENT PENS adalah sebuah website berita yang dikembangkan untuk organisasi ENT PENS.
Deskripsi Project
Portal Berita ENT PENS adalah sebuah website berita yang dikembangkan untuk organisasi ENT PENS. Website ini terdiri dari dua bagian utama:

Frontend untuk Pengunjung: Halaman beranda yang menampilkan berita terbaru, halaman detail berita, dan halaman kategori berita.

Backend untuk Admin: Dashboard admin untuk mengelola konten berita (tambah, edit, hapus) dengan sistem autentikasi.

Fitur yang tersedia:

Menampilkan berita terbaru di halaman utama

Sistem kategori berita

Pencarian berita di admin panel

CRUD (Create, Read, Update, Delete) berita

Upload gambar untuk berita

Responsive design untuk berbagai perangkat

Teknologi yang digunakan:

PHP (Native)

MySQL

Bootstrap 5

JavaScript

Tahapan Instalasi
1. Persiapan Server Web
Pastikan Anda memiliki server web dengan PHP dan MySQL terinstall. XAMPP, WAMP, atau LAMP dapat digunakan.

2. Clone/Download Project
Download semua file project dan letakkan di folder htdocs (XAMPP) atau www (WAMP) atau folder root server web Anda.

3. Database Setup

4. Konfigurasi Koneksi Database

 5.Folder Permission
Pastikan folder uploads/ memiliki izin tulis (permission 755 atau 777) untuk mengizinkan upload gambar.

Tahapan Menjalankan
1. Start Web Server
Jalankan Apache dan MySQL melalui XAMPP, WAMP, atau server web lainnya.

2. Akses Website
Buka browser dan akses:

http://localhost/nama-folder-project/ (untuk halaman depan)

http://localhost/nama-folder-project/login.php (untuk halaman admin)

3. Login Admin
Gunakan kredensial default:

Username: admin

Password: admin

4. Mengelola Berita
Setelah login, Anda dapat:

Menambah berita baru melalui menu "Tambah Berita"

Mengedit berita yang ada dengan tombol edit

Menghapus berita dengan tombol hapus

Melihat statistik berita di dashboard

5. Melihat Berita di Frontend
Kunjungi halaman utama untuk melihat berita yang telah ditambahkan. Pengunjung dapat:

Membaca berita lengkap dengan mengklik "Baca selengkapnya"

Melihat berita berdasarkan kategori
