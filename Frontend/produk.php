<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - BelanjaLokal</title>
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

        .judul {
            text-align: center;
            margin-bottom: 25px;
        }

        .judul h1 {
            color: #218838;
        }

        .pencarian {
            display: flex;
            gap: 10px;
            max-width: 600px;
            margin: 0 auto 30px;
        }

        .pencarian input,
        .pencarian select {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: white;
        }

        .pencarian input {
            flex: 1;
            min-width: 0;
        }

        .produk-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .produk-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.07);
        }

        .produk-card img {
            width: 100%;
            height: 190px;
            object-fit: cover;
            border-radius: 8px;
        }

        .produk-card h3 {
            margin-bottom: 8px;
        }

        .toko {
            color: #777;
            font-size: 14px;
        }

        .harga {
            color: #218838;
            font-size: 19px;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            background: #218838;
            color: white;
            text-decoration: none;
            text-align: center;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn:hover {
            background: #176b2c;
        }

        .produk-card .btn {
            display: block;
        }

        #pesanKosong {
            display: none;
            text-align: center;
            grid-column: 1 / -1;
            padding: 30px;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            background: #e8eee8;
        }

        @media (max-width: 750px) {
            .produk-list {
                grid-template-columns: repeat(2, 1fr);
            }

            .navbar {
                padding: 15px;
            }
        }

        @media (max-width: 500px) {
            .produk-list {
                grid-template-columns: 1fr;
            }

            .pencarian {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<header class="navbar">
    <a href="index.php" class="logo">BelanjaLokal</a>

    <nav>
        <a href="index.php">Beranda</a>
        <a href="toko_detail.php">Toko</a>
        <a href="keranjang.php">Keranjang</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<main class="container">

    <section class="judul">
        <h1>Temukan Produk Lokal</h1>
        <p>Belanja produk pilihan dari berbagai usaha lokal.</p>
    </section>

    <div class="pencarian">
        <input
            type="text"
            id="cariProduk"
            placeholder="Cari nama produk..."
            aria-label="Cari produk">

        <select id="filterKategori" aria-label="Pilih kategori">
            <option value="">Semua Kategori</option>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
            <option value="kerajinan">Kerajinan</option>
            <option value="pakaian">Pakaian</option>
        </select>
    </div>

    <section class="produk-list" id="daftarProduk">

        <article class="produk-card"
            data-nama="keripik pisang"
            data-kategori="makanan">
            <img src="images/produk/produk1.jpg"
                 alt="Keripik Pisang">
            <h3>Keripik Pisang</h3>
            <p class="toko">Toko Makanan Lokal</p>
            <p>Keripik pisang renyah untuk camilan sehari-hari.</p>
            <p class="harga">Rp15.000</p>
            <a href="toko_detail.php?id=1" class="btn">
                Lihat Produk
            </a>
        </article>

        <article class="produk-card"
            data-nama="kue kering"
            data-kategori="makanan">
            <img src="images/produk/produk2.jpg"
                 alt="Kue Kering">
            <h3>Kue Kering</h3>
            <p class="toko">Toko Makanan Lokal</p>
            <p>Kue kering lezat untuk menemani waktu santai.</p>
            <p class="harga">Rp25.000</p>
            <a href="toko_detail.php?id=1" class="btn">
                Lihat Produk
            </a>
        </article>

        <article class="produk-card"
            data-nama="sambal lokal"
            data-kategori="makanan">
            <img src="images/produk/produk3.jpg"
                 alt="Sambal Lokal">
            <h3>Sambal Lokal</h3>
            <p class="toko">Toko Makanan Lokal</p>
            <p>Sambal rumahan dengan cita rasa khas.</p>
            <p class="harga">Rp12.000</p>
            <a href="toko_detail.php?id=1" class="btn">
                Lihat Produk
            </a>
        </article>

        <article class="produk-card"
            data-nama="jus buah"
            data-kategori="minuman">
            <img src="images/produk/produk4.jpg"
                 alt="Jus Buah">
            <h3>Jus Buah</h3>
            <p class="toko">Toko Minuman Lokal</p>
            <p>Minuman buah segar untuk menemani harimu.</p>
            <p class="harga">Rp10.000</p>
            <a href="toko_detail.php?id=2" class="btn">
                Lihat Produk
            </a>
        </article>

        <article class="produk-card"
            data-nama="gantungan kunci"
            data-kategori="kerajinan">
            <img src="images/produk/produk5.jpg"
                 alt="Gantungan Kunci">
            <h3>Gantungan Kunci</h3>
            <p class="toko">Toko Kerajinan Lokal</p>
            <p>Kerajinan sederhana yang cocok dijadikan hadiah.</p>
            <p class="harga">Rp8.000</p>
            <a href="toko_detail.php?id=3" class="btn">
                Lihat Produk
            </a>
        </article>

        <article class="produk-card"
            data-nama="kaus lokal"
            data-kategori="pakaian">
            <img src="images/produk/produk6.jpg"
                 alt="Kaus Lokal">
            <h3>Kaus Lokal</h3>
            <p class="toko">Toko Pakaian Lokal</p>
            <p>Kaus kasual dari usaha pakaian lokal.</p>
            <p class="harga">Rp45.000</p>
            <a href="toko_detail.php?id=4" class="btn">
                Lihat Produk
            </a>
        </article>

        <p id="pesanKosong">Produk tidak ditemukan.</p>

    </section>

</main>

<footer>
    <p>&copy; 2026 BelanjaLokal</p>
    <p>Mendukung usaha lokal, membangun ekonomi bersama.</p>
</footer>

<script>
    const cariProduk = document.getElementById("cariProduk");
    const filterKategori = document.getElementById("filterKategori");
    const kartuProduk = document.querySelectorAll(".produk-card");
    const pesanKosong = document.getElementById("pesanKosong");

    function tampilkanProduk() {
        const kataKunci = cariProduk.value.toLowerCase().trim();
        const kategori = filterKategori.value;
        let jumlahTampil = 0;

        kartuProduk.forEach(function(produk) {
            const nama = produk.dataset.nama;
            const kategoriProduk = produk.dataset.kategori;

            const cocokNama = nama.includes(kataKunci);
            const cocokKategori =
                kategori === "" || kategoriProduk === kategori;

            if (cocokNama && cocokKategori) {
                produk.style.display = "";
                jumlahTampil++;
            } else {
                produk.style.display = "none";
            }
        });

        pesanKosong.style.display =
            jumlahTampil === 0 ? "block" : "none";
    }

    cariProduk.addEventListener("input", tampilkanProduk);
    filterKategori.addEventListener("change", tampilkanProduk);
</script>

</body>
</html>