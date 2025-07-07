<?php
// Memulai session agar bisa menggunakan $_SESSION
session_start();

// Membuat session ID baru dan menghapus session ID lama untuk meningkatkan keamanan (mencegah session fixation)
session_regenerate_id();

// Mengaktifkan output buffering (penyimpanan output sementara sebelum dikirim ke browser)
ob_start();

// Membersihkan output buffer, menghapus semua isi buffer (jika ada output sebelumnya)
ob_clean();

// Memanggil file koneksi ke database
require_once 'admin/controller/koneksi.php';

// Memanggil file yang berisi fungsi-fungsi tambahan
require_once 'admin/controller/functions.php';

// Mengecek apakah session 'id' kosong (belum login atau session habis)
if (empty($_SESSION['id'])) {
    // Jika belum login, arahkan pengguna ke halaman logout (biasanya akan diarahkan ke login page lagi)
    header('Location: admin/controller/logout.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard - Drive App</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="tmp/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <?php include 'admin/include/css.php'; ?>
</head>

<body style="background-color: #f8f9fa; font-family: 'Roboto', sans-serif;">
    <div class="wrapper">

        <!-- Sidebar -->
        <?php include 'admin/include/sidebar.php'; ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <?php include 'admin/include/logo-header.php'; ?>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?php include 'admin/include/header.php'; ?>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <?php echo isset($_GET['page']) ? str_replace("-", " ",  ucfirst($_GET['page'])) : 'Home' //untuk menambahkan nama disetiap halaman
                                    ?>
                                </div>
                                <div class="card-body">
                                    <?php
                                    // Memeriksa apakah parameter 'page' ada di URL.
                                    if (isset($_GET['page'])) {
                                        // Memeriksa apakah file PHP dengan nama yang sesuai dengan parameter 'page'
                                        // ada di dalam folder 'content'.
                                        if (file_exists("admin/content/" . $_GET['page'] . ".php")) {
                                            // Jika file ada, include file tersebut. Ini berfungsi untuk memuat konten dinamis
                                            // berdasarkan halaman yang diminta.
                                            include('admin/content/' . $_GET['page'] . ".php");
                                        } else {
                                            // Jika file tidak ditemukan, include halaman 'notfound.php'.
                                            include "admin/content/notfound.php";
                                        }
                                    } else {
                                        // Jika parameter 'page' tidak ada di URL, secara default include halaman 'home.php'.
                                        include 'admin/content/dashboard.php';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <?php include 'admin/include/footer.php'; ?>
            </div>

            <!-- Template Customizer -->
            <?php include 'admin/include/custom-template.php'; ?>
        </div>

        <?php include 'admin/include/js.php'; ?>
</body>

</html>