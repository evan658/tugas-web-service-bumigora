<?php
// crud/update.php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
require_once '../config.php';

$id = $message = '';
$current_image = '';
$current_name_nim = '';

// Ambil data lama
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    $id = trim($_GET["id"]);
    $sql = "SELECT nama, gambar_path FROM " . TABLE_CRUD . " WHERE id = ?";
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("i", $param_id);
        $param_id = $id;
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $current_name_nim = $row['nama'];
                $current_image = $row['gambar_path'];
            } else { echo "Data tidak ditemukan."; exit(); }
        } $stmt->close();
    }
} else { header("location: index.php"); exit(); }

// Proses update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_image_path = $current_image; // Default: gambar lama

    if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . time() . '_' . basename($_FILES["gambar"]["name"]);
        
        if (!is_dir($target_dir)) { mkdir($target_dir); }

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Hapus file lama jika berhasil upload yang baru
            if($current_image && file_exists($current_image)) {
                 unlink($current_image);
            }
            $new_image_path = $target_file;
        } else {
            $message = "Gagal mengunggah gambar baru.";
        }
    }

    // Query UPDATE (Hanya Gambar yang bisa diubah, Nama tetap)
    $sql = "UPDATE " . TABLE_CRUD . " SET gambar_path = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $param_gambar, $param_id);
        $param_gambar = $new_image_path;
        $param_id = $id;

        if ($stmt->execute()) {
            $message = "Data berhasil diubah!";
            $current_image = $new_image_path;
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head><title>Update Data</title></head>
<body>
    <h1>Update Data CRUD (ID: <?php echo $id; ?>)</h1>
    <p style="color:green;"><?php echo $message; ?></p>
    <form action="update.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        
        <label>Nama & NIM:</label>
        <input type="text" value="<?php echo $current_name_nim; ?>" readonly><br><br>
        
        <label>Gambar Saat Ini:</label><br>
        <img src="<?php echo $current_image; ?>" width="150" alt="Current Pas Foto"><br><br>
        
        <label>Ganti Gambar (Opsional):</label>
        <input type="file" name="gambar"><br><br>
        
        <input type="submit" value="Update Data">
        <a href="index.php">Batal</a>
    </form>
</body>
</html>