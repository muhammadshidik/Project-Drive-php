
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard - Drive App</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="tmp/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <?php include '../include/css.php'; ?>
</head>

<body style="background-color: #f8f9fa; font-family: 'Roboto', sans-serif;">
    <div class="wrapper">

        <!-- Sidebar -->
        <?php include '../include/sidebar.php'; ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <?php include '../include/logo-header.php'; ?>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?php include '../include/header.php'; ?>
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
                                    if (file_exists("../../content/" . $_GET['page'] . ".php")) {
                                        // Jika file ada, include file tersebut. Ini berfungsi untuk memuat konten dinamis
                                        // berdasarkan halaman yang diminta.
                                        include('../../content/' . $_GET['page'] . ".php");
                                    } else {
                                        // Jika file tidak ditemukan, include halaman 'notfound.php'.
                                        include "../../content/notfound.php";
                                    }
                                } else {
                                    // Jika parameter 'page' tidak ada di URL, secara default include halaman 'home.php'.
                                    include '../../content/dashboard.php';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <?php include '../include/footer.php'; ?>
        </div>

        <!-- Template Customizer -->
        <?php include '../include/custom-template.php'; ?>
    </div>

    <?php include '../include/js.php'; ?>
</body>

</html>
