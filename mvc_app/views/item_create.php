<!DOCTYPE html>
<html>
<head><title>MVC View - Create</title></head>
<body>
    <h1>Form Create (MVC)</h1>
    <p style="color:green;"><?php echo $message ?? ''; ?></p>
    
    <form action="index.php?action=create" method="post">
        <label>Nama & NIM:</label>
        <input type="text" value="<?php echo $_SESSION["nama"] . " - " . $_SESSION["nim"]; ?>" readonly><br><br>
        
        <label>Status:</label>
        <input type="text" name="status" value="Data siap disimpan" readonly><br><br>
        
        <input type="submit" value="Simpan Data via Controller">
        <a href="index.php?action=index">Kembali ke Daftar</a>
    </form>
</body>
</html>