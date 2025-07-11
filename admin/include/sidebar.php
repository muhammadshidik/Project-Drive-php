<?php
$navbarID = $_SESSION['id'];
$queryNavbar = mysqli_query($config, "SELECT * FROM user WHERE id = '$navbarID'");
$dataNavbar = mysqli_fetch_assoc($queryNavbar);
?>
<div class="sidebar sidebar-style-2" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="?page=dashboard" class="logo" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                <img src="template/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            <ul class="nav nav-secondary">
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#dashboardMenu" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboardMenu">
                        <ul class="nav nav-collapse">
                            <li <?= !isset($_GET['page']) || ($_GET['page'] == 'dashboard') ? 'class="active"' : '' ?>>
                                <a href="?page=dashboard">
                                    <span class="sub-item">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <?php if ($dataNavbar['id_level'] == 1) : ?>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
                        <h4 class="text-section">Master Data</h4>
                    </li>
                    <li class="nav-item active submenu">
                        <a data-bs-toggle="collapse" href="#adminMenu" data-bs-toggle="tooltip" data-bs-placement="right" title="Admin Area">
                            <i class="fas fa-layer-group"></i>
                            <p>Admin</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="adminMenu">
                            <ul class="nav nav-collapse">
                                <li <?= (isset($_GET['page']) && in_array($_GET['page'], ['user', 'add-user'])) ? 'class="active"' : '' ?>>
                                    <a href="?page=user" data-bs-toggle="tooltip" title="Kelola user"><span class="sub-item">User</span></a>
                                </li>
                                <li <?= (isset($_GET['page']) && in_array($_GET['page'], ['level', 'add-level'])) ? 'class="active"' : '' ?>>
                                    <a href="?page=level" data-bs-toggle="tooltip" title="Kelola level"><span class="sub-item">Level</span></a>
                                </li>
                                <li <?= (isset($_GET['page']) && in_array($_GET['page'], ['menu', 'add-menu'])) ? 'class="active"' : '' ?>>
                                    <a href="?page=menu" data-bs-toggle="tooltip" title="Data menu"><span class="sub-item">Menu List</span></a>
                                </li>
                                <li <?= (isset($_GET['page']) && in_array($_GET['page'], ['banner'])) ? 'class="active"' : '' ?>>
                                    <a href="?page=banner" data-bs-toggle="tooltip" title="Data menu"><span class="sub-item">Banner</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php elseif ($dataNavbar['id_level'] == 2) : ?>

                <?php endif; ?>

                <!-- Menu Logout -->
                <li class="nav-item mt-4">
                    <a href="logout.php" class="text-danger" data-bs-toggle="tooltip" title="Keluar dari aplikasi">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>

<!-- Script aktivasi tooltip Bootstrap -->
<script>
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>