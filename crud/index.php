<?php
// crud/index.php
session_start();
// Komentar: Cek otentikasi
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}

require_once '../config.php';
$data = [];

// Query untuk mengambil semua data
$sql = "SELECT id, nama, gambar_path FROM " . TABLE_CRUD . " ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head><title>Data CRUD</title></head>
<body>
    <h1>Data CRUD Mahasiswa</h1>
    <p>Logged in as: <b><?php echo $_SESSION["nama"]; ?></b> (<a href="../logout.php">Logout</a>)</p>
    <p><a href="create.php">Tambah Data Baru</a></p>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama (Nama & NIM)</th>
                <th>Gambar (Pas Foto)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td>
                    <img src="<?php echo $row['gambar_path']; ?>" width="100" alt="Pas Foto">
                </td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (empty($data)): ?>
        <p>Belum ada data yang tersimpan.</p>
    <?php endif; ?>
</body>
</html>