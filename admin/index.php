<?php
require_once './init.php';
require_once './modules/adminpage/header.php';
?>

<body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <!-- Logo -->
                    <div class="logo">
                        <h1><a href="index.php">Trang quản trị website</a></h1>
                    </div>
                </div>   
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-12">

                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="navbar navbar-inverse" role="banner">
                        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tài khoản<b class="caret"></b></a>
                                    <ul class="dropdown-menu animated fadeInUp">
                                        <li><a href="profile.html">Thông tin</a></li>
                                        <li><a href="login.html">Đăng xuất</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-md-2">
                <?php include './modules/adminpage/menu.php'; ?>
            </div>
            <div class="col-md-10">

                <?php include './modules/danhmuc/list-danhmuc.php'; ?>
                <!-- Chèn content vào dây -->

            </div>
        </div>
    </div>

    <?php
    require_once './modules/adminpage/footer.php';
    ?>