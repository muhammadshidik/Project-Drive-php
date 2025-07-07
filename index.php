<?php
// Memulai session PHP agar bisa menggunakan $_SESSION
session_start();

// Memanggil file koneksi ke database
require_once 'admin/controller/koneksi.php';

// Memanggil file yang berisi fungsi-fungsi tambahan (jika ada)
require_once 'admin/controller/functions.php';

// Mengecek apakah form login sudah disubmit (tombol 'login' diklik)
if (isset($_POST['login'])) {

  // Menyimpan inputan dari form ke variabel
  $email    = $_POST['email'];     // Menyimpan email dari form
  $password = $_POST['password'];  // Menyimpan password dari form

  // Melakukan query ke database untuk mencari user dengan email dan password yang sesuai
  $queryLogin = mysqli_query($config, "SELECT * FROM user WHERE email='$email' AND password='$password'");

  // Mengecek apakah ada baris data yang ditemukan (user cocok)
  // mysqli_num_rows() berfungsi menghitung jumlah baris hasil query
  if (mysqli_num_rows($queryLogin) > 0) {

    // Mengambil data user dalam bentuk array asosiatif
    $rowLogin = mysqli_fetch_assoc($queryLogin);

    // Memastikan password yang dimasukkan sama persis (sebenarnya redundant karena sudah dicek di query)
    if ($password == $rowLogin['password']) {

      // Menyimpan data user ke dalam session (untuk keperluan login)
      $_SESSION['id'] = $rowLogin['id'];         // Menyimpan ID user
      $_SESSION['name'] = $rowLogin['name'];     // Menyimpan nama user

      // Mengarahkan ke halaman menu jika login berhasil
      header("location:menu.php");
      die; // Menghentikan proses script setelah redirect

    } else {
      // Jika password tidak cocok, redirect ke halaman login dengan parameter gagal
      header("location:login.php?index=failed");
      die;
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login - Drive App</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow-sm border-0 rounded-4 p-4">
          <h3 class="text-center mb-4">Login ke Drive</h3>

          <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
          <?php endif; ?>

          <form action="" method="POST">
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" name='login' class="btn btn-primary w-100">Login</button>
          </form>

          <div class="text-center mt-3">
            <small>Belum punya akun? <a href="register.php">Daftar di sini</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>