
<?php
require_once './init.php';

if (isset($_REQUEST['id'])) {
    $id_sp = $_REQUEST['id'];
    $lay_du_lieu = "SELECT  `san_pham`.* , `danh_muc`.ten_danh_muc , `thuong_hieu`.ten_thuong_hieu,  `nha_phan_phoi`.ten_nha_phan_phoi FROM `san_pham`  JOIN danh_muc on san_pham.id_danh_muc=danh_muc.id JOIN thuong_hieu on san_pham.id_thuong_hieu=thuong_hieu.id JOIN nha_phan_phoi on san_pham.id_nha_phan_phoi=nha_phan_phoi.id where san_pham.id = '{$id_sp}'";
    $lay_anh = "SELECT url FROM `san_pham` JOIN hinhanh_sp on san_pham.id = hinhanh_sp.id_sp JOIN hinh_anh on hinhanh_sp.id_anh = hinh_anh.id where san_pham.id = '{$id_sp}'";
    $rs = mysqli_query($db->conn, $lay_du_lieu);
    $img = mysqli_query($db->conn, $lay_anh);
    $feature_img = mysqli_fetch_assoc($img);
    $datas = mysqli_fetch_assoc($rs);

$db->close();
    
} else {
    new Redirect('index?page=sanpham');
}
//truy vấn toàn bộ dữ liệu của bảng

?>


<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title"><?php echo $datas['ten_san_pham']; ?></div>
        <a class="btn btn-primary add-btn" href="index.php?page=sanpham&id=<?php echo $datas['id']; ?>" style="float: right;">
            <i class="fa fa-pencil"></i>
            Sửa sản phẩm 
        </a>    
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Mã sản phẩm</td>
                        <td><?php echo $datas['id']; ?></td>
                    </tr>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td><?php echo $datas['ten_san_pham']; ?></td>
                    </tr>
                    <tr>
                        
<!--                        //lấy nhiểu ảnh-->
                        <td>Ảnh sản phẩm</td>
                        <td><?php echo "<img src=" . $feature_img['url'] . " width='150px'/>" ?></td>
                    </tr>
                    <tr>
                        <td>Danh mục</td>
                        <td><?php echo $datas['ten_danh_muc']; ?></td>
                    </tr>
                    <tr>
                        <td>Thương hiệu</td>
                        <td><?php echo $datas['ten_thuong_hieu']; ?></td>
                    </tr>
                    <tr>
                        <td>Nhà phân phối</td>
                        <td><?php echo $datas['ten_nha_phan_phoi']; ?></td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td><?php
                            //trạng thái mặt hàng 0: ẩn , 1: bán, 2: sắp hết hàng, 3: hết hàng
                                if ($datas["status"] == 0) {
                                    echo "<strong style='color: grey'>Ẩn</strong>";
                                } elseif ($datas["status"] == 1) {
                                    echo "<strong style='color: green'>Đang bán</strong>";
                                } elseif ($datas["status"] == 2) {
                                    echo "<strong style='color: orange'>Sắp hết hàng</strong>";
                                } elseif ($datas["status"] == 3) {
                                    echo "<strong style='color: red'>Hết hàng</strong>";
                                }
                                ?></td>
                    </tr>
                    <tr>
                        <td>Tình trạng kho hàng</td>
                        <td><?php
                            //tình trạng kho hàng.
                                if ($datas["available"] == 0) {
                                    echo '<strong style="color: red">' . $datas["available"] . '</strong>';
                                } elseif ($datas["available"] > 10) {
                                    echo '<strong style="color: green">' . $datas["available"] . '</strong>';
                                } elseif ($datas["available"] < 10) {
                                    echo '<strong style="color: orange">' . $datas["available"] . '</strong>';
                                }
                                ?></td>
                    </tr>
                    <tr>
                        <td>Mô tả ngắn</td>
                        <td><?php echo $datas['mo_ta_ngan']; ?></td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td><?php echo $datas['mo_ta']; ?></td>
                    </tr>
                    
                    
                </tbody>
            </table>
            
              <a class="btn btn-primary add-btn" href="index.php?page=sanpham" style="float: right;">
            <i class="fa fa-arrow-circle-left"></i>
            Quay lại
        </a>    
        </div>
    </div>
</div>