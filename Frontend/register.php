<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - BelanjaLokal</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f4;
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

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }

        .register-container {
            max-width: 450px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .register-container h2 {
            text-align: center;
            color: #218838;
            margin-bottom: 10px;
        }

        .deskripsi {
            text-align: center;
            color: #666;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn-daftar {
            width: 100%;
            padding: 13px;
            background: #218838;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-daftar:hover {
            background: #176b2c;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #218838;
            text-decoration: none;
            font-weight: bold;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #666;
        }

        @media (max-width: 500px) {
            .register-container {
                margin: 25px 15px;
                padding: 22px;
            }

            .navbar {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<header class="navbar">
    <a href="index.php" class="logo">BelanjaLokal</a>

    <nav>
        <a href="index.php">Beranda</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<main class="register-container">
    <h2>Buat Akun Baru</h2>
    <p class="deskripsi">
        Bergabunglah dan mulai belanja produk lokal!
    </p>

    <form id="registerForm">
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama"
                   placeholder="Masukkan nama lengkap"
                   required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email"
                   placeholder="Masukkan email"
                   required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat"
                   placeholder="Masukkan alamat"
                   required>
        </div>

        <div class="form-group">
            <label for="role">Daftar Sebagai</label>
            <select id="role" name="role" required>
                <option value="">-- Pilih jenis akun --</option>
                <option value="pelanggan">Pelanggan</option>
                <option value="pemilik_toko">Pemilik Toko</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password"
                   name="password"
                   placeholder="Minimal 8 karakter"
                   minlength="8" required>
        </div>

        <div class="form-group">
            <label for="konfirmasi_password">
                Konfirmasi Password
            </label>
            <input type="password" id="konfirmasi_password"
                   name="konfirmasi_password"
                   placeholder="Ulangi password"
                   minlength="8" required>
        </div>

        <button type="submit" class="btn-daftar">
            Daftar Sekarang
        </button>
    </form>

    <p class="login-link">
        Sudah punya akun?
        <a href="login.php">Login di sini</a>
    </p>
</main>

<footer>
    <p>&copy; 2026 BelanjaLokal</p>
    <p>Mendukung usaha lokal, membangun ekonomi bersama.</p>
</footer>

<script>
    document.getElementById("registerForm")
        .addEventListener("submit", function(event) {
            event.preventDefault();

            const password =
                document.getElementById("password").value;
            const konfirmasi =
                document.getElementById("konfirmasi_password").value;

            if (password !== konfirmasi) {
                alert("Konfirmasi password tidak cocok!");
                return;
            }

            alert("Tampilan berhasil! Pendaftaran belum terhubung ke database.");
        });
</script>

</body>
</html>