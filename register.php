<?php
header("Content-Type: application/json");
require_once "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["pesan" => "Gunakan metode POST."]);
    exit;
}

$nama = trim($_POST["nama"] ?? "");
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";
$alamat = trim($_POST["alamat"] ?? "");

if (
    $nama === "" ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    strlen($password) < 8
) {
    http_response_code(400);
    echo json_encode([
        "pesan" => "Isi nama, email valid, dan password minimal 8 karakter."
    ]);
    exit;
}

$cek = $conn->prepare("SELECT id FROM users WHERE email = ?");
$cek->bind_param("s", $email);
$cek->execute();
$cek->store_result();

if ($cek->num_rows > 0) {
    http_response_code(409);
    echo json_encode(["pesan" => "Email sudah terdaftar."]);
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$role = "pelanggan";

$stmt = $conn->prepare(
    "INSERT INTO users (nama, email, password, alamat, role)
     VALUES (?, ?, ?, ?, ?)"
);
$stmt->bind_param("sssss", $nama, $email, $hash, $alamat, $role);

if ($stmt->execute()) {
    echo json_encode(["pesan" => "Pendaftaran berhasil."]);
} else {
    http_response_code(500);
    echo json_encode(["pesan" => "Pendaftaran gagal."]);
}
?>