<?php
// WAJIB: Data Nama dan NIM
$nama_mahasiswa = "Stevano Marawo"; 
$nim_mahasiswa  = "2301010045"; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poin 4: Layout Grid & Flexbox</title>
    <style>
        /* WAJIB: Menggunakan CSS Grid untuk Layout utama */
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 3fr; /* Sidebar 1/4, Konten 3/4 */
            grid-template-rows: auto 1fr auto; /* Header, Konten, Footer */
            gap: 10px;
            height: 100vh;
        }
        header, footer {
            grid-column: 1 / span 2; /* Header & Footer mengambil 2 kolom */
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .sidebar {
            background-color: #f4f4f4;
            padding: 15px;
        }
        .content {
            padding: 15px;
            background-color: #fff;
        }
        /* WAJIB: Menggunakan Flexbox di dalam Content untuk iklan dan teks */
        .iklan-flex {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            align-items: center; /* Rata tengah vertikal */
        }
        .iklan-flex img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="grid-container">
    <header>
        <h1>Layout CSS Grid & Flexbox</h1>
    </header>
    
    <div class="sidebar">
        <p>Sidebar Navigasi</p>
        <p>NAMA: <?php echo $nama_mahasiswa; ?></p>
        <p>NIM: <?php echo $nim_mahasiswa; ?></p>
    </div>
    
    <div class="content">
        <h2>Konten Utama</h2>
        
        <div class="iklan-flex">
            <img src="assets/img/iklan.jpg" alt="Iklan Produk">
            <div>
                <h3>Iklan Spesial Hari Ini!</h3>
                <p>Dapatkan penawaran terbaik untuk web service kami.</p>
            </div>
        </div>
    </div>
    
    <footer>
        <p>&copy; 2025. Layout Grid & Flexbox | **<?php echo $nama_mahasiswa; ?>**</p>
    </footer>
</div>

</body>
</html>