<?php
require_once './init.php';
//truy vấn toàn bộ dữ liệu của bảng
$lay_du_lieu = "SELECT * FROM `nha_phan_phoi`";
$rs = mysqli_query($db->conn, $lay_du_lieu);
$db->close();
?>

<script>
    function confirm_xoa(id) {
        if (confirm("Bạn có đồng ý xóa nhà phân phối này không?\nCác sản phẩm thuộc nhà phân phối này sẽ được chuyển đến nhà phân phối (Chưa rõ) ") == true) {
            window.location = "index.php?page=xoanhaphanphoi&id=" + id;
        }
    }
</script>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Quản lý nhà phân phối</div>

        <a class="btn btn-primary add-btn" href="index.php?page=themnhaphanphoi" style="float: right;">
            <i class="fa fa-plus"></i>
            Thêm mới 
        </a>    
    </div>
    <div class="panel-body">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên nhà phân phối</th>
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
                            <!--Chuyển sang list các sản phẩm thuộc cùng danh mục-->
                            <td><a href="index.php?page=sanpham&suplier=<?php echo $row["id"]; ?>"><?php echo $row["ten_nha_phan_phoi"]; ?></a></td>
                            <td><a href="index.php?page=suanhaphanphoi&id=<?php echo $row['id'] ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Sửa</a>&nbsp;|
                                <a href="#" onclick="confirm_xoa(<?php echo $row['id'] ?>)"><i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa</a></td>
                        </tr>
                        <?php
                    }
                    if ($row["id"] == 1) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <!--Chuyển sang list các sản phẩm thuộc cùng npp-->
                            <td><a href="index.php?page=sanpham&suplier=<?php echo $row["id"]; ?>"><?php echo $row["ten_nha_phan_phoi"]; ?></a></td>
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
