<?php
// register.php
// Komentar: Proses pendaftaran menggunakan Nama sebagai username dan NIM sebagai password

require_once 'config.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']); 
    $nim = trim($_POST['nim']);

    // Mengecek apakah NIM sudah terdaftar (NIM harus unik)
    $check_sql = "SELECT nim FROM " . TABLE_USER . " WHERE nim = ?";
    if ($stmt = $conn->prepare($check_sql)) {
        $stmt->bind_param("s", $param_nim);
        $param_nim = $nim;
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows == 1) {
            $message = "Registrasi Gagal: NIM sudah terdaftar.";
        } else {
            // Menyimpan data baru
            $insert_sql = "INSERT INTO " . TABLE_USER . " (nama, nim) VALUES (?, ?)";
            if ($stmt_insert = $conn->prepare($insert_sql)) {
                $stmt_insert->bind_param("ss", $param_nama, $param_nim);
                $param_nama = $nama;
                $param_nim = $nim;

                if ($stmt_insert->execute()) {
                    $message = "Registrasi Berhasil! Silakan Login.";
                } else {
                    $message = "Registrasi Gagal: Terjadi kesalahan database.";
                }
                $stmt_insert->close();
            }
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
    <h1>Register Akun</h1>
    <p style="color:red;"><?php echo $message; ?></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Nama (User):</label>
        <input type="text" name="nama" value="[NAMA_LENGKAP_ANDA]" required><br><br>
        <label>NIM (Password):</label>
        <input type="password" name="nim" value="[NIM_ANDA]" required><br><br>
        <input type="submit" value="Register">
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a>.</p>
</body>
</html>