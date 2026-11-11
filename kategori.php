<?php
header("Content-Type: application/json");
require_once "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $sql = "SELECT * FROM kategori ORDER BY id DESC";
    $result = $conn->query($sql);

    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama_kategori"] ?? "");
    $slug = trim($_POST["slug"] ?? "");
    $deskripsi = trim($_POST["deskripsi"] ?? "");

    if ($nama === "" || $slug === "") {
        http_response_code(400);
        echo json_encode([
            "pesan" => "Nama kategori dan slug wajib diisi."
        ]);
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO kategori (nama_kategori, slug, deskripsi)
         VALUES (?, ?, ?)"
    );

    $stmt->bind_param("sss", $nama, $slug, $deskripsi);

    if ($stmt->execute()) {
        echo json_encode(["pesan" => "Kategori berhasil ditambahkan."]);
    } else {
        http_response_code(400);
        echo json_encode(["pesan" => "Gagal menambahkan kategori."]);
    }

    exit;
}

http_response_code(405);
echo json_encode(["pesan" => "Metode tidak diizinkan."]);
?>