<?php
require_once './init.php';
//truy vấn toàn bộ dữ liệu của bảng

$sql_get_all_user = "SELECT * FROM `users`";
$rs = mysqli_query($db->conn, $sql_get_all_user);
$db->close();
?>

<script>
    function confirm_xoa(id) {
        if (confirm("Bạn có đồng ý xóa thành viên này không ?") == true) {
            window.location = "index.php?page=xoathanhvien&username=" + id;
        }
    }
</script>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Quản lý thành viên và người dùng</div>

        <a class="btn btn-primary add-btn" href="index.php?page=themthanhvien" style="float: right;">
            <i class="fa fa-plus"></i>
            Thêm mới 
        </a>    
    </div>
    <div class="panel-body">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>Tên đăng nhập</th>
                    <th>Họ tên</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Quyền</th>
                    <th>Trạng thái</th>
                    <th>Ngày đăng ký</th>
                    <th>Thực thi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($rs as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["ho_ten"]; ?></td>
                        <td><?php
                            if ($row["gioi_tinh"] == 0) {
                                echo 'Nam';
                            } else {
                                echo 'Nữ';
                            }
                            ?></td>
                        <td><?php echo $row["sdt"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["dia_chi"]; ?></td>
                        <td><?php
                            if ($row["quyen"] == 0) {
                                echo 'Admin';
                            } else {
                                echo 'Người dùng';
                            }
                            ?></td>
                        <td><?php
                            if ($row["trang_thai"] == 0) {
                                echo 'Tạm dừng hoạt động';
                            } else {
                                echo 'Đang hoạt động';
                            }
                            ?></td>
                        <td><?php echo $row["ngay_dang_ki"]; ?></td>


                        <td><a href="index.php?page=suathanhvien&username=<?php echo $row['username'] ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Sửa</a>&nbsp;|
                            <a href="#" onclick="confirm_xoa('<?php echo $row['username'] ?>')"><i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa</a></td>
                    </tr>
    <?php
}
?>
            </tbody>

        </table>
    </div>
</div>
