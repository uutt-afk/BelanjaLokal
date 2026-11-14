<?php
session_start();

// Menghapus semua data sesi pengguna
$_SESSION = array();

// Menghapus sesi login
session_destroy();

// Kembali ke halaman utama
header("Location: index.php");
exit;
?>