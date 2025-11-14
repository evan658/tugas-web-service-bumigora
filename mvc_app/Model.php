<?php
// mvc_app/Model.php
// Komentar: Class Models - Berinteraksi langsung dengan Database

class ItemModel {
    private $conn;

    // Konstruktor
    public function __construct($db_conn) {
        $this->conn = $db_conn;
    }

    // Metode READ: Mengambil semua data dari tabel barang
    public function getAllItems() {
        $sql = "SELECT id, nama, gambar_path FROM " . TABLE_CRUD . " ORDER BY id DESC";
        $result = $this->conn->query($sql);
        $items = [];
        if ($result->num_rows > 0) {
            // Komentar: Mengambil data dan menyimpannya dalam array asosiatif
            while($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
        }
        return $items;
    }

    // Metode CREATE: Menyimpan data baru
    public function createItem($nama, $gambar_path) {
        $sql = "INSERT INTO " . TABLE_CRUD . " (nama, gambar_path) VALUES (?, ?)";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ss", $nama, $gambar_path);
            // Komentar: Mengembalikan hasil eksekusi (true/false)
            return $stmt->execute(); 
        }
        return false;
    }
    
    // Tambahkan metode updateItem() dan deleteItem() untuk implementasi MVC lengkap
}
?>