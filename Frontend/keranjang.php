<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - BelanjaLokal</title>
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
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        h1 {
            color: #218838;
        }

        .keranjang-box {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }

        .item {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 18px 0;
            border-bottom: 1px solid #eee;
        }

        .item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        .item-info {
            flex: 1;
        }

        .item-info h3 {
            margin: 0 0 8px;
        }

        .harga {
            color: #218838;
            font-weight: bold;
        }

        .jumlah {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .jumlah button {
            width: 30px;
            height: 30px;
            border: none;
            background: #e4f2e6;
            color: #218838;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .hapus {
            border: none;
            background: #dc3545;
            color: white;
            padding: 9px 12px;
            border-radius: 5px;
            cursor: pointer;
        }

        .ringkasan {
            text-align: right;
            margin-top: 25px;
        }

        .total {
            font-size: 22px;
            font-weight: bold;
            color: #218838;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            background: #217288;
            color: white;
            text-decoration: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background: #176b2c;
        }

        .kosong {
            text-align: center;
            padding: 40px 10px;
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

            .item {
                flex-wrap: wrap;
            }

            .item img {
                width: 80px;
                height: 80px;
            }

            .ringkasan {
                text-align: left;
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
    <h1>Keranjang Belanja</h1>
    <p>Periksa produk pilihanmu sebelum melanjutkan pesanan.</p>

    <section class="keranjang-box">
        <div id="daftarKeranjang"></div>

        <div class="ringkasan" id="ringkasan" hidden>
            <p>Total barang: <strong id="jumlahTotal">0</strong></p>
            <p class="total" id="totalHarga">Rp0</p>
            <a href="produk.php" class="btn">Lanjut Belanja</a>
            <a href="checkout.php" class="btn">Checkout</a>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2026 BelanjaLokal</p>
    <p>Mendukung usaha lokal, membangun ekonomi bersama.</p>
</footer>

<script>
    // Data contoh untuk tampilan awal.
    // Data ini hanya dimasukkan jika keranjang belum ada.
    const dataContoh = [
        {
            id: 1,
            nama: "Keripik Pisang",
            harga: 15000,
            jumlah: 1,
            gambar: "images/produk/produk1.jpg"
        },
        {
            id: 2,
            nama: "Kue Kering",
            harga: 25000,
            jumlah: 1,
            gambar: "images/produk/produk2.jpg"
        }
    ];

    let keranjang;

    try {
        const tersimpan = localStorage.getItem("keranjangBelanjaLokal");
        keranjang = tersimpan === null
            ? dataContoh
            : JSON.parse(tersimpan);

        if (!Array.isArray(keranjang)) {
            keranjang = [];
        }
    } catch (error) {
        keranjang = [];
    }

    function simpanKeranjang() {
        localStorage.setItem(
            "keranjangBelanjaLokal",
            JSON.stringify(keranjang)
        );
    }

    function formatRupiah(angka) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            maximumFractionDigits: 0
        }).format(angka);
    }

    function tampilkanKeranjang() {
        const daftar = document.getElementById("daftarKeranjang");
        const ringkasan = document.getElementById("ringkasan");

        daftar.innerHTML = "";

        if (keranjang.length === 0) {
            daftar.innerHTML = `
                <div class="kosong">
                    <h2>Keranjang masih kosong</h2>
                    <p>Yuk, temukan produk lokal favoritmu!</p>
                    <a href="produk.php" class="btn">Jelajahi Produk</a>
                </div>
            `;
            ringkasan.hidden = true;
            return;
        }

        ringkasan.hidden = false;
        let total = 0;
        let jumlahBarang = 0;

        keranjang.forEach(function(produk, index) {
            const harga = Number(produk.harga) || 0;
            const jumlah = Math.max(1, Number(produk.jumlah) || 1);
            const subtotal = harga * jumlah;

            total += subtotal;
            jumlahBarang += jumlah;

            const item = document.createElement("article");
            item.className = "item";

            const gambar = document.createElement("img");
            gambar.src = produk.gambar;
            gambar.alt = produk.nama;
            gambar.onerror = function() {
                this.style.display = "none";
            };

            const info = document.createElement("div");
            info.className = "item-info";

            const nama = document.createElement("h3");
            nama.textContent = produk.nama;

            const hargaEl = document.createElement("p");
            hargaEl.className = "harga";
            hargaEl.textContent = formatRupiah(harga);

            const jumlahEl = document.createElement("div");
            jumlahEl.className = "jumlah";

            const kurang = document.createElement("button");
            kurang.type = "button";
            kurang.textContent = "−";
            kurang.setAttribute("aria-label", "Kurangi jumlah");
            kurang.onclick = function() {
                if (keranjang[index].jumlah > 1) {
                    keranjang[index].jumlah--;
                } else {
                    keranjang.splice(index, 1);
                }
                simpanKeranjang();
                tampilkanKeranjang();
            };

            const angka = document.createElement("span");
            angka.textContent = jumlah;

            const tambah = document.createElement("button");
            tambah.type = "button";
            tambah.textContent = "+";
            tambah.setAttribute("aria-label", "Tambah jumlah");
            tambah.onclick = function() {
                keranjang[index].jumlah++;
                simpanKeranjang();
                tampilkanKeranjang();
            };

            const subtotalEl = document.createElement("p");
            subtotalEl.textContent = "Subtotal: " + formatRupiah(subtotal);

            jumlahEl.append(kurang, angka, tambah);
            info.append(nama, hargaEl, jumlahEl, subtotalEl);

            const hapus = document.createElement("button");
            hapus.type = "button";
            hapus.className = "hapus";
            hapus.textContent = "Hapus";
            hapus.onclick = function() {
                keranjang.splice(index, 1);
                simpanKeranjang();
                tampilkanKeranjang();
            };

            item.append(gambar, info, hapus);
            daftar.appendChild(item);
        });

        document.getElementById("jumlahTotal").textContent = jumlahBarang;
        document.getElementById("totalHarga").textContent =
            formatRupiah(total);
    }

    simpanKeranjang();
    tampilkanKeranjang();
</script>

</body>
</html>