<?php
$currentUrl = $_GET['url'] ?? '';

$isSinhVien = strpos($currentUrl, 'sinhvien') === 0;
$isLop = strpos($currentUrl, 'lop') === 0;
?>

<nav class="navbar navbar-expand-lg app-navbar sticky-top">
    <div class="container-fluid app-shell">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="/home/index/">
            <span class="brand-mark">SV</span>
            <span>Student Manager</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link <?php echo $isSinhVien ? 'active' : ''; ?>" href="/sinhvien/index/">
                        Quản lý sinh viên
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo $isLop ? 'active' : ''; ?>" href="/lop/index/">
                        Quản lý lớp học
                    </a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-outline-primary ms-lg-2" href="/auth/logout/">
                        Đăng xuất
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>