# AdminKos
"Admin Kos" adalah sebuah aplikasi administrasi untuk pengelolaan kos atau asrama. Aplikasi ini memungkinkan admin kos untuk melakukan manajemen data penghuni.

mysql> CREATE DATABASE pemesanan_kamar;

mysql> use pemesanan_kamar
Database changed
mysql> CREATE TABLE pesanan (
    ->   id INT AUTO_INCREMENT PRIMARY KEY,
    ->   nama VARCHAR(255) NOT NULL,
    ->   kamar VARCHAR(255) NOT NULL,
    ->   umur INT NOT NULL,
    ->   jumlah_hari INT NOT NULL,
    ->   total_biaya INT NOT NULL,
    ->   tanggal DATETIME NOT NULL
    -> );
