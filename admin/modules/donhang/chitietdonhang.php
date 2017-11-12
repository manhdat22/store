
<?php
require_once './init.php';

if (isset($_REQUEST['id'])) {
    $id_sp = $_REQUEST['id'];
    $lay_dl = "SELECT * FROM donhang_sp JOIN don_hang ON don_hang.id = donhang_sp.id_donhang JOIN san_pham ON san_pham.id = donhang_sp.id_sp where don_hang.id = $id_sp";
    //$lay_anh = "SELECT url FROM `san_pham` JOIN hinhanh_sp on san_pham.id = hinhanh_sp.id_sp JOIN hinh_anh on hinhanh_sp.id_anh = hinh_anh.id where san_pham.id = '{$id_sp}'";
    $rs = mysqli_query($db->conn, $lay_dl);
    //$img = mysqli_query($db->conn, $lay_anh);
    $datas = mysqli_fetch_assoc($rs);

    $db->close();
} else {
    new Redirect('index.php?page=sanpham');
}
//truy vấn toàn bộ dữ liệu của bảng
?>


<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Chi tiết đơn hàng</div>

    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <h3>Thông tin đơn hàng</h3>
            <table class="table"  width="100%" style="font-size: 18px;">
                <tr>
                    <th>Tên SP</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
                <?php
                $tonggia = 0;
                if (is_array($rs) || is_object($rs)) {
                    foreach ($rs as $v) {
                        ?>
                        <tr>
                            <td><?php echo $v['ten_san_pham'] ?></td>
                            <td><?php
                                echo $v['so_luong'];
                                ?></td>
                            <td><?php
                                $gia = $v['don_gia'] * $v['so_luong'];
                                echo number_format($gia, 0, "", ".") . " VNĐ"
                                ?></td>
                        </tr>
                        <?php
                        $tonggia = $tonggia + ($v['don_gia'] * $v['so_luong']);
                    }
                }
                ?>
            </table>
            <BR>
            <h3>Thông tin khách hàng</h3>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Mã đơn hàng</td>
                        <td><?php echo $datas['id']; ?></td>
                    </tr>
                    <tr>
                        <td>Tên đăng nhập</td>
                        <td><?php
                            if ($datas['user'] == "") {
                                echo "Khách hàng vãng lai";
                            } else {
                                echo $datas['user'];
                            }
                            ?></td>
                    </tr>
                    <tr>

                        <td>Họ tên người mua</td>
                        <td><?php echo $datas['user_hoten']; ?></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><?php echo $datas['user_sdt']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $datas['user_email']; ?></td>
                    </tr>
                    <tr>
                        <td>Ngày đặt hàng</td>
                        <td><?php echo $datas['ngay_xuat']; ?></td>
                    </tr>
                    


                </tbody>
            </table>

            <a class="btn btn-primary add-btn" href="index.php?page=donhang" style="float: right;">
                <i class="fa fa-arrow-circle-left"></i>
                Quay lại
            </a>    
        </div>
    </div>
</div>