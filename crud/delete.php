<?php
// crud/delete.php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

require_once '../config.php';

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    $id = trim($_GET["id"]);

    // Ambil path gambar untuk dihapus dari server sebelum record dihapus
    $sql_select = "SELECT gambar_path FROM " . TABLE_CRUD . " WHERE id = ?";
    if($stmt_select = $conn->prepare($sql_select)){
        $stmt_select->bind_param("i", $param_id_select);
        $param_id_select = $id;
        $stmt_select->execute();
        $result = $stmt_select->get_result();
        $row = $result->fetch_assoc();
        $image_to_delete = $row['gambar_path'] ?? null;
        $stmt_select->close();
    }
    
    // Query DELETE data
    $sql = "DELETE FROM " . TABLE_CRUD . " WHERE id = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("i", $param_id);
        $param_id = $id;
        
        if($stmt->execute()){
            // Hapus file gambar dari server
            if($image_to_delete && file_exists($image_to_delete)) {
                 unlink($image_to_delete);
            }
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Terjadi kesalahan. Silakan coba lagi.";
        }
    }
    $conn->close();
} else{
    header("location: index.php");
    exit();
}
?>