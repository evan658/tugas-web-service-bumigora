<!DOCTYPE html>
<html>
<head><title>MVC View - Daftar</title></head>
<body>
    <h1>Implementasi View (Daftar Item CRUD)</h1>
    <p>Logged in: <?php echo $_SESSION['nama'] . " - " . $_SESSION['nim']; ?></p>
    <p><a href="index.php?action=create">Tambah Item Baru (MVC)</a></p>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($items)):
                foreach($items as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['nama']; ?></td>
                    <td><img src="../crud/<?php echo $item['gambar_path']; ?>" width="80" alt="Foto"></td>
                </tr>
            <?php endforeach; 
            endif;
            ?>
        </tbody>
    </table>
</body>
</html>