<?php
// crud/create.php
session_start();
// Komentar: Cek jika user belum login, redirect ke login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

require_once '../config.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nama dan NIM diambil dari session
    $nama_nim = $_SESSION["nama"] . " - " . $_SESSION["nim"];
    
    // Proses upload gambar (Pas Foto)
    $target_dir = "uploads/"; // Pastikan folder ini ada
    $target_file = $target_dir . time() . '_' . basename($_FILES["gambar"]["name"]); // Beri timestamp agar nama unik
    
    if (!is_dir($target_dir)) {
        mkdir($target_dir);
    }

    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        // File berhasil diunggah, simpan path ke database
        $sql = "INSERT INTO " . TABLE_CRUD . " (nama, gambar_path) VALUES (?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss", $param_nama, $param_gambar);
            $param_nama = $nama_nim;
            $param_gambar = $target_file;
            
            if ($stmt->execute()) {
                $message = "Data berhasil ditambahkan!";
            } else {
                $message = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    } else {
        $message = "Gagal mengunggah file gambar. Error: " . $_FILES["gambar"]["error"];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head><title>Create Data</title></head>
<body>
    <h1>Create Data CRUD</h1>
    <p style="color:green;"><?php echo $message; ?></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        
        <label>Nama & NIM:</label>
        <input type="text" value="<?php echo $_SESSION["nama"] . " - " . $_SESSION["nim"]; ?>" readonly><br><br>
        
        <label>Gambar (Pas Foto):</label>
        <input type="file" name="gambar" required><br><br>
        
        <input type="submit" value="Simpan Data">
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>