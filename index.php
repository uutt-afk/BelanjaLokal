<?php
require_once "config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend BelanjaLokal</title>
</head>
<body>
    <h1>Backend BelanjaLokal</h1>
    <p>Koneksi database berhasil.</p>

    <h3>Endpoint API</h3>
    <ul>
        <li><a href="backend/kategori.php">Data kategori</a></li>
        <li><a href="backend/toko.php">Data toko</a></li>
        <li><a href="backend/produk.php">Data produk</a></li>
        <li><a href="backend/pesanan.php">Data pesanan</a></li>
        <li><a href="backend/detail_pesanan.php">Detail pesanan</a></li>
    </ul>
</body>
</html>