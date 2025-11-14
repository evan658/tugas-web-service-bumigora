<?php
// mvc_app/Controller.php
// Komentar: Class Controller - Menerima request, memanggil Model, memuat View

class ItemController {
    private $model;

    // Konstruktor, menerima instance Model
    public function __construct($model) {
        $this->model = $model;
    }

    // Aksi INDEX: Menampilkan daftar item (READ)
    public function index() {
        // 1. Panggil Model untuk mendapatkan data
        $items = $this->model->getAllItems();
        
        // 2. Muat View
        // Komentar: Variabel $items akan digunakan di item_list.php
        include 'views/item_list.php'; 
    }

    // Aksi CREATE: Menangani form dan proses penambahan data
    public function create() {
        $message = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Logika proses upload gambar dan penentuan $nama/$gambar_path sama seperti di crud/create.php
            
            // Contoh Sederhana:
            $nama = $_SESSION["nama"] . " - " . $_SESSION["nim"]; 
            $gambar_path = "crud/uploads/default_image.jpg"; // Path gambar sementara

            // 1. Panggil Model untuk menyimpan data
            if ($this->model->createItem($nama, $gambar_path)) {
                $message = "Data MVC berhasil disimpan!";
            } else {
                $message = "Gagal menyimpan data MVC.";
            }
            
            // Tampilkan kembali form dengan pesan status
            include 'views/item_create.php';

        } else {
            // Tampilkan form CREATE (View)
            include 'views/item_create.php';
        }
    }
}
?>