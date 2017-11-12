<?php
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = "";
}
$sql = "select * from san_pham where id in ({$_SESSION['giohang']})";
$r = mysqli_query($db->conn, $sql);
$tonggia = 0;

$san_pham_trong_gio = explode(",", $_SESSION['giohang']);



if (isset($_SESSION['user'])) {
    $u = $_SESSION['user'];
    $user_sql = "select * from users where username = '" . $u . "'";
    $us = mysqli_query($db->conn, $user_sql);
    $dataa = mysqli_fetch_assoc($us);
} else {
    $u = NULL;
}
?>


<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="./index.php">Trang chủ</a></li>
                <li class="active">Đặt hàng</li>
            </ol>
        </div>
    </div>
</div>
<!--start-ckeckout-->
<div class="ckeckout">
    <div class="container">
        <div class="ckeckout-top col-md-12">

        </div>
        <div class="clearfix"></div>
        <br>
        <div class="cart-items heading">
            <div class="col-md-6 account-left">
                <div class="account-top heading">
                    <h3>Thông tin đơn hàng</h3>
                    <br>

                    <table  width="100%" style="font-size: 18px;">
                        <tr>
                            <th>Tên SP</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                        <?php
                        $tonggia = 0;
                        if (is_array($r) || is_object($r)) {
                            foreach ($r as $v) {
                                ?>
                                <tr>
                                    <td><?php echo $v['ten_san_pham'] ?></td>
                                    <td><?php
                                        $quan = substr_count($_SESSION['giohang'], $v['id']);
                                        echo $quan;
                                        ?></td>
                                    <td><?php
                                        $gia = $v['don_gia'] * $quan;
                                        echo number_format($gia, 0, "", ".") . " VNĐ"
                                        ?></td>
                                </tr>
                                <?php
                                $tonggia = $tonggia + ($v['don_gia'] * $quan);
                            }
                        }
                        ?>
                    </table>
                    <hr>
                    <h3>Tổng giá trị đơn hàng: <b><?php echo number_format($tonggia, 0, "", ".") . " VNĐ" ?></b></h3>
                    <i>Hiện chỉ hỗ trợ thanh toán COD hoặc mua hàng trực tiếp tại cửa hàng</i>
                </div>

            </div>
            <div class="col-md-6 account-left">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $n = $_POST['cName'];
                    $p = $_POST['cPhone'];
                    $e = $_POST['cMail'];
                    $a = $_POST['cAdd'];


                    if ($n == "" || $e == "" || $p == "" || $a == "") {
                        echo '<script>alert("Vui lòng điền đây đủ thông tin")</script>';
                    } else {
                        $insert_dh = "INSERT INTO `don_hang`(`user`, `user_hoten`, `user_sdt`, `user_email`, `user_diachi`, `trang_thai`, `tong_gia`, `ngay_xuat`) "
                                . "VALUES ('$u','$n','$p','$e','$a',1,$tonggia, '$today')";
                       
                        if (mysqli_query($db->conn, $insert_dh)) {
                            $dh_id = mysqli_insert_id($db->conn);
                            $san_pham_trong_gio = explode(",", $_SESSION['giohang']);
                            for ($i = 0; $i < count($san_pham_trong_gio); $i++) {
                                $insert_sp = "insert into `donhang_sp` values ($san_pham_trong_gio[$i],$dh_id,$quan,$gia)";
                                $update_kho = "UPDATE `san_pham` SET `available` = `available` - $quan";
                                
                                if (mysqli_query($db->conn, $insert_sp)) {
                                    
                                    echo '<script>alert("Đặ t hàng thành công")</script>';
                                    $_SESSION['giohang'] = "";
                                    
                                }
                            }
                        } else {
                            
                            
                            echo '<script>alert("Có lỗi xảy ra")</script>';
                        }
                        
                    }
                }
                if (isset($_SESSION['user'])) {
                    ?>
                    <form method="POST">
                        <div class="account-top heading">
                            <h3>Thanh toán đơn giản</h3>
                        </div>
                        <div class="address">
                            <span>Họ tên</span>
                            <input type="text" name="cName" value="<?php echo $dataa['ho_ten'] ?>">
                        </div>
                        <div class="address">
                            <span>Số điện thoại</span>
                            <input type="text" name="cPhone" value="<?php echo $dataa['sdt'] ?>">
                        </div>
                        <div class="address">
                            <span>Email</span>
                            <input type="text" name="cMail" value="<?php echo $dataa['email'] ?>">
                        </div>
                        <div class="address">
                            <span>Địa chỉ</span>
                            <textarea style="border: 1px solid #242424;
                                      outline: none;
                                      width: 100%;
                                      font-size: 14px;
                                      padding: 10px 10px;
                                      font-family: 'Lato', sans-serif;" name="cAdd"><?php echo $dataa['dia_chi'] ?></textarea>
                        </div>

                        <div class="address new">
                            <input type="submit" value="Đặt hàng">

                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                <form method="POST" action="">
                        <div class="account-top heading">
                            <h3>Thanh toán đơn giản</h3>
                        </div>
                        <div class="address">
                            <span>Họ tên *</span>
                            <input type="text" name="cName" >
                        </div>
                        <div class="address">
                            <span>Số điện thoại *</span>
                            <input type="text" name="cPhone" >
                        </div>
                        <div class="address">
                            <span>Email *</span>
                            <input type="text" name="cMail" >
                        </div>
                        <div class="address">
                            <span>Địa chỉ *</span>
                            <textarea style="border: 1px solid #242424;
                                      outline: none;
                                      width: 100%;
                                      font-size: 14px;
                                      padding: 10px 10px;
                                      font-family: 'Lato', sans-serif;" name="cAdd"></textarea>
                        </div>

                        <div class="address new">
                            <input type="submit" value="Đặt hàng">
                            &nbsp;&nbsp;&nbsp;
                            <a href="index.php?page=dangky">Đăng ký</a> hoặc <a href="index.php?page=dangnhap">Đăng nhập</a> để dễ dàng đặt hàng
                        </div>
                    </form>
                <?php }
                ?>
            </div>

        </div>
    </div>
</div>

