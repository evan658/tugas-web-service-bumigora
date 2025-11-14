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
    <title>Poin 5: Bootstrap Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* WAJIB: Styling khusus untuk memvisualisasikan layout */
        .card-img-top {
            height: 200px; /* Tinggi tetap untuk gambar card */
            object-fit: cover;
        }
        .footer {
            background-color: #f8f9fa; 
            padding: 20px 0;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Web Service Tugas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
      </ul>
      <span class="navbar-text text-light">
        <?php echo $nama_mahasiswa; ?> / <?php echo $nim_mahasiswa; ?>
      </span>
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/carousel1.jpg" class="d-block w-100" alt="Iklan 1" style="height: 400px; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Slider Pertama</h5>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/carousel2.jpg" class="d-block w-100" alt="Iklan 2" style="height: 400px; object-fit: cover;">
      <div class="carousel-caption d-none d-md-block">
        <h5>Slider Kedua</h5>
      </div>
    </div>
  </div>
</div>
<div class="container my-5">

    <h2 class="mb-4">Daftar Produk (Cards)</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="assets/img/card1.jpg" class="card-img-top" alt="Produk 1">
                <div class="card-body">
                    <h5 class="card-title">Produk Digital</h5>
                    <p class="card-text">Solusi web service terkini.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="assets/img/card2.jpg" class="card-img-top" alt="Produk 2">
                <div class="card-body">
                    <h5 class="card-title">Layanan API</h5>
                    <p class="card-text">API RESTful siap pakai.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="assets/img/card3.jpg" class="card-img-top" alt="Produk 3">
                <div class="card-body">
                    <h5 class="card-title">Backend Development</h5>
                    <p class="card-text">Optimasi kinerja server.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container text-center">
    <span class="text-muted">Tugas Pemrograman Web Service &copy; 2025 | Dibuat oleh: **<?php echo $nama_mahasiswa; ?> (<?php echo $nim_mahasiswa; ?>)**</span>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>