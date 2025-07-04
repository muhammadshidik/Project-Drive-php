<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="tmp/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <?php include '../include/css.php';?>
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        color: #333;
        background-color: #f8f9fa;
        line-height: 1.6;
    }

    h1,
    h2,
    h3 {
        font-weight: 700;
    }

    p {
        margin-bottom: 1rem;
    }
    </style>


</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include '../include/sidebar.php'?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <?php include '../include/logo-header.php'?>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <?php include '../include/header.php'?>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card">
                                <?php
                                            if (isset($_GET['page'])) {
                  if (file_exists('../../content/' . $_GET['page'] . '.php')) {
                    include '../../content/' . $_GET['page'] . '.php';
                  } else {
                    header("Location: ../../content/misc/error.php");
                    die;
                  }
                } else {
                  include('../../content/dashboard.php');
                }

                              ?>
                          </div>
                        </div>
                      </div>

                            </div>
                        </div>
                    </div>
                </div>

            <!-- End Tempat buat isi content php -->
            <?php include '../include/footer.php' ?>
        </div>

        <!-- Custom template | don't include it in your project! -->
        <?php include '../include/custom-template.php' ?>
        <!-- End Custom template -->
    </div>
    <?php include '../include/js.php'?>
</body>

</html>