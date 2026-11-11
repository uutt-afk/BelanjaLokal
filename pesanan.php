<?php
session_start();
header("Content-Type: application/json");
require_once "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $sql = "SELECT * FROM pesanan ORDER BY id DESC";
    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_SESSION["user_id"])) {
        http_response_code(401);
        echo json_encode(["pesan" => "Silakan login terlebih dahulu."]);
        exit;
    }

    $metode = $_POST["metode_pengambilan"] ?? "diantar";
    $alamat = trim($_POST["alamat_pengiriman"] ?? "");
    $pembayaran = trim($_POST["metode_pembayaran"] ?? "");

    if (!in_array($metode, ["diantar", "ambil_sendiri"], true)) {
        http_response_code(400);
        echo json_encode(["pesan" => "Metode pengambilan tidak valid."]);
        exit;
    }

    if ($metode === "diantar" && $alamat === "") {
        http_response_code(400);
        echo json_encode(["pesan" => "Alamat pengiriman wajib diisi."]);
        exit;
    }

    $kode = "BL" . date("YmdHis") . random_int(100, 999);
    $total = 0;
    $user_id = (int) $_SESSION["user_id"];

    $stmt = $conn->prepare(
        "INSERT INTO pesanan
        (kode_pesanan, pengguna_id, total_harga,
         metode_pengambilan, alamat_pengiriman, metode_pembayaran)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "sidsss",
        $kode, $user_id, $total, $metode, $alamat, $pembayaran
    );

    if ($stmt->execute()) {
        echo json_encode([
            "pesan" => "Pesanan berhasil dibuat.",
            "kode_pesanan" => $kode,
            "id_pesanan" => $conn->insert_id
        ]);
    } else {
        http_response_code(500);
        echo json_encode(["pesan" => "Gagal membuat pesanan."]);
    }

    exit;
}

http_response_code(405);
echo json_encode(["pesan" => "Metode tidak diizinkan."]);
?>