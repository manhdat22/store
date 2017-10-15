<?php
$err = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tensp = $_POST['txtName'];
    $tensp = $_POST['txtName'];
    $tensp = $_POST['txtName'];
    $tensp = $_POST['txtName'];
    $tensp = $_POST['txtName'];
}   
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="vendors/tinymce/js/tinymce/tinymce.min.js"></script>

<script src="js/custom.js"></script>
<script src="js/editors.js"></script>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Thêm sản phẩm</div>
        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <?php
                        
                    ?>
                    <label>Tên sản phẩm *</label>
                    <input class="form-control" placeholder="Tên sản phẩm" name="txtName" type="text">
                </div>

                <div class="form-group">
                    <?php
                    $lay_danh_muc = "SELECT * FROM `danh_muc`";
                    $rs = mysqli_query($db->conn, $lay_danh_muc);
                    ?>
                    <label>Danh mục sản phẩm *</label>
                    <select name="danhMuc" class="form-control">
                        <option value="-1" selected>-- Danh mục --</option>
                        <?php
                        foreach ($rs as $r) {
                            echo "<option value=" . $r['id'] . ">" . $r['ten_danh_muc'] . "</option>";
                        }
                        ?>

                    </select>                 
                </div>

                <div class="form-group">
                    <?php
                    $lay_thuong_hieu = "SELECT * FROM `thuong_hieu`";
                    $rs = mysqli_query($db->conn, $lay_thuong_hieu);
                    ?>
                    <label>Thương hiệu sản phẩm *</label>
                    <select name="thuongHieu" class="form-control">
                        <option value="-1" selected>-- Thương hiệu --</option>
                        <?php
                        foreach ($rs as $r) {
                            echo "<option value=" . $r['id'] . ">" . $r['ten_thuong_hieu'] . "</option>";
                        }
                        ?>

                    </select>                 
                </div>

                <div class="form-group">
                    <?php
                    $lay_nha_phan_phoi = "SELECT * FROM `nha_phan_phoi`";
                    $rs = mysqli_query($db->conn, $lay_nha_phan_phoi);
                    ?>
                    <label>Nhà phân phối sản phẩm *</label>
                    <select name="npp" class="form-control">
                        <option value="-1" selected>-- Nhà phân phối --</option>
                        <?php
                        foreach ($rs as $r) {
                            echo "<option value=" . $r['id'] . ">" . $r['ten_nha_phan_phoi'] . "</option>";
                        }
                        ?>
                    </select>                 
                </div>

                <div class="form-group">
                    <label>Giá (VNĐ) * </label>
                    <input class="form-control" placeholder="Đơn giá" name="unitPrice" type="number">
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm</label>
                    <input class="form-control" placeholder="Ảnh" accept=".PNG,.JPG,.JPEG" name="upload" type="file">
                </div>

                <div class="form-group">
                    <label>Mô tả ngắn sản phẩm</label>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="form-group">
                    <textarea id="tinymce_basic" name="moTaNgan"></textarea>
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>

                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="form-group">
                    <textarea id="tinymce_full" name="moTa"></textarea>
                </div>
                <div class="form-group">
                    <label>Số lượng trong kho * </label>
                    <input class="form-control" placeholder="Số lượng trong kho" name="txtQuan" type="number">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control">
                        <option value="-1" selected>-- Trạng thái --</option>
                        <option value="1">Hiện</option>
                        <option value="0">Ẩn</option>
                        <option value="2">Hết hàng</option>
                    </select> 
                </div>
                <small style="color: #ff0000">(*) bắt buộc</small>

            </fieldset>
            <br> 
            <div>
                <input type="submit" value="Lưu" class="btn btn-primary">
                <a class="btn btn-danger" href="index.php?page=sanpham">Hủy</a>              
            </div>
        </form>
    </div>
</div>
