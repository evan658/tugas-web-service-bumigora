<?php
// mvc_app/index.php (Front Controller)
// Komentar: File ini bertindak sebagai router yang mengarahkan request ke Controller yang tepat

session_start();
// Cek otentikasi
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

// Memuat konfigurasi dan koneksi database
require_once '../config.php'; 
// Memuat Class Model dan Controller
require_once 'Model.php';
require_once 'Controller.php';

// Inisialisasi Model dan Controller
$model = new ItemModel($conn);
$controller = new ItemController($model);

// Routing - menentukan aksi berdasarkan parameter 'action'
$action = $_GET['action'] ?? 'index'; 

// Memanggil metode (aksi) yang sesuai di Controller
switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    // Tambahkan case untuk update dan delete jika implementasi MVC diperluas
    default:
        $controller->index();
        break;
}

$conn->close();
?>