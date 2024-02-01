<?php
// Pengaturan server dengan pengaturan default (pengguna 'root' tanpa kata sandi)
$host = 'localhost'; // server
$user = 'root';
$pass = '';
$database = 'crudphp'; // Nama Database

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $database);

// Untuk menampilkan pesan kesalahan jika koneksi tidak berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
