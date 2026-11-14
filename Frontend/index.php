<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BelanjaLokal - Belanja Produk Lokal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="navbar">
    <a href="index.php" class="logo">BelanjaLokal</a>

    <nav>
        <a href="#beranda">Beranda</a>
        <a href="#kategori">Kategori</a>
        <a href="#toko">Toko Lokal</a>
        <a href="login.php">Login</a>
        <a href="register.php">Daftar</a>
        <a href="keranjang.php">Keranjang</a>
    </nav>
</header>

<section class="hero" id="beranda">
    <h1>Selamat Datang di BelanjaLokal</h1>
    <p>
        Temukan produk berkualitas dan dukung
        usaha lokal di sekitarmu.
    </p>

    <input
        type="text"
        id="cariToko"
        placeholder="Cari toko lokal..."
    >

    <a href="#toko" class="btn">Jelajahi Toko</a>
</section>

<section class="container" id="kategori">
    <h2>Kategori Produk</h2>

    <div class="kategori-list">
        <div class="kategori-card">
            <h3>Makanan</h3>
            <p>Berbagai makanan lokal.</p>
        </div>

        <div class="kategori-card">
            <h3>Minuman</h3>
            <p>Minuman pilihan dari usaha lokal.</p>
        </div>

        <div class="kategori-card">
            <h3>Kerajinan</h3>
            <p>Kerajinan unik buatan lokal.</p>
        </div>

        <div class="kategori-card">
            <h3>Pakaian</h3>
            <p>Produk pakaian lokal.</p>
        </div>
    </div>
</section>

<section class="container" id="toko">
    <h2>Toko Lokal Pilihan</h2>
    <p>Jelajahi toko dan temukan produk favoritmu.</p>

    <div class="toko-list">

        <div class="toko-card">
            <img
                src="images/toko/toko1.jpg"
                alt="Toko Makanan Lokal"
            >
            <h3>Toko Makanan Lokal</h3>
            <p>Menyediakan makanan berkualitas.</p>
            <p><strong>Surabaya</strong></p>
            <a href="toko_detail.php?id=1" class="btn">
                Lihat Toko
            </a>
        </div>

        <div class="toko-card">
            <img
                src="images/toko/toko2.jpg"
                alt="Toko Minuman Lokal"
            >
            <h3>Toko Minuman Lokal</h3>
            <p>Berbagai minuman segar.</p>
            <p><strong>Surabaya</strong></p>
            <a href="toko_detail.php?id=2" class="btn">
                Lihat Toko
            </a>
        </div>

        <div class="toko-card">
            <img
                src="images/toko/toko3.jpg"
                alt="Toko Kerajinan Lokal"
            >
            <h3>Toko Kerajinan Lokal</h3>
            <p>Kerajinan unik dan menarik.</p>
            <p><strong>Surabaya</strong></p>
            <a href="toko_detail.php?id=3" class="btn">
                Lihat Toko
            </a>
        </div>

    </div>
</section>

<section class="container">
    <h2>Mengapa BelanjaLokal?</h2>

    <div class="kategori-list">
        <div class="kategori-card">
            <h3>Mudah</h3>
            <p>Temukan toko lokal dalam satu website.</p>
        </div>

        <div class="kategori-card">
            <h3>Praktis</h3>
            <p>Jelajahi berbagai produk dengan mudah.</p>
        </div>

        <div class="kategori-card">
            <h3>Dukung Lokal</h3>
            <p>Bantu mengembangkan usaha lokal.</p>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2026 BelanjaLokal</p>
    <p>Mendukung usaha lokal, membangun ekonomi bersama.</p>
</footer>

<script src="js/script.js"></script>

</body>
</html>