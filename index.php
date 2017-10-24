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
                        <div class="cart box_1">
                            <a href="checkout.html">
                                <h3> <div class="total">
                                        <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
                                    <img src="images/cart-1.png" alt="" /></h3>
                            </a>
                            <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
                            <div class="clearfix"> </div>
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
