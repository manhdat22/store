<?php
$m3 = $m4 = $m5 = $m6 = $m7 = $m0 = $m1 = $m2 = "";
if (isset($_REQUEST['page'])) {
    $menu = $_REQUEST['page'];
    switch ($menu) {
        case "donhang" :
        case "xoadonhang":
        case "themdanhmuc":
        case "suadanhmuc":
            $m1 = 'class="current"';
            break;
        case "danhmuc" :
        case "xoadanhmuc":
        case "themdanhmuc":
        case "suadanhmuc":
            $m2 = 'class="current"';
            break;
        case "thuonghieu" :
        case "xoathuonghieu":
        case "themthuonghieu":
        case "suathuonghieu":
            $m3 = 'class="current"';
            break;
        case "nhaphanphoi" :
        case "xoanhaphanphoi":
        case "themnhaphanphoi":
        case "suanhaphanphoi":
            $m4 = 'class="current"';
            break;
        case "sanpham" :
        case "xoasanpham":
        case "themsanpham":
        case "suasanpham":
            $m5 = 'class="current"';
            break;
        case "thanhvien" :
        case "xoathanhvien":
        case "themthanhvien":
        case "suathanhvien":
            $m7 = 'class="current"';
            break;
        default:
            //$admin = 'class="current"';
            break;
    }
} else {
    $m0 = 'class="current"';
}
?>


<div class="sidebar content-box" style="display: block;">
    <ul class="nav">
        <!-- Main menu -->
        <li <?php echo $m0; ?>><a href="index.php"><i class="glyphicon glyphicon-home"></i> Bảng tin</a></li>
        <li <?php echo $m1; ?>><a href="index.php?page=donhang"><i class="glyphicon glyphicon-chevron-right"></i> Đơn hàng</a></li>
        <li <?php echo $m2; ?>><a href="index.php?page=danhmuc"><i class="glyphicon glyphicon-chevron-right"></i> Danh mục</a></li>
        <li <?php echo $m3; ?>><a href="index.php?page=thuonghieu"><i class="glyphicon glyphicon-chevron-right"></i> Thương hiệu </a></li>
        <li <?php echo $m4; ?>><a href="index.php?page=nhaphanphoi"><i class="glyphicon glyphicon-chevron-right"></i> Nhà phân phối</a></li>
        <li <?php echo $m5; ?>><a href="index.php?page=sanpham"><i class="glyphicon glyphicon-chevron-right"></i> Sản phẩm </a></li>
        <li <?php echo $m6; ?>><a href="index.php?page=baocao"><i class="glyphicon glyphicon-chevron-right"></i> Báo cáo </a></li>
        <li <?php echo $m7; ?>><a href="index.php?page=thanhvien"><i class="glyphicon glyphicon-chevron-right"></i> Thành viên </a></li>
        <!--<li class="submenu">
                    <a href="#">
                        <i class="glyphicon glyphicon-list"></i> Pages
                        <span class="caret pull-right"></span>
                    </a>
                     Sub menu 
                    <ul>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="signup.html">Signup</a></li>
                    </ul>
                </li>-->
    </ul>
</div>