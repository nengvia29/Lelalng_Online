<?php
include 'config/koneksi.php';

// Query data untuk slider (barang terbaru)
$queryBarang = "SELECT * FROM tb_barang ORDER BY id_barang DESC LIMIT 3";
$resultBarang = mysqli_query($conn, $queryBarang);

// Query statistik
$queryStatistik = "SELECT COUNT(*) AS totalLelang, SUM(harga_akhir) AS totalDana FROM tb_lelang WHERE status = 'dibuka'";
$resultStatistik = mysqli_fetch_assoc(mysqli_query($conn, $queryStatistik));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lelangnesia - Mewah & Modern</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <header class="sticky-header">
        <div class="navbar">
            <h1 class="brand">Lelangnesia</h1>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#why-us">Mengapa Kami</a></li>
                    <li><a href="#features">Fitur</a></li>
                    <li><a href="#stats">Statistik</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Slider -->
    <section id="home" class="carousel">
        <div class="slider">
            <?php while ($barang = mysqli_fetch_assoc($resultBarang)): ?>
                <div class="slide">
                    <img src="img/<?= $barang['gambar']; ?>" alt="<?= $barang['nama_barang']; ?>">
                    <div class="caption">
                        <h2><?= $barang['nama_barang']; ?></h2>
                        <p><?= $barang['deskripsi_barang']; ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="slider-nav">
            <button class="prev"><i class="fas fa-chevron-left"></i></button>
            <button class="next"><i class="fas fa-chevron-right"></i></button>
        </div>
    </section>

    <!-- Mengapa Kami -->
    <section id="why-us" class="why-us">
        <h2>Mengapa Kami</h2>
        <div class="features">
            <div class="feature">
                <i class="fas fa-shield-alt"></i>
                <h3>Layanan Terpercaya</h3>
                <p>Jaminan keamanan dalam transaksi lelang.</p>
            </div>
            <div class="feature">
                <i class="fas fa-certificate"></i>
                <h3>Bersertifikasi Resmi</h3>
                <p>Beroperasi di bawah pengawasan hukum.</p>
            </div>
            <div class="feature">
                <i class="fas fa-university"></i>
                <h3>Dipercaya Lembaga</h3>
                <p>Didukung oleh lembaga terpercaya.</p>
            </div>
        </div>
    </section>

    <!-- Fitur -->
    <section id="features" class="features-section">
        <h2>Fitur Lelangnesia</h2>
        <div class="cards">
            <div class="card">
                <i class="fas fa-gavel"></i>
                <h3>Lelang Online</h3>
                <p>Ikuti lelang kapan saja di mana saja.</p>
            </div>
            <div class="card">
                <i class="fas fa-users"></i>
                <h3>Lelang Offline</h3>
                <p>Tatap muka untuk pengalaman langsung.</p>
            </div>
            <div class="card">
                <i class="fas fa-briefcase"></i>
                <h3>Info Lowongan</h3>
                <p>Temukan peluang kerja di dunia lelang.</p>
            </div>
        </div>
    </section>

    <!-- Statistik -->
    <section id="stats" class="stats">
        <h2>Statistik Lelangnesia</h2>
        <div class="statistics">
            <div class="stat">
                <h3 class="counter"><?= $resultStatistik['totalLelang']; ?></h3>
                <p>Lelang Berhasil</p>
            </div>
            <div class="stat">
                <h3 class="counter"><?= $resultStatistik['totalDana']; ?></h3>
                <p>Total Dana (Rp)</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2024 Lelangnesia. All rights reserved.</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
