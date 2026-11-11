<?php
header("Content-Type: application/json");
require_once "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $sql = "SELECT * FROM toko ORDER BY id DESC";
    $result = $conn->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama_toko"] ?? "");
    $slug = trim($_POST["slug"] ?? "");
    $deskripsi = trim($_POST["deskripsi"] ?? "");
    $alamat = trim($_POST["alamat"] ?? "");
    $foto = trim($_POST["foto"] ?? "");
    $kategori_id = $_POST["kategori_id"] ?? "";

    if ($nama === "" || $slug === "") {
        http_response_code(400);
        echo json_encode([
            "pesan" => "Nama toko dan slug wajib diisi."
        ]);
        exit;
    }

    if ($kategori_id === "") {
        $stmt = $conn->prepare(
            "INSERT INTO toko
            (nama_toko, slug, deskripsi, alamat, foto)
            VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "sssss", $nama, $slug, $deskripsi, $alamat, $foto
        );
    } else {
        $kategori_id = (int) $kategori_id;

        $stmt = $conn->prepare(
            "INSERT INTO toko
            (kategori_id, nama_toko, slug, deskripsi, alamat, foto)
            VALUES (?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "isssss",
            $kategori_id, $nama, $slug, $deskripsi, $alamat, $foto
        );
    }

    if ($stmt->execute()) {
        echo json_encode([
            "pesan" => "Toko berhasil ditambahkan."
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            "pesan" => "Gagal menambahkan toko. Periksa slug dan kategori."
        ]);
    }

    exit;
}

http_response_code(405);
echo json_encode(["pesan" => "Metode tidak diizinkan."]);
?>