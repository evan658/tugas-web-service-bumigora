<?php
session_start();

if (!isset($_SESSION['nama_user'])) {
    header("Location: login.php");
    exit;
}

$nama = $_SESSION['nama_user'];
$nim  = $_SESSION['nim_user'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <div style="padding: 20px;">
        <h1>Selamat Datang, <?php echo $nama; ?>!</h1>
        <p>Anda berhasil login menggunakan NIM: <strong><?php echo $nim; ?></strong>.</p>
        
        <p><a href="logout.php">Logout</a></p>
    </div>

</body>
</html>