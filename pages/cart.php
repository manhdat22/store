<?php
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = "";
}
$sttr = '/^,/';
$_SESSION['giohang'] = preg_replace($sttr, '', $_SESSION['giohang']);


$sql = "select * from san_pham where id in ({$_SESSION['giohang']})";
$r = mysqli_query($db->conn, $sql);
$tonggia = 0;
?>



<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="./index.php">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
    </div>
</div>
<!--start-ckeckout-->
<div class="ckeckout">
    <div class="container">
        <div class="ckeckout-top">
            <div class=" cart-items heading">
                <h3>Giỏ hàng</h3>

                <div class="in-check" >
                    <ul class="unit">
                        <li><span>Ảnh</span></li>
                        <li><span>Tên sản phẩm</span></li>
                        <li><span>Số lựợng</span></li>
                        <li><span>Giá</span></li>
                        <li><span>Xóa</span> </li>
                        <div class="clearfix"> </div>
                    </ul>
                    <?php
                    $tongtien = 0;
                    if (is_array($r) || is_object($r)) {
                        foreach ($r as $v) {
                            //echo $_SESSION['giohang'];
                            ?>
                            <ul class="cart-header">

                                <li class="-in"><img width="100px" src="images/<?php echo $v['hinh_anh'] ?>" class="img-responsive" alt=""></a>
                                </li>
                                <li><span><a href="index.php?page=sanpham&id=<?php echo $v['id'] ?>" ><?php echo $v['ten_san_pham'] ?></a></span></li>
                                <li><span><?php
                                        $quan = substr_count($_SESSION['giohang'], $v['id']);
                                        echo $quan;
                                        ?>
                                    </span></li>

                                <li><span><?php
                                        $gia = $v['don_gia'] * $quan;
                                        echo number_format($gia, 0, "", ".") . " VNĐ"
                                        ?>
                                    </span></li>
                                <li><span><a href="index.php?page=xoagiohang&id=<?php echo $v['id'] ?>" >Xóa</a></span></li>
                                <div class="clearfix"></div>
                            </ul>

                            <?php
                            $tonggia = $tonggia + ($v['don_gia'] * $quan);
                        }
                    }
                    ?>
                    <ul class="cart-header">

                        <li><span>Tổng giá: <b><?php
                                    echo number_format($tonggia, 0, "", ".") . " VNĐ"
                                    ?></b></span></li>
                        <div class="clearfix"></div>
                    </ul>

                    <div style="float: right; " class="full_width">

                        <a href="index.php?page=thanhtoan" class="float-left btn btn-default">Thanh toán</a>
                        <a href="index.php" class="float-left btn btn-default">Tiếp tục mua hàng</a>
                        <a href="index.php?page=xoagiohang" class="float-right btn btn-danger">Hủy đơn hàng</a>
                    </div>

                </div>
            </div>  
        </div>
    </div>
</div>

