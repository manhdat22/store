<?php
require_once './init.php';
//truy vấn toàn bộ dữ liệu của bảng

$sql_get_all_checkout = "SELECT * FROM `don_hang`";
$rs = mysqli_query($db->conn, $sql_get_all_checkout);
$db->close();
?>

<script>
    function confirm_xoa1(id) {
        if (confirm("Bạn có đồng ý xóa đơn hàng này không ?" == true) {
            window.location = "index.php?page=xoadonhang&id=" + id;
        }
    }
</script>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Quản lý đơn hàng</div>


    </div>
    <div class="panel-body">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>Ngày xuất</th>
                    <th>Người đặt</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Giá trị đơn hàng</th>
                    <th>Trạng thái</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($rs as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row["ngay_xuat"]; ?></td>
                        <td><?php
                            if ($row['user'] == "") {
                                echo "Khách hàng vãng lai";
                            } else {
                                echo $row['user'];
                            }
                            ?></td>
                        <td><?php echo $row["user_hoten"]; ?></td>
                        <td><?php echo $row["user_sdt"]; ?></td>
                        <td><?php echo $row["user_email"]; ?></td>
                        <td><?php echo $row["user_diachi"]; ?></td>
                        <td><?php echo $row["tong_gia"]; ?></td>
                        <td><?php echo $row["trang_thai"]; ?></td>
                        <td><a href="index.php?page=chitietdonhang&id=<?php echo $row['id'] ?>"><i class="fa fa-binoculars"></i>&nbsp;&nbsp;Xem chi tiết</a>&nbsp;|
                            <a href="#" onclick="confirm_xoa1(<?php echo $row['id'] ?>)"><i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>

        </table>
    </div>
</div>
