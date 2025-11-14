<?php
// config.php
// Komentar: File konfigurasi untuk koneksi database MySQL

// Variabel konfigurasi database
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Ganti jika username database Anda berbeda
define('DB_PASSWORD', '');     // Ganti jika password database Anda berbeda
define('DB_NAME', 'web_service_tugas'); // Nama database yang harus Anda buat

// Membuat koneksi ke database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Konfigurasi nama tabel
define('TABLE_USER', 'users');
define('TABLE_CRUD', 'barang'); 

// Struktur tabel yang dibutuhkan:
/*
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL, -- Digunakan sebagai username
    nim VARCHAR(20) NOT NULL UNIQUE, -- Digunakan sebagai password
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE barang (
    id INT AUTO_INCREMENT PRIMARY KEY, -- ID
    nama VARCHAR(255) NOT NULL, -- Nama (Diisi dengan Nama dan NIM)
    gambar_path VARCHAR(255) NOT NULL, -- Path ke file pas foto
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
*/
?>