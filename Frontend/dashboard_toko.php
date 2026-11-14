<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Toko - BelanjaLokal</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f7f5;
            color: #333;
        }

        header {
            background: #218838;
            color: white;
            padding: 18px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-left: 18px;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .welcome {
            margin-bottom: 25px;
        }

        .welcome h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #666;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 22px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #0000000d;
        }

        .stat-card p {
            color: #666;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .stat-card h2 {
            color: #218838;
            font-size: 25px;
        }

        .section {
            background: white;
            padding: 24px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px #0000000d;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .section-header h2 {
            font-size: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            background: #218838;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #19692c;
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn-secondary {
            background: #6c757d;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th, td {
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        th {
            background: #f0f7f0;
            color: #333;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            background: #fff3cd;
            color: #856404;
        }

        .status.selesai {
            background: #d4edda;
            color: #155724;
        }

        .status.dikirim {
            background: #d1ecf1;
            color: #0c5460;
        }

        .product-name {
            font-weight: bold;
        }

        .product-price {
            color: #218838;
            margin-top: 5px;
        }

        .empty-message {
            text-align: center;
            padding: 25px;
            color: #777;
            display: none;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        footer {
            background: #1f2937;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 35px;
        }

        @media (max-width: 900px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 500px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .welcome h1 {
                font-size: 23px;
            }

            .section {
                padding: 16px;
            }

            header {
                padding: 16px 5%;
            }

            header a {
                margin-left: 0;
                margin-right: 12px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="logo">BelanjaLokal</div>

    <nav>
        <a href="index.php">Beranda</a>
        <a href="produk.php">Produk</a>
        <a href="pesanan_saya.php">Pesanan</a>
        <a href="logout.php">Keluar</a>
    </nav>
</header>

<main class="container">

    <section class="welcome">
        <h1>Dashboard Toko</h1>
        <p>Selamat datang di halaman pengelolaan toko lokal Anda!</p>
    </section>

    <!-- Ringkasan toko -->
    <section class="stats">
        <div class="stat-card">
            <p>Total Produk</p>
            <h2 id="totalProduk">6</h2>
        </div>

        <div class="stat-card">
            <p>Pesanan Baru</p>
            <h2 id="pesananBaru">3</h2>
        </div>

        <div class="stat-card">
            <p>Total Terjual</p>
            <h2 id="totalTerjual">25</h2>
        </div>

        <div class="stat-card">
            <p>Total Penjualan</p>
            <h2 id="totalPenjualan">Rp850.000</h2>
        </div>
    </section>

    <!-- Daftar produk -->
    <section class="section">
        <div class="section-header">
            <h2>Produk Toko</h2>
            <button class="btn" onclick="tambahProduk()">
                + Tambah Produk
            </button>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody id="daftarProduk">
                    <tr>
                        <td>1</td>
                        <td class="product-name">Keripik Pisang</td>
                        <td>Rp15.000</td>
                        <td>20</td>
                        <td><span class="status selesai">Aktif</span></td>
                        <td>
                            <div class="actions">
                                <button class="btn"
                                    onclick="editProduk('Keripik Pisang')">
                                    Edit
                                </button>
                                <button class="btn btn-danger"
                                    onclick="hapusProduk(this, 'Keripik Pisang')">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td class="product-name">Kue Kering</td>
                        <td>Rp25.000</td>
                        <td>15</td>
                        <td><span class="status selesai">Aktif</span></td>
                        <td>
                            <div class="actions">
                                <button class="btn"
                                    onclick="editProduk('Kue Kering')">
                                    Edit
                                </button>
                                <button class="btn btn-danger"
                                    onclick="hapusProduk(this, 'Kue Kering')">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td class="product-name">Sambal Lokal</td>
                        <td>Rp12.000</td>
                        <td>0</td>
                        <td><span class="status">Stok Habis</span></td>
                        <td>
                            <div class="actions">
                                <button class="btn"
                                    onclick="editProduk('Sambal Lokal')">
                                    Edit
                                </button>
                                <button class="btn btn-danger"
                                    onclick="hapusProduk(this, 'Sambal Lokal')">
                                    Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p id="pesanProduk" class="empty-message">
            Belum ada produk di toko.
        </p>
    </section>

    <!-- Pesanan terbaru -->
    <section class="section">
        <div class="section-header">
            <h2>Pesanan Terbaru</h2>
            <a href="pesanan_saya.php" class="btn">
                Lihat Pesanan
            </a>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Kode Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>BL-20261001</td>
                        <td>Andi Saputra</td>
                        <td>25 Oktober 2026</td>
                        <td>Rp40.000</td>
                        <td><span class="status">Diproses</span></td>
                    </tr>

                    <tr>
                        <td>BL-20261002</td>
                        <td>Siti Aminah</td>
                        <td>24 Oktober 2026</td>
                        <td>Rp25.000</td>
                        <td><span class="status selesai">Selesai</span></td>
                    </tr>

                    <tr>
                        <td>BL-20261003</td>
                        <td>Budi Santoso</td>
                        <td>23 Oktober 2026</td>
                        <td>Rp36.000</td>
                        <td><span class="status dikirim">Dikirim</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

</main>

<footer>
    <p>&copy; 2026 BelanjaLokal. Mendukung produk lokal Indonesia.</p>
</footer>

<script>
    function tambahProduk() {
        alert(
            "Fitur tambah produk belum terhubung. " +
            "Nantinya formulir ini digunakan untuk menambahkan produk toko."
        );
    }

    function editProduk(nama) {
        alert(
            "Anda memilih produk: " + nama +
            ". Fitur edit akan dibuat saat backend dihubungkan."
        );
    }

    function hapusProduk(button, nama) {
        const yakin = confirm(
            "Apakah Anda yakin ingin menghapus produk " + nama + "?"
        );

        if (yakin) {
            const baris = button.closest("tr");
            baris.remove();

            const daftar = document.getElementById("daftarProduk");
            const jumlahProduk = daftar.querySelectorAll("tr").length;

            document.getElementById("totalProduk").textContent =
                jumlahProduk;

            if (jumlahProduk === 0) {
                document.getElementById("pesanProduk").style.display =
                    "block";
            }
        }
    }
</script>

</body>
</html>