<?php
require_once './init.php';
//truy vấn toàn bộ dữ liệu của bảng
$sql_get_all_category = "SELECT * FROM `danh_muc`";
$rs = mysqli_query($db->conn,$sql_get_all_category);
$db->close();
?>
<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Danh sách danh mục</div>
        
        <a class="btn btn-primary add-btn" href="index.php?page=them-danh-muc" style="float: right;">
            <i class="fa fa-plus"></i>
                    Thêm mới 
    </a>    
    </div>
    <div class="panel-body">
        
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Thực thi</th>
                </tr>
            </thead>
            <tbody>
                
                <?php               
                foreach ($rs as $row) {
                    ?>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["ten_danh_muc"]; ?></td>
                    <td><a href="index.php?page=sua-danh-muc"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Sửa</a>|
                        <a href="index.php?page=xoa-danh-muc"><i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa</a></td>
                    <?php 
                }                                   
                ?>
            </tbody>
            
        </table>
    </div>
</div>
