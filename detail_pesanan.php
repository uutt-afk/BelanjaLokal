<?php
session_start();
header("Content-Type: application/json");
require_once "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $sql = "SELECT dp.*, p.nama_produk
            FROM detail_pesanan dp
            JOIN produk p ON dp.produk_id = p.id
            ORDER BY dp.id DESC";

    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["pesan" => "Metode tidak diizinkan."]);
    exit;
}

if (empty($_SESSION["user_id"])) {
    http_response_code(401);
    echo json_encode(["pesan" => "Silakan login terlebih dahulu."]);
    exit;
}

$pesanan_id = (int) ($_POST["pesanan_id"] ?? 0);
$produk_id = (int) ($_POST["produk_id"] ?? 0);
$jumlah = (int) ($_POST["jumlah"] ?? 0);
$user_id = (int) $_SESSION["user_id"];

if ($pesanan_id <= 0 || $produk_id <= 0 || $jumlah <= 0) {
    http_response_code(400);
    echo json_encode(["pesan" => "Data pesanan tidak valid."]);
    exit;
}

$conn->begin_transaction();

try {
    $cekPesanan = $conn->prepare(
        "SELECT id FROM pesanan
         WHERE id = ? AND pengguna_id = ? AND status = 'menunggu'
         FOR UPDATE"
    );
    $cekPesanan->bind_param("ii", $pesanan_id, $user_id);
    $cekPesanan->execute();

    if (!$cekPesanan->get_result()->fetch_assoc()) {
        throw new Exception("Pesanan tidak ditemukan atau tidak bisa diubah.");
    }

    $cekProduk = $conn->prepare(
        "SELECT harga, stok, status FROM produk
         WHERE id = ? FOR UPDATE"
    );
    $cekProduk->bind_param("i", $produk_id);
    $cekProduk->execute();
    $produk = $cekProduk->get_result()->fetch_assoc();

    if (
        !$produk ||
        $produk["status"] !== "aktif" ||
        (int) $produk["stok"] < $jumlah
    ) {
        throw new Exception("Produk tidak tersedia atau stok tidak cukup.");
    }

    $harga = (float) $produk["harga"];
    $subtotal = $harga * $jumlah;

    $insert = $conn->prepare(
        "INSERT INTO detail_pesanan
        (pesanan_id, produk_id, jumlah, harga_satuan, subtotal)
        VALUES (?, ?, ?, ?, ?)"
    );
    $insert->bind_param(
        "iiidd", $pesanan_id, $produk_id, $jumlah, $harga, $subtotal
    );
    $insert->execute();

    $updateStok = $conn->prepare(
        "UPDATE produk SET stok = stok - ? WHERE id = ?"
    );
    $updateStok->bind_param("ii", $jumlah, $produk_id);
    $updateStok->execute();

    $updateTotal = $conn->prepare(
        "UPDATE pesanan
         SET total_harga = (
             SELECT COALESCE(SUM(subtotal), 0)
             FROM detail_pesanan WHERE pesanan_id = ?
         )
         WHERE id = ?"
    );
    $updateTotal->bind_param("ii", $pesanan_id, $pesanan_id);
    $updateTotal->execute();

    $conn->commit();

    echo json_encode(["pesan" => "Produk berhasil ditambahkan ke pesanan."]);
} catch (Throwable $e) {
    $conn->rollback();
    http_response_code(400);
    echo json_encode(["pesan" => $e->getMessage()]);
}
?>