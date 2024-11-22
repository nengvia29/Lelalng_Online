<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_barang WHERE id_barang = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
</head>
<body>
    <h1><?= $data['nama_barang']; ?></h1>
    <p>Deskripsi: <?= $data['deskripsi_barang']; ?></p>
    <p>Harga Awal: <?= $data['harga_awal']; ?></p>
    <a href="tawar.php?id=<?= $data['id_barang']; ?>">Tawar Barang</a>
</body>
</html>
