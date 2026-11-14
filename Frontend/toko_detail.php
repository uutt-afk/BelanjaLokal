<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Toko - BelanjaLokal</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f4;
            color: #333;
        }

        .navbar {
            background: #218838;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .navbar nav a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .toko-info {
            background: white;
            padding: 25px;
            border-radius: 12px;
            display: flex;
            gap: 25px;
            align-items: center;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }

        .toko-info img {
            width: 250px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .toko-info h1 {
            color: #218838;
            margin-top: 0;
        }

        .btn {
            display: inline-block;
            background: #218838;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            margin-top: 10px;
        }

        .produk-section {
            margin-top: 35px;
        }

        .produk-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .produk-card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }

        .produk-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }

        .produk-card h3 {
            margin-bottom: 8px;
        }

        .harga {
            color: #218838;
            font-weight: bold;
            font-size: 18px;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            background: #e8eee8;
        }

        @media (max-width: 700px) {
            .toko-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .toko-info img {
                width: 100%;
            }

            .produk-list {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<header class="navbar">
    <a href="index.php" class="logo">BelanjaLokal</a>

    <nav>
        <a href="index.php">Beranda</a>
        <a href="produk.php">Produk</a>
        <a href="keranjang.php">Keranjang</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<main class="container">

    <a href="index.php" class="btn">Kembali ke Beranda</a>

    <section class="toko-info">
        <img src="images/toko/toko1.jpg"
             alt="Foto Toko Lokal">

        <div>
            <h1>Toko Makanan Lokal</h1>
            <p><strong>Alamat:</strong> Surabaya, Jawa Timur</p>
            <p>
                <strong>Deskripsi:</strong>
                Toko yang menyediakan berbagai makanan lokal
                berkualitas dengan harga terjangkau.
            </p>
            <a href="#produk" class="btn">Lihat Produk</a>
        </div>
    </section>

    <section class="produk-section" id="produk">
        <h2>Produk dari Toko Ini</h2>
        <p>Temukan produk pilihan yang tersedia di toko kami.</p>

        <div class="produk-list">

            <article class="produk-card">
                <img src="images/produk/produk1.jpg"
                     alt="Keripik Pisang">
                <h3>Keripik Pisang</h3>
                <p>Keripik pisang renyah dan cocok untuk camilan.</p>
                <p class="harga">Rp15.000</p>
                <a href="produk.php" class="btn">Lihat Produk</a>
            </article>

            <article class="produk-card">
                <img src="images/produk/produk2.jpg"
                     alt="Kue Kering">
                <h3>Kue Kering</h3>
                <p>Kue kering lezat untuk menemani waktu santai.</p>
                <p class="harga">Rp25.000</p>
                <a href="produk.php" class="btn">Lihat Produk</a>
            </article>

            <article class="produk-card">
                <img src="images/produk/produk3.jpg"
                     alt="Sambal Lokal">
                <h3>Sambal Lokal</h3>
                <p>Sambal dengan cita rasa khas rumahan.</p>
                <p class="harga">Rp12.000</p>
                <a href="produk.php" class="btn">Lihat Produk</a>
            </article>

        </div>
    </section>

</main>

<footer>
    <p>&copy; 2026 BelanjaLokal</p>
    <p>Mendukung usaha lokal, membangun ekonomi bersama.</p>
</footer>

</body>
</html>