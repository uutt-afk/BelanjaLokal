function formatRupiah(angka) {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        maximumFractionDigits: 0
    }).format(Number(angka) || 0);
}


function tampilkanPesan(pesan) {
    alert(pesan);
}


function konfirmasiTindakan(pesan) {
    return confirm(pesan || "Apakah Anda yakin?");
}


function aturTampilanPassword(inputId, tombolId) {
    const input = document.getElementById(inputId);
    const tombol = document.getElementById(tombolId);

    if (!input || !tombol) return;

    tombol.addEventListener("click", function () {
        const passwordTersembunyi = input.type === "password";

        input.type = passwordTersembunyi ? "text" : "password";
        tombol.textContent = passwordTersembunyi
            ? "Sembunyikan"
            : "Lihat";
    });
}


function validasiForm(formId) {
    const form = document.getElementById(formId);

    if (!form) return false;

    if (!form.checkValidity()) {
        form.reportValidity();
        return false;
    }

    return true;
}


function validasiKonfirmasiPassword(
    passwordId,
    konfirmasiId,
    pesanId
) {
    const password = document.getElementById(passwordId);
    const konfirmasi = document.getElementById(konfirmasiId);
    const pesan = document.getElementById(pesanId);

    if (!password || !konfirmasi) return false;

    const cocok = password.value === konfirmasi.value;

    if (pesan) {
        pesan.textContent = cocok
            ? ""
            : "Kata sandi dan konfirmasi kata sandi tidak sama.";

        pesan.style.color = cocok ? "#218838" : "#dc3545";
    }

    konfirmasi.setCustomValidity(
        cocok ? "" : "Konfirmasi kata sandi tidak sama."
    );

    return cocok;
}


function cariProduk(inputId, daftarId) {
    const input = document.getElementById(inputId);
    const daftar = document.getElementById(daftarId);

    if (!input || !daftar) return;

    const kataKunci = input.value.toLowerCase().trim();
    const produk = daftar.querySelectorAll(".product-card");

    let jumlahTampil = 0;

    produk.forEach(function (item) {
        const teks = item.textContent.toLowerCase();
        const cocok = teks.includes(kataKunci);

        item.style.display = cocok ? "" : "none";

        if (cocok) jumlahTampil++;
    });

    const pesanKosong = document.getElementById("pesanKosong");

    if (pesanKosong) {
        pesanKosong.style.display =
            jumlahTampil === 0 ? "block" : "none";
    }
}


function filterKategori(selectId, daftarId) {
    const select = document.getElementById(selectId);
    const daftar = document.getElementById(daftarId);

    if (!select || !daftar) return;

    const kategoriDipilih = select.value.toLowerCase();
    const produk = daftar.querySelectorAll(".product-card");

    let jumlahTampil = 0;

    produk.forEach(function (item) {
        const kategori = (
            item.dataset.kategori || ""
        ).toLowerCase();

        const cocok =
            kategoriDipilih === "" ||
            kategoriDipilih === "semua" ||
            kategori === kategoriDipilih;

        item.style.display = cocok ? "" : "none";

        if (cocok) jumlahTampil++;
    });

    const pesanKosong = document.getElementById("pesanKosong");

    if (pesanKosong) {
        pesanKosong.style.display =
            jumlahTampil === 0 ? "block" : "none";
    }
}


const KUNCI_KERANJANG = "keranjangBelanjaLokal";

function ambilKeranjang() {
    try {
        const data = localStorage.getItem(KUNCI_KERANJANG);
        const keranjang = data ? JSON.parse(data) : [];

        return Array.isArray(keranjang) ? keranjang : [];
    } catch (error) {
        console.error("Keranjang tidak dapat dibaca:", error);
        return [];
    }
}

function simpanKeranjang(keranjang) {
    try {
        localStorage.setItem(
            KUNCI_KERANJANG,
            JSON.stringify(keranjang)
        );

        return true;
    } catch (error) {
        console.error("Keranjang tidak dapat disimpan:", error);
        tampilkanPesan(
            "Keranjang tidak dapat disimpan pada browser ini."
        );

        return false;
    }
}


function tambahKeKeranjang(produk) {
    if (
        !produk ||
        produk.id === undefined ||
        !produk.nama ||
        !Number.isFinite(Number(produk.harga)) ||
        Number(produk.harga) < 0
    ) {
        tampilkanPesan("Data produk tidak valid.");
        return;
    }

    const keranjang = ambilKeranjang();

    const idProduk = String(produk.id);
    const item = keranjang.find(
        function (data) {
            return String(data.id) === idProduk;
        }
    );

    if (item) {
        item.jumlah = Math.max(1, Number(item.jumlah) || 1) + 1;
    } else {
        keranjang.push({
            id: idProduk,
            nama: String(produk.nama),
            harga: Number(produk.harga),
            jumlah: 1,
            foto: produk.foto || ""
        });
    }

    if (simpanKeranjang(keranjang)) {
        tampilkanPesan(
            produk.nama + " berhasil ditambahkan ke keranjang."
        );
    }
}


function ubahJumlahKeranjang(id, perubahan) {
    const keranjang = ambilKeranjang();

    const item = keranjang.find(
        function (data) {
            return String(data.id) === String(id);
        }
    );

    if (!item) return;

    item.jumlah = Math.max(
        1,
        (Number(item.jumlah) || 1) + Number(perubahan)
    );

    if (simpanKeranjang(keranjang)) {
        tampilkanPesan("Jumlah produk berhasil diperbarui.");
    }
}


function hapusDariKeranjang(id) {
    const yakin = confirm(
        "Apakah Anda yakin ingin menghapus produk dari keranjang?"
    );

    if (!yakin) return;

    const keranjang = ambilKeranjang().filter(
        function (item) {
            return String(item.id) !== String(id);
        }
    );

    if (simpanKeranjang(keranjang)) {
        tampilkanPesan("Produk dihapus dari keranjang.");
    }
}


function hitungTotalKeranjang() {
    return ambilKeranjang().reduce(
        function (total, item) {
            return total +
                (Number(item.harga) || 0) *
                (Number(item.jumlah) || 0);
        },
        0
    );
}


function hitungJumlahBarang() {
    return ambilKeranjang().reduce(
        function (total, item) {
            return total + (Number(item.jumlah) || 0);
        },
        0
    );
}


function perbaruiJumlahKeranjang() {
    const elemen = document.querySelectorAll(
        "[data-jumlah-keranjang]"
    );

    const jumlah = hitungJumlahBarang();

    elemen.forEach(function (item) {
        item.textContent = jumlah;
    });
}


function konfirmasiHapus(nama) {
    return confirm(
        'Apakah Anda yakin ingin menghapus "' +
        nama +
        '"?'
    );
}


function kembaliKeHalamanSebelumnya() {
    window.history.back();
}


function aturTahunFooter() {
    const tahun = new Date().getFullYear();

    document.querySelectorAll("[data-tahun-sekarang]")
        .forEach(function (elemen) {
            elemen.textContent = tahun;
        });
}


function aktifkanKonfirmasi() {
    document.querySelectorAll("[data-konfirmasi]")
        .forEach(function (elemen) {
            elemen.addEventListener("click", function (event) {
                const pesan =
                    elemen.getAttribute("data-konfirmasi");

                if (!confirm(pesan || "Apakah Anda yakin?")) {
                    event.preventDefault();
                }
            });
        });
}


document.addEventListener("DOMContentLoaded", function () {
    aturTahunFooter();
    aktifkanKonfirmasi();
    perbaruiJumlahKeranjang();
});