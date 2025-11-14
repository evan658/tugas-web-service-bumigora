<?php
// handle_form.php
// Komentar: Skrip sederhana untuk menerima dan menampilkan kembali data dari form di index.html.

$nama_nim = '';
$gender = '';

// Komentar: Cek apakah data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data Nama & NIM
    if (isset($_POST['nama_nim'])) {
        $nama_nim = htmlspecialchars($_POST['nama_nim']);
    }

    // Ambil data Gender (radio button)
    if (isset($_POST['gender'])) {
        $gender = htmlspecialchars($_POST['gender']);
    }
} else {
    // Jika diakses langsung tanpa POST
    header("location: web-dasar/index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Submit Form</title>
</head>
<body>
    <h1>Hasil Pemrosesan Form Tugas</h1>
    <p>Data ini berhasil diproses oleh file <strong>handle_form.php</strong>.</p>
    
    <hr>
    
    <h2>Detail Data:</h2>
    <ul>
        <li><strong>Nama & NIM:</strong> <?php echo $nama_nim; ?></li>
        <li><strong>Gender:</strong> <?php echo $gender; ?></li>
    </ul>

    <a href="web-dasar/index.html">Kembali ke Form</a>
</body>
</html>