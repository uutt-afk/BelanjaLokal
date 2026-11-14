<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - BelanjaLokal</title>
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
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        h1, h2 {
            color: #218838;
        }

        .tombol-kembali {
            display: inline-block;
            padding: 10px 15px;
            background: #218838;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }

        .header-pesanan {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            border-bottom: 1px solid #eee;
            padding-bottom: 18px;
        }

        .kode {
            font-size: 19px;
            font-weight: bold;
            color: #218838;
        }

        .tanggal {
            color: #777;
            font-size: 14px;
            margin-top: 8px;
        }

        .status {
            display: inline-block;
            padding: 8px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
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

        .informasi-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .info-item {
            margin-bottom: 16px;
        }

        .info-item label {
            display: block;
            color: #777;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .info-item p {
            margin: 0;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .produk-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 16px 0;
            border-bottom: 1px solid #eee;
        }

        .produk-item:last-child {
            border-bottom: none;
        }

        .produk-item img {
            width: 85px;
            height: 85px;
            object-fit: cover;
            border-radius: 8px;
        }

        .produk-info {
            flex: 1;
        }

        .produk-info h3 {
            margin: 0 0 8px;
            font-size: 16px;
        }

        .produk-info p {
            margin: 5px 0;
            color: #666;
            font-size: 14px;
        }

        .harga {
            color: #218838;
            font-weight: bold;
        }

        .baris-total {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            margin: 14px 0;
        }

        .total-akhir {
            border-top: 1px solid #ddd;
            padding-top: 17px;
            font-size: 21px;
            font-weight: bold;
            color: #218838;
        }

        .catatan {
            background: #f4f7f4;
            padding: 15px;
            border-radius: 7px;
            line-height: 1.6;
        }

        .pesan-kosong {
            background: white;
            border-radius: 12px;
            padding: 35px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            background: #218838;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover,
        .tombol-kembali:hover {
            background: #176b2c;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            background: #e8eee8;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 15px;
            }

            .informasi-grid {
                grid-template-columns: 1fr;
                gap: 5px;
            }

            .card {
                padding: 18px;
            }

            .produk-item img {
                width: 70px;
                height: 70px;
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
    </nav>
</header>

<main class="container">

    <a href="pesanan_saya.php" class="tombol-kembali">
        &larr; Kembali ke Pesanan Saya
    </a>

    <h1>Detail Pesanan</h1>
    <p>Periksa informasi lengkap pesananmu di bawah ini.</p>

    <div id="detailPesanan"></div>

</main>

<footer>
    <p>&copy; 2026 BelanjaLokal</p>
    <p>Mendukung usaha lokal, membangun ekonomi bersama.</p>
</footer>

<script>
    /*
      Data berikut hanya contoh tampilan.
      Nantinya data dapat diganti dengan data dari database.
    */

    const dataPesanan = [
        {
            kode: "BL-20261001",
            tanggal: "2026-10-25",
            status: "diproses",

            pelanggan: {
                nama: "Andi Saputra",
                email: "andi@example.com",
                telepon: "081234567890"
            },

            pengambilan: "diantar",
            alamat: "Jl. Contoh No. 10, Surabaya, Jawa Timur",
            pembayaran: "Transfer Bank",
            catatan: "Mohon dikemas dengan rapi.",

            produk: [
                {
                    nama: "Keripik Pisang",
                    gambar: "images/produk/produk1.jpg",
                    harga: 15000,
                    jumlah: 2
                },
                {
                    nama: "Kue Kering",
                    gambar: "images/produk/produk2.jpg",
                    harga: 25000,
                    jumlah: 1
                }
            ],

            ongkir: 10000
        },

        {
            kode: "BL-20261002",
            tanggal: "2026-10-24",
            status: "selesai",

            pelanggan: {
                nama: "Andi Saputra",
                email: "andi@example.com",
                telepon: "081234567890"
            },

            pengambilan: "ambil_sendiri",
            alamat: "",
            pembayaran: "Tunai saat Ambil Sendiri",
            catatan: "Terima kasih.",

            produk: [
                {
                    nama: "Kue Kering",
                    gambar: "images/produk/produk2.jpg",
                    harga: 25000,
                    jumlah: 1
                }
            ],

            ongkir: 0
        }
    ];

    const detailPesanan =
        document.getElementById("detailPesanan");

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

    function elemen(tag, kelas, teks) {
        const hasil = document.createElement(tag);

        if (kelas) hasil.className = kelas;
        if (teks !== undefined) hasil.textContent = teks;

        return hasil;
    }

    function tambahInfo(parent, label, nilai) {
        const item = elemen("div", "info-item");
        item.append(
            elemen("label", "", label),
            elemen("p", "", nilai || "-")
        );
        parent.appendChild(item);
    }

    function tampilkanDetail() {
        const parameter = new URLSearchParams(window.location.search);
        const kodeURL = parameter.get("kode") || "BL-20261001";

        const pesanan = dataPesanan.find(function(item) {
            return item.kode === kodeURL;
        });

        detailPesanan.replaceChildren();

        if (!pesanan) {
            const kosong = elemen("section", "pesan-kosong");
            kosong.append(
                elemen("h2", "", "Pesanan Tidak Ditemukan"),
                elemen(
                    "p",
                    "",
                    "Kode pesanan tidak tersedia pada data contoh."
                )
            );

            const tombol = elemen("a", "btn", "Kembali ke Pesanan Saya");
            tombol.href = "pesanan_saya.php";
            kosong.appendChild(tombol);
            detailPesanan.appendChild(kosong);
            return;
        }

        const subtotal = pesanan.produk.reduce(function(total, produk) {
            return total + produk.harga * produk.jumlah;
        }, 0);

        const ongkir = Number(pesanan.ongkir) || 0;
        const total = subtotal + ongkir;

        // Kartu informasi utama
        const kartuUtama = elemen("section", "card");
        const header = elemen("div", "header-pesanan");
        const infoKode = elemen("div");

        infoKode.append(
            elemen("div", "kode", "Kode Pesanan: " + pesanan.kode),
            elemen(
                "div",
                "tanggal",
                "Tanggal Pesanan: " + formatTanggal(pesanan.tanggal)
            )
        );

        const status = elemen(
            "span",
            "status " + pesanan.status,
            pesanan.status === "menunggu" ? "Menunggu Konfirmasi" :
            pesanan.status === "diproses" ? "Sedang Diproses" :
            pesanan.status === "dikirim" ? "Sedang Dikirim" :
            pesanan.status === "diambil" ? "Siap Diambil" :
            pesanan.status === "selesai" ? "Selesai" :
            pesanan.status === "dibatalkan" ? "Dibatalkan" :
            pesanan.status
        );

        header.append(infoKode, status);
        kartuUtama.appendChild(header);
        detailPesanan.appendChild(kartuUtama);

        // Informasi pelanggan dan pengiriman
        const kartuInfo = elemen("section", "card");
        kartuInfo.appendChild(elemen("h2", "", "Informasi Pesanan"));

        const grid = elemen("div", "informasi-grid");
        const kolomPelanggan = elemen("div");
        const kolomPengiriman = elemen("div");

        kolomPelanggan.appendChild(elemen("h3", "", "Data Pelanggan"));
        tambahInfo(kolomPelanggan, "Nama", pesanan.pelanggan.nama);
        tambahInfo(kolomPelanggan, "Email", pesanan.pelanggan.email);
        tambahInfo(kolomPelanggan, "Nomor Telepon", pesanan.pelanggan.telepon);

        kolomPengiriman.appendChild(elemen("h3", "", "Pengiriman"));
        tambahInfo(
            kolomPengiriman,
            "Metode Pengambilan",
            pesanan.pengambilan === "diantar" ? "Diantar ke Alamat" : "Ambil Sendiri"
        );

        if (pesanan.pengambilan === "diantar") {
            tambahInfo(kolomPengiriman, "Alamat Pengiriman", pesanan.alamat);
        } else {
            tambahInfo(
                kolomPengiriman,
                "Lokasi Pengambilan",
                "Silakan ambil pesanan langsung di toko."
            );
        }

        tambahInfo(kolomPengiriman, "Metode Pembayaran", pesanan.pembayaran);

        grid.append(kolomPelanggan, kolomPengiriman);
        kartuInfo.appendChild(grid);
        detailPesanan.appendChild(kartuInfo);

        // Daftar produk
        const kartuProduk = elemen("section", "card");
        kartuProduk.appendChild(elemen("h2", "", "Produk yang Dipesan"));

        pesanan.produk.forEach(function(produk) {
            const baris = elemen("div", "produk-item");

            const gambar = document.createElement("img");
            gambar.src = produk.gambar;
            gambar.alt = produk.nama;
            gambar.onerror = function() {
                this.style.display = "none";
            };

            const info = elemen("div", "produk-info");
            info.append(
                elemen("h3", "", produk.nama),
                elemen(
                    "p",
                    "",
                    rupiah(produk.harga) + " × " + produk.jumlah
                ),
                elemen(
                    "p",
                    "harga",
                    "Subtotal: " + rupiah(produk.harga * produk.jumlah)
                )
            );

            baris.append(gambar, info);
            kartuProduk.appendChild(baris);
        });

        detailPesanan.appendChild(kartuProduk);

        // Ringkasan pembayaran
        const kartuTotal = elemen("section", "card");
        kartuTotal.appendChild(elemen("h2", "", "Ringkasan Pembayaran"));

        function barisTotal(label, nilai, kelas) {
            const baris = elemen("div", "baris-total " + (kelas || ""));
            baris.append(
                elemen("span", "", label),
                elemen("span", "", nilai)
            );
            kartuTotal.appendChild(baris);
        }

        barisTotal("Subtotal Produk", rupiah(subtotal));
        barisTotal("Ongkos Kirim", rupiah(ongkir));
        barisTotal("Total Pembayaran", rupiah(total), "total-akhir");

        detailPesanan.appendChild(kartuTotal);

        // Catatan
        if (pesanan.catatan) {
            const kartuCatatan = elemen("section", "card");
            kartuCatatan.appendChild(
                elemen("h2", "", "Catatan Pesanan")
            );

            kartuCatatan.appendChild(
                elemen("div", "catatan", pesanan.catatan)
            );

            detailPesanan.appendChild(kartuCatatan);
        }
    }

    tampilkanDetail();
</script>

</body>
</html>