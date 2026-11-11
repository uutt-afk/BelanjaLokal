<?php
header("Content-Type: application/json");
require_once "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $sql = "SELECT produk.*, toko.nama_toko
            FROM produk
            JOIN toko ON produk.toko_id = toko.id
            ORDER BY produk.id DESC";

    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $toko_id = (int) ($_POST["toko_id"] ?? 0);
    $nama = trim($_POST["nama_produk"] ?? "");
    $slug = trim($_POST["slug"] ?? "");
    $deskripsi = trim($_POST["deskripsi"] ?? "");
    $harga = (float) ($_POST["harga"] ?? 0);
    $stok = (int) ($_POST["stok"] ?? 0);
    $foto = trim($_POST["foto"] ?? "");

    if (
        $toko_id <= 0 || $nama === "" ||
        $slug === "" || $harga < 0 || $stok < 0
    ) {
        http_response_code(400);
        echo json_encode([
            "pesan" => "Data produk tidak valid."
        ]);
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO produk
        (toko_id, nama_produk, slug, deskripsi, harga, stok, foto)
        VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "isssdis",
        $toko_id, $nama, $slug, $deskripsi,
        $harga, $stok, $foto
    );

    if ($stmt->execute()) {
        echo json_encode([
            "pesan" => "Produk berhasil ditambahkan."
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            "pesan" => "Gagal menambahkan produk."
        ]);
    }

    exit;
}

http_response_code(405);
echo json_encode(["pesan" => "Metode tidak diizinkan."]);
?>