<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - BelanjaLokal</title>
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

        h1, h2 {
            color: #218838;
        }

        .checkout-layout {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 25px;
            align-items: start;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            font-family: inherit;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 90px;
        }

        .pilihan {
            display: block;
            border: 1px solid #ddd;
            padding: 13px;
            border-radius: 7px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .pilihan input {
            margin-right: 8px;
            accent-color: #218838;
        }

        .produk-item {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 13px 0;
            border-bottom: 1px solid #eee;
        }

        .produk-item img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 7px;
        }

        .produk-info {
            flex: 1;
        }

        .produk-info h3 {
            font-size: 15px;
            margin: 0 0 6px;
        }

        .produk-info p {
            margin: 4px 0;
            font-size: 14px;
        }

        .harga {
            color: #218838;
            font-weight: bold;
        }

        .baris-total {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin: 15px 0;
        }

        .total-akhir {
            border-top: 1px solid #ddd;
            padding-top: 15px;
            font-size: 20px;
            font-weight: bold;
            color: #218838;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 6px;
            background: #218838;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background: #176b2c;
        }

        .btn-kembali {
            display: inline-block;
            width: auto;
            margin-bottom: 20px;
            padding: 10px 16px;
        }

        .kosong {
            text-align: center;
            padding: 25px 10px;
        }

        .pesan {
            display: none;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            background: #fff3cd;
            color: #664d03;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            background: #e8eee8;
        }

        @media (max-width: 750px) {
            .checkout-layout {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 15px;
            }

            .card {
                padding: 18px;
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

    <a href="keranjang.php" class="btn btn-kembali">
        &larr; Kembali ke Keranjang
    </a>

    <h1>Checkout</h1>
    <p>Lengkapi informasi berikut untuk melanjutkan pesananmu.</p>

    <div id="pesan" class="pesan" role="status"></div>

    <div class="checkout-layout">

        <!-- FORM INFORMASI PEMESAN -->
        <div>
            <form id="checkoutForm">

                <section class="card">
                    <h2>Informasi Pemesan</h2>

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan nama lengkap"
                            autocomplete="name"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="contoh@email.com"
                            autocomplete="email"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                        <input
                            type="tel"
                            id="telepon"
                            name="telepon"
                            placeholder="Masukkan nomor telepon"
                            autocomplete="tel"
                            required>
                    </div>
                </section>

                <section class="card">
                    <h2>Metode Pengambilan</h2>

                    <label class="pilihan">
                        <input
                            type="radio"
                            name="pengambilan"
                            value="diantar"
                            checked>
                        <strong>Diantar ke alamat</strong>
                        <p>Pesanan diantarkan ke alamat tujuan.</p>
                    </label>

                    <label class="pilihan">
                        <input
                            type="radio"
                            name="pengambilan"
                            value="ambil_sendiri">
                        <strong>Ambil sendiri</strong>
                        <p>Ambil pesanan langsung di toko.</p>
                    </label>

                    <div class="form-group" id="alamatGroup">
                        <label for="alamat">Alamat Pengiriman</label>
                        <textarea
                            id="alamat"
                            name="alamat"
                            placeholder="Masukkan alamat lengkap"></textarea>
                    </div>

                    <div class="form-group" id="catatanGroup">
                        <label for="catatan">Catatan Pesanan (Opsional)</label>
                        <textarea
                            id="catatan"
                            name="catatan"
                            placeholder="Contoh: mohon dikemas dengan rapi"></textarea>
                    </div>
                </section>

                <section class="card">
                    <h2>Metode Pembayaran</h2>

                    <div class="form-group">
                        <label for="pembayaran">Pilih Pembayaran</label>
                        <select id="pembayaran" name="pembayaran" required>
                            <option value="">-- Pilih metode pembayaran --</option>
                            <option value="cod">Bayar di Tempat (COD)</option>
                            <option value="transfer">Transfer Bank</option>
                            <option value="tunai">Tunai saat Ambil Sendiri</option>
                        </select>
                    </div>
                </section>

                <button type="submit" class="btn" id="btnPesan">
                    Buat Pesanan
                </button>

            </form>
        </div>

        <!-- RINGKASAN BELANJA -->
        <aside class="card">
            <h2>Ringkasan Belanja</h2>

            <div id="daftarProduk"></div>

            <div id="ringkasanTotal">
                <div class="baris-total">
                    <span>Total Barang</span>
                    <strong id="jumlahBarang">0</strong>
                </div>

                <div class="baris-total">
                    <span>Subtotal</span>
                    <strong id="subtotal">Rp0</strong>
                </div>

                <div class="baris-total">
                    <span>Ongkos Kirim</span>
                    <strong id="ongkir">Rp0</strong>
                </div>

                <div class="baris-total total-akhir">
                    <span>Total Bayar</span>
                    <span id="totalBayar">Rp0</span>
                </div>
            </div>

            <p style="font-size: 13px; color: #777;">
                Total di atas merupakan perkiraan. Ongkos kirim contoh
                dapat berubah sesuai kebijakan toko.
            </p>
        </aside>

    </div>

</main>

<footer>
    <p>&copy; 2026 BelanjaLokal</p>
    <p>Mendukung usaha lokal, membangun ekonomi bersama.</p>
</footer>

<script>
    const KEY_KERANJANG = "keranjangBelanjaLokal";

    let keranjang = [];

    try {
        const data = localStorage.getItem(KEY_KERANJANG);
        keranjang = data ? JSON.parse(data) : [];

        if (!Array.isArray(keranjang)) {
            keranjang = [];
        }
    } catch (error) {
        keranjang = [];
    }

    const daftarProduk = document.getElementById("daftarProduk");
    const pesan = document.getElementById("pesan");
    const form = document.getElementById("checkoutForm");
    const alamat = document.getElementById("alamat");
    const alamatGroup = document.getElementById("alamatGroup");
    const pembayaran = document.getElementById("pembayaran");

    function rupiah(angka) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            maximumFractionDigits: 0
        }).format(angka);
    }

    function ambilTotal() {
        return keranjang.reduce(function(total, produk) {
            const harga = Math.max(0, Number(produk.harga) || 0);
            const jumlah = Math.max(0, Number(produk.jumlah) || 0);
            return total + harga * jumlah;
        }, 0);
    }

    function ambilJumlah() {
        return keranjang.reduce(function(total, produk) {
            return total + Math.max(0, Number(produk.jumlah) || 0);
        }, 0);
    }

    function tampilkanRingkasan() {
        daftarProduk.replaceChildren();

        if (keranjang.length === 0) {
            const kosong = document.createElement("div");
            kosong.className = "kosong";

            const judul = document.createElement("h3");
            judul.textContent = "Keranjang masih kosong";

            const keterangan = document.createElement("p");
            keterangan.textContent =
                "Silakan pilih produk terlebih dahulu.";

            const link = document.createElement("a");
            link.href = "produk.php";
            link.className = "btn";
            link.textContent = "Lihat Produk";

            kosong.append(judul, keterangan, link);
            daftarProduk.appendChild(kosong);

            document.getElementById("ringkasanTotal").hidden = true;
            document.getElementById("btnPesan").disabled = true;
            document.getElementById("btnPesan").style.opacity = "0.5";
            return;
        }

        document.getElementById("ringkasanTotal").hidden = false;
        document.getElementById("btnPesan").disabled = false;
        document.getElementById("btnPesan").style.opacity = "1";

        keranjang.forEach(function(produk) {
            const item = document.createElement("div");
            item.className = "produk-item";

            const gambar = document.createElement("img");
            gambar.src = produk.gambar || "images/produk/produk1.jpg";
            gambar.alt = produk.nama || "Produk";
            gambar.onerror = function() {
                this.style.display = "none";
            };

            const info = document.createElement("div");
            info.className = "produk-info";

            const nama = document.createElement("h3");
            nama.textContent = produk.nama || "Produk";

            const jumlah = document.createElement("p");
            jumlah.textContent = "Jumlah: " +
                Math.max(0, Number(produk.jumlah) || 0);

            const harga = document.createElement("p");
            harga.className = "harga";
            harga.textContent = rupiah(
                (Number(produk.harga) || 0) *
                (Number(produk.jumlah) || 0)
            );

            info.append(nama, jumlah, harga);
            item.append(gambar, info);
            daftarProduk.appendChild(item);
        });

        hitungTotal();
    }

    function hitungTotal() {
        const subtotal = ambilTotal();
        const metode = document.querySelector(
            'input[name="pengambilan"]:checked'
        ).value;

        // Ongkir contoh Rp10.000 jika memilih diantar.
        const ongkir = metode === "diantar" ? 10000 : 0;
        const total = subtotal + ongkir;

        document.getElementById("jumlahBarang").textContent = ambilJumlah();
        document.getElementById("subtotal").textContent = rupiah(subtotal);
        document.getElementById("ongkir").textContent = rupiah(ongkir);
        document.getElementById("totalBayar").textContent = rupiah(total);
    }

    function aturPengambilan() {
        const metode = document.querySelector(
            'input[name="pengambilan"]:checked'
        ).value;

        const diantar = metode === "diantar";

        alamatGroup.hidden = !diantar;
        alamat.required = diantar;

        if (!diantar) {
            alamat.value = "";
        }

        const tunai = Array.from(pembayaran.options).find(
            option => option.value === "tunai"
        );

        tunai.disabled = diantar;

        if (diantar && pembayaran.value === "tunai") {
            pembayaran.value = "";
        }

        if (!diantar && pembayaran.value === "cod") {
            pembayaran.value = "";
        }

        const cod = Array.from(pembayaran.options).find(
            option => option.value === "cod"
        );

        cod.disabled = !diantar;

        hitungTotal();
    }

    document.querySelectorAll('input[name="pengambilan"]')
        .forEach(function(radio) {
            radio.addEventListener("change", aturPengambilan);
        });

    aturPengambilan();
    tampilkanRingkasan();

    form.addEventListener("submit", function(event) {
        event.preventDefault();

        if (keranjang.length === 0) {
            pesan.textContent =
                "Keranjang kosong. Silakan pilih produk terlebih dahulu.";
            pesan.style.display = "block";
            return;
        }

        if (!form.reportValidity()) {
            return;
        }

        const metode = document.querySelector(
            'input[name="pengambilan"]:checked'
        ).value;

        if (metode === "diantar" && !alamat.value.trim()) {
            pesan.textContent = "Alamat pengiriman wajib diisi.";
            pesan.style.display = "block";
            alamat.focus();
            return;
        }

        pesan.textContent =
            "Formulir berhasil diperiksa. Fitur penyimpanan pesanan " +
            "belum aktif karena halaman ini masih frontend saja.";
        pesan.style.display = "block";
        pesan.scrollIntoView({ behavior: "smooth", block: "center" });
    });
</script>

</body>
</html>