<?php
require_once './init.php';
//truy vấn toàn bộ dữ liệu của bảng

$sql_get_all_user = "SELECT * FROM `users`";
$rs = mysqli_query($db->conn, $sql_get_all_user);
$db->close();
?>h

<script>
    function confirm_xoa(id) {
        if (confirm("Bạn có đồng ý xóa thành viên này không ?") == true) {
            window.location = "index.php?page=xoauser&id=" + id;
        }
    }
</script>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Quản lý thành viên và người dùng</div>

        <a class="btn btn-primary add-btn" href="index.php?page=themuser" style="float: right;">
            <i class="fa fa-plus"></i>
            Thêm mới 
        </a>    
    </div>
    <div class="panel-body">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Thực thi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($rs as $row) {
                    if ($row["id"] != 1) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["id"]; ?></td>
                            
                            
                            <td><a href="index.php?page=suauser&username=<?php echo $row['username'] ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Sửa</a>&nbsp;|
                                <a href="#" onclick="confirm_xoa(<?php echo $row['id'] ?>)"><i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa</a></td>
                        </tr>
                        <?php
                    }
                    if ($row["id"] == 1) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <!--Chuyển sang list các sản phẩm thuộc cùng danh mục-->
                            <td><a href="index.php?page=sanpham&category=<?php echo $row["id"]; ?>"><?php echo $row["ten_users"]; ?></a></td>
                            <td><i class="fa fa-pencil"></i>&nbsp;&nbsp;Sửa&nbsp;|
                                <i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa</td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>

        </table>
    </div>
</div>
