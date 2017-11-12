<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <?php
        require_once 'include/init.php';
        include 'include/meta.php';
        ?>
    </head>
    <body>
        <!--top-header-->
        <div class="top-header">
            <div class="container">
                <div class="top-header-main">
                    <div class="col-md-4 top-header-left">
                        <div class="search-bar">
                            <form method="GET" action="pages/search.php">
                                <input type="text" name="tukhoa" placeholder="Tìm kiếm ..." onfocus="this.value = '';" onblur="if (this.value == '')">
                                <input type="submit" value="">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 top-header-middle">
                        <a href="index.php"><img src="images/logo.png" alt="Anh Quân Watch"/></a>
                    </div>
                    <div class="col-md-4 top-header-right">

                        <?php
                        //echo $_SESSION['giohang'];
                        if (!isset($_SESSION['user'])) {
                            ?>
                            <div class="col-md-6 cart box_1">
                                <!--<a title="Chỉnh sửa thông tin cá nhân"><b>Helena</b></a>-->
                                <a class="total" href="index.php?page=dangky" ><b>Đăng ký</b></a>
                                <a class="total" href="index.php?page=dangnhap" ><b>Đăng nhập</b></a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="col-md-6 cart box_1">
                                <a class="total" href='index.php?page=chinhsuathongtin&username=<?php echo $_SESSION["user"] ?>' title="Chỉnh sửa thông tin cá nhân"><b><?php echo $_SESSION['user']; ?></b></a>
                                <a class="total"  href="logout.php" onclick="logoutnow();" class="dropdown-toggle" data-toggle="dropdown">Đăng xuất</a>
                                <script>
                                    function logoutnow() {
                                        var check = confirm("Bạn có muốn đăng xuất?");
                                        if (check) {
                                            location.href = "logout.php";
                                        }
                                    }
                                </script>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="col-md-6">
                            <div class="cart box_1">
                                <a href="index.php?page=giohang">
                                    <h3> <div class="total">

                                            <img src="images/cart-1.png" alt="" />   Giỏ hàng 
                                    </h3>
                                </a>
                                <p></p>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--top-header-->
        <!--bottom-header-->
        <div class="header-bottom">
            <!--menu-->
            <?php
            include 'include/menu.php';
            ?>
        </div>
        <!--start main content-->
        <?php
        include 'include/route.php';
        ?>
        <!--end main content-->
        <!--start-footer-->
        <div class="footer">
            <?php
            include 'include/footer.php';
            ?>	
        </div>
        <!--end-footer-->
        <!--end-footer-text-->
        <div class="footer-text">
            <div class="container">
                <div class="footer-main">
                    <p class="footer-class">© 2017 All Rights Reserved | Design by  <a href="https://www.facebook.com/pvipb" target="_blank">Nguyễn Anh Quân</a> </p>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    /*
                     var defaults = {
                     containerID: 'toTop', // fading element id
                     containerHoverID: 'toTopHover', // fading element hover id
                     scrollSpeed: 1200,
                     easingType: 'linear'
                     };
                     */

                    $().UItoTop({easingType: 'easeOutQuart'});

                });
            </script>
            <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
        </div>
        <!--end-footer-text-->
    </body>
</html>
