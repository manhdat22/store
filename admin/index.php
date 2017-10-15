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
                                    <a href="" onclick="logout();" class="dropdown-toggle" data-toggle="dropdown">Đăng xuất</a>
                                    <script>
                                        function logout() {
                                            var check = confirm("Bạn có muốn đăng xuất?");
                                            if (check) {
                                                location.href = "logout.php";
                                            }
                                        }
                                    </script>
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

                <!--route-->
                <?php include './modules/adminpage/route.php'; ?>
                <!-- Chèn content vào dây -->

            </div>
        </div>
    </div>

    <?php
    include './modules/adminpage/footer.php';
    ?>