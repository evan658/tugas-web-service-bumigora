<?php
// logout.php
// Komentar: Menghancurkan session dan mengarahkan ke halaman login

session_start();
$_SESSION = array(); // Hapus semua variabel sesi
session_destroy(); // Hancurkan sesi
header("location: login.php"); // Redirect ke halaman login
exit;
?>