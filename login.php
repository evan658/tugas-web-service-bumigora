<?php
// login.php
// Komentar: Proses login menggunakan Nama (User) dan NIM (Password) untuk Session

session_start(); 
require_once 'config.php';

// Jika sudah login, redirect ke halaman CRUD
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: crud/index.php");
    exit;
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']); 
    $nim = trim($_POST['nim']);   

    // Query untuk memverifikasi Nama
    $sql = "SELECT id, nama, nim FROM " . TABLE_USER . " WHERE nama = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $param_nama);
        $param_nama = $nama;

        if ($stmt->execute()) {
            $stmt->store_result();
            
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $nama_db, $nim_db);
                if ($stmt->fetch()) {
                    // Komentar: Verifikasi password (NIM)
                    if ($nim === $nim_db) {
                        // Login berhasil, buat session
                        session_regenerate_id();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["nama"] = $nama_db;
                        $_SESSION["nim"] = $nim_db;

                        // Redirect ke halaman CRUD setelah login
                        header("location: crud/index.php");
                    } else {
                        $message = "NIM (Password) salah.";
                    }
                }
            } else {
                $message = "Nama (User) tidak ditemukan.";
            }
        } else {
            $message = "Oops! Terjadi kesalahan database.";
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head><title>Login Session</title></head>
<body>
    <h1>Login Session</h1>
    <p style="color:red;"><?php echo $message; ?></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Nama (User):</label>
        <input type="text" name="nama" value="[NAMA_LENGKAP_ANDA]" required><br><br>
        <label>NIM (Password):</label>
        <input type="password" name="nim" value="[NIM_ANDA]" required><br><br>
        <input type="submit" value="Login">
    </form>
    <p>Belum punya akun? <a href="register.php">Register di sini</a>.</p>
</body>
</html>