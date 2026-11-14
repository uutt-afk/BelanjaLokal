<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - BelanjaLokal</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        * {
            box-sizing: border-box;
        }

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
            margin: 35px auto;
            padding: 0 20px;
        }

        h1 {
            color: #218838;
        }

        .deskripsi {
            color: #666;
            margin-bottom: 25px;
        }

        .filter-box {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .filter-box input,
        .filter-box select {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: white;
            font-size: 14px;
        }

        .filter-box input {
            flex: 1;
            min-width: 200px;
        }

        .pesanan-card {
            background: white;
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 18px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }

        .pesanan-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .kode {
            font-weight: bold;
            font-size: 17px;
            color: #218838;
        }

        .tanggal {
            color: #777;
            font-size: 14px;
            margin-top: 6px;
        }

        .status {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .menunggu {
            background: #fff3cd;
            color: #856404;
        }

        .diproses {
            background: #cce5ff;
            color: #004085;
        }

        .dikirim {
            background: #d1ecf1;
            color: #0c5460;
        }

        .diambil {
            background: #e2d9f3;
            color: #4b2c82;
        }

        .selesai {
            background: #d4edda;
            color: #155724;
        }

        .dibatalkan {
            background: #f8d7da;
            color: #721c24;
        }

        .pesanan-body {
            padding: 18px 0;
        }

        .produk {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .produk img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .produk h3 {
            font-size: 16px;
            margin: 0 0 7px;
        }

        .produk p {
            color: #666;
            margin: 4px 0;
            font-size: 14px;
        }

        .pesanan-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            border-top: 1px solid #eee;
            padding-top: 16px;
        }

        .total-label {
            color: #666;
            font-size: 14px;
        }

        .total-harga {
            color: #218838;
            font-size: 20px;
            font-weight: bold;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            padding: 11px 17px;
            background: #218838;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #176b2c;
        }

        .kosong {
            background: white;
            border-radius: 12px;
            padding: 45px 20px;
            text-align: center;
        }

        .kosong h2 {
            color: #218838;
        }

        .kosong p {
            color: #666;
        }

        .tidak-ditemukan {
            display: none;
            text-align: center;
            padding: 25px;
            color: #666;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            background: #e8eee8;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 15px;
            }

            .pesanan-card {
                padding: 16px;
            }

            .produk img {
                width: 65px;
                height: 65px;
            }

            .pesanan-footer {
                align-items: flex-start;
                flex-direction: column;
            }

            .pesanan-footer .btn {
                width: 100%;
                text-align: center;
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
        <a href="pesanan_saya.php">Pesanan Saya</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<main class="container">

    <h1>Pesanan Saya</h1>
    <p class="deskripsi">
        Pantau status dan riwayat pesanan produk lokalmu di sini.
    </p>

    <div class="filter-box">
        <input
            type="text"
            id="cariPesanan"
            placeholder="Cari kode pesanan atau nama produk..."
            aria-label="Cari pesanan">

        <select id="filterStatus" aria-label="Filter status pesanan">
            <option value="">Semua Status</option>
            <option value="menunggu">Menunggu</option>
            <option value="diproses">Diproses</option>
            <option value="dikirim">Dikirim</option>
            <option value="diambil">Siap Diambil</option>
            <option value="selesai">Selesai</option>
            <option value="dibatalkan">Dibatalkan</option>
        </select>
    </div>

    <section id="daftarPesanan">

        <!-- Pesanan contoh akan ditampilkan oleh JavaScript -->

    </section>

    <div id="tidakDitemukan" class="tidak-ditemukan">
        <h3>Pesanan tidak ditemukan</h3>
        <p>Coba gunakan kata kunci atau status yang berbeda.</p>
    </div>

</main>

<footer>
    <p>&copy; 2026 BelanjaLokal</p>
    <p>Mendukung usaha lokal, membangun ekonomi bersama.</p>
</footer>

<script>
    /*
      Data berikut hanya untuk contoh tampilan.
      Belum mengambil data dari database.
    */

    const dataContoh = [
        {
            kode: "BL-20261001",
            tanggal: "2026-10-25",
            produk: "Keripik Pisang",
            gambar: "images/produk/produk1.jpg",
            jumlah: 2,
            total: 40000,
            status: "diproses"
        },
        {
            kode: "BL-20261002",
            tanggal: "2026-10-24",
            produk: "Kue Kering",
            gambar: "images/produk/produk2.jpg",
            jumlah: 1,
            total: 25000,
            status: "selesai"
        },
        {
            kode: "BL-20261003",
            tanggal: "2026-10-23",
            produk: "Sambal Lokal",
            gambar: "images/produk/produk3.jpg",
            jumlah: 3,
            total: 36000,
            status: "dikirim"
        }
    ];

    const daftarPesanan =
        document.getElementById("daftarPesanan");

    const cariPesanan =
        document.getElementById("cariPesanan");

    const filterStatus =
        document.getElementById("filterStatus");

    const tidakDitemukan =
        document.getElementById("tidakDitemukan");

    function rupiah(angka) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            maximumFractionDigits: 0
        }).format(angka);
    }

    function formatTanggal(tanggal) {
        const bagian = tanggal.split("-");
        return bagian[2] + "-" + bagian[1] + "-" + bagian[0];
    }

    function namaStatus(status) {
        const daftar = {
            menunggu: "Menunggu Konfirmasi",
            diproses: "Sedang Diproses",
            dikirim: "Sedang Dikirim",
            diambil: "Siap Diambil",
            selesai: "Selesai",
            dibatalkan: "Dibatalkan"
        };

        return daftar[status] || status;
    }

    function buatElemen(tag, kelas, teks) {
        const elemen = document.createElement(tag);

        if (kelas) {
            elemen.className = kelas;
        }

        if (teks !== undefined) {
            elemen.textContent = teks;
        }

        return elemen;
    }

    function tampilkanPesanan() {
        daftarPesanan.replaceChildren();

        const kataKunci =
            cariPesanan.value.toLowerCase().trim();

        const statusDipilih = filterStatus.value;

        const hasil = dataContoh.filter(function(pesanan) {
            const cocokKata =
                pesanan.kode.toLowerCase().includes(kataKunci) ||
                pesanan.produk.toLowerCase().includes(kataKunci);

            const cocokStatus =
                statusDipilih === "" ||
                pesanan.status === statusDipilih;

            return cocokKata && cocokStatus;
        });

        if (hasil.length === 0) {
            tidakDitemukan.style.display = "block";
            return;
        }

        tidakDitemukan.style.display = "none";

        hasil.forEach(function(pesanan) {
            const kartu = buatElemen("article", "pesanan-card");

            const header = buatElemen("div", "pesanan-header");
            const info = buatElemen("div");

            info.append(
                buatElemen("div", "kode", "Kode: " + pesanan.kode),
                buatElemen(
                    "div",
                    "tanggal",
                    "Tanggal: " + formatTanggal(pesanan.tanggal)
                )
            );

            const status = buatElemen(
                "span",
                "status " + pesanan.status,
                namaStatus(pesanan.status)
            );

            header.append(info, status);

            const body = buatElemen("div", "pesanan-body");
            const produk = buatElemen("div", "produk");

            const gambar = document.createElement("img");
            gambar.src = pesanan.gambar;
            gambar.alt = pesanan.produk;
            gambar.onerror = function() {
                this.style.display = "none";
            };

            const detailProduk = buatElemen("div");

            detailProduk.append(
                buatElemen("h3", "", pesanan.produk),
                buatElemen(
                    "p",
                    "",
                    "Jumlah: " + pesanan.jumlah + " barang"
                )
            );

            produk.append(gambar, detailProduk);
            body.appendChild(produk);

            const footer = buatElemen("div", "pesanan-footer");
            const total = buatElemen("div");

            total.append(
                buatElemen("div", "total-label", "Total Pembayaran"),
                buatElemen("div", "total-harga", rupiah(pesanan.total))
            );

            const tombol = buatElemen("a", "btn", "Lihat Detail");
            tombol.href =
                "pesanan_detail.php?kode=" +
                encodeURIComponent(pesanan.kode);

            footer.append(total, tombol);
            kartu.append(header, body, footer);
            daftarPesanan.appendChild(kartu);
        });
    }

    cariPesanan.addEventListener("input", tampilkanPesanan);
    filterStatus.addEventListener("change", tampilkanPesanan);

    tampilkanPesanan();
</script>

</body>
</html>