<?php
session_start();
header("Content-Type: application/json");
require_once "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["pesan" => "Gunakan metode POST."]);
    exit;
}

$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

$stmt = $conn->prepare(
    "SELECT id, nama, email, password, role
     FROM users WHERE email = ?"
);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user["password"])) {
    session_regenerate_id(true);

    $_SESSION["user_id"] = $user["id"];
    $_SESSION["nama"] = $user["nama"];
    $_SESSION["role"] = $user["role"];

    unset($user["password"]);

    echo json_encode([
        "pesan" => "Login berhasil.",
        "user" => $user
    ]);
} else {
    http_response_code(401);
    echo json_encode([
        "pesan" => "Email atau password salah."
    ]);
}
?>