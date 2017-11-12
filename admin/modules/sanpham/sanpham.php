<?php
require_once './init.php';
//truy vấn toàn bộ dữ liệu của bảng
$lay_du_lieu = "SELECT  `san_pham`.* , `danh_muc`.ten_danh_muc , `thuong_hieu`.ten_thuong_hieu,  `nha_phan_phoi`.ten_nha_phan_phoi FROM `san_pham`  JOIN danh_muc on san_pham.id_danh_muc=danh_muc.id JOIN thuong_hieu on san_pham.id_thuong_hieu=thuong_hieu.id JOIN nha_phan_phoi on san_pham.id_nha_phan_phoi=nha_phan_phoi.id ";
//$lay_anh = "SELECT url FROM `san_pham` JOIN hinhanh_sp on san_pham.id = hinhanh_sp.id_sp JOIN hinh_anh on hinhanh_sp.id_anh = hinh_anh.id";
$rs = mysqli_query($db->conn, $lay_du_lieu);
//$img = mysqli_query($db->conn, $lay_anh);
//$feature_img = mysqli_fetch_assoc($img);
$url = "http://localhost/store/images/";
if (is_array($rs) || is_object($rs)) {
    foreach ($rs as $r) {
        if ($r['available'] == 0 && $r['status'] != 0) {
            $cap_nhat_trang_thai_het = "UPDATE `san_pham` SET `status` = 2 where `id` = {$r["id"]} ";
            $xuly = mysqli_query($db->conn, $cap_nhat_trang_thai_het);
        } else if ($r['available'] > 0 && $r['status'] != 0) {
            $cap_nhat_trang_thai_co = "UPDATE `san_pham` SET `status` = 1 where `id` = {$r["id"]} ";
            $xuly = mysqli_query($db->conn, $cap_nhat_trang_thai_co);
        }
        //new Redirect('index.php?page=sanpham');
    }
}
$db->close();
?>

<script>
    function confirm_xoa(id) {
        if (confirm("Bạn có đồng ý xóa sản phẩm này không ?") == true) {
            window.location = "index.php?page=xoasanpham&id=" + id;
        }
    }
</script>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Quản lý sản phẩm</div>

        <a class="btn btn-primary add-btn" href="index.php?page=themsanpham" style="float: right;">
            <i class="fa fa-plus"></i>
            Thêm mới 
        </a>    
    </div>
    <div class="panel-body">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th>Nhà phân phối</th>
                    <th>Trang thái</th>
                    <th>Số lượng</th>
                    <th>Thực thi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (is_array($rs) || is_object($rs)) {
                    foreach ($rs as $row) {
                        //xử lý hết hàng
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><img src="<?php echo $url . $row['hinh_anh'] ?>" width='100px'/></td>
                            <td><a href="index.php?page=chitietsanpham&id=<?php echo $row["id"]; ?>"><?php echo $row["ten_san_pham"]; ?></a></td>
                            <td><?php echo $row["don_gia"] . "&nbsp;VNĐ"; ?></td>
                            <td><?php echo $row["ten_danh_muc"]; ?></td>
                            <td><?php echo $row["ten_thuong_hieu"]; ?></td>
                            <td><?php echo $row["ten_nha_phan_phoi"]; ?></td>
                            <td><?php
                                //trạng thái mặt hàng 0: ẩn , 1: bán, 2: sắp hết hàng, 3: hết hàng
                                if ($row["status"] == 0) {
                                    echo "<strong style='color: grey'>Ẩn</strong>";
                                } elseif ($row["status"] == 1) {
                                    echo "<strong style='color: green'>Đang bán</strong>";
                                } elseif ($row["status"] == 2) {
                                    echo "<strong style='color: red'>Hết hàng</strong>";
                                }
                                ?></td>
                            <td><?php
                                //tình trạng kho hàng.
                                if ($row["available"] == 0) {
                                    echo '<strong style="color: red">' . $row["available"] . '</strong>';
                                } elseif ($row["available"] >= 10) {
                                    echo '<strong style="color: green">' . $row["available"] . '</strong>';
                                } elseif ($row["available"] < 10) {
                                    echo '<strong style="color: orange">' . $row["available"] . '</strong>';
                                }
                                ?></td>
                            <td><a href="index.php?page=suasanpham&id=<?php echo $row['id'] ?>"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Sửa</a>&nbsp;|
                                <a href="#" onclick="confirm_xoa(<?php echo $row['id'] ?>)"><i class="fa fa-trash"></i>&nbsp;&nbsp;Xóa</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>

        </table>
    </div>
</div>
