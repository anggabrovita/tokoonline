# Toko Online


## Langkah-langkah pengaturan

1. Buat folder "tokorindu" di folder `../xampp/htdocs`.

2. Git Bash di dalam folder, lalu unduh repository ke dalam komputer menggunakan perintah `git clone`.

    ``
    git clone https://github.com/anggabrovita/tokoonline.git
    ``

3. Buat database MySQL atau PHPMyAdmin dengan nama `toko_oktias`.

4. Import database `toko_oktias.sql` ke dalam database yang telah Anda buat.

5. Buka file "database.php" di folder "application/config". Sesuaikan nama database, username dan password database yang Anda buat.

Itu saja! Aplikasi bisa di akses di `http://localhost/tokorindu`.

Halaman login admin bisa di akses di  `http://localhost/tokorindu/auth`.
