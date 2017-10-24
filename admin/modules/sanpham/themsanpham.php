<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $err = array();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tenSp = $_POST['txtName'];
        $danhMuc = $_POST['danhMuc'];
        $thuongHieu = $_POST['thuongHieu'];
        $npp = $_POST['npp'];
        $unitPrice = $_POST['unitPrice'];
        $upload = $_FILES['upload']['name'];
        $trangThai = $_POST['trangThai'];
        $kho = $_POST['txtQuan'];
        $moTa = $_POST['moTa'];
        $moTaNgan = $_POST['moTaNgan'];
        $imgType = $_FILES['upload']['type'];
        
        if ($trangThai == -1) {
            $err[] = 'trangThai';
        }
        if (empty($tenSp)) {
            $err[] = 'tenSp';
        }
        if ($danhMuc == -1) {
            $err[] = 'danhMuc';
        }
        if ($thuongHieu == -1) {
            $err[] = 'thuongHieu';
        }
        if (empty($unitPrice)) {
            $err[] = 'unitPrice';
        }
        if ($npp == -1) {
            $err[] = 'npp';
        }
        if (empty($moTa)) {
            $err[] = 'moTa';
        }
        if (empty($moTaNgan)) {
            $err[] = 'moTaNgan';
        }
        if (empty($kho)) {
            $err[] = 'kho';
        }
        if (empty($upload)) {
            $err[] = 'upload_missing';
        }
        if ($imgType != "image/png" && $imgType != "image/jpg" && $imgType != "image/jpeg") {
            $err[] = 'upload_wrong_type';
        }
//                $insert_du_lieu = "INSERT INTO `san_pham`(`ten_san_pham`, `mo_ta_ngan`, `mo_ta`, `hinh_anh`, `don_gia`, `id_danh_muc`, `id_thuong_hieu`, `id_nha_phan_phoi`, `status`, `available`) VALUES ('$tenSp','$moTaNgan','$moTa','$upload',$unitPrice,$danhMuc,$thuongHieu,$npp,$trangThai,$kho)";
//                $q = mysqli_query($db->conn, $insert_du_lieu);
        if (empty($err)) {
            
            $kiem_tra_ton_tai = "SELECT ten_san_pham FROM san_pham WHERE ten_san_pham = '{$tenSp}'";
            $c = mysqli_query($db->conn, $kiem_tra_ton_tai);
            $count = mysqli_num_rows($c);
            
            if ($count != 1) {
                $insert_du_lieu = "INSERT INTO `san_pham`(`ten_san_pham`, `mo_ta_ngan`, `mo_ta`, `hinh_anh`, `don_gia`, `id_danh_muc`, `id_thuong_hieu`, `id_nha_phan_phoi`, `status`, `available`) VALUES ('$tenSp','$moTaNgan','$moTa','$upload',$unitPrice,$danhMuc,$thuongHieu,$npp,$trangThai,$kho)";
                $q = mysqli_query($db->conn, $insert_du_lieu);
                    move_uploaded_file($_FILES['upload']['tmp_name'], "../images/$upload");
                    echo "<script>alert('Thêm sản phẩm thành công');</script>";
                    new Redirect("index.php?page=sanpham");
                    $db->close();
            } else {
                $err[] = 'tenSp_dub';
                
            }
        }
    }
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
                    <label>Tên sản phẩm *</label>
                    <?php
                    if (isset($err) && in_array('tenSp', $err)) {
                        echo ' <small style="color: #ff0000">Vui lòng nhập tên sản phẩm!</small>';
                    } else if (isset($err) && in_array('tenSp_dub', $err)) {
                        echo ' <small style="color: #ff0000">Tên sản phẩm đã tồn tại!</small>';
                    }
                    ?>
                    <input class="form-control" placeholder="Tên sản phẩm" name="txtName" type="text">
                </div>

                <div class="form-group">
                    <?php
                    $lay_danh_muc = "SELECT * FROM `danh_muc`";
                    $rs = mysqli_query($db->conn, $lay_danh_muc);
                    ?>
                    <label>Danh mục sản phẩm *</label>
                    <?php
                    if (isset($err) && in_array('danhMuc', $err))
                        echo ' <small style="color: #ff0000">Vui lòng chọn danh mục sản phẩm!</small>';
                    ?>
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
                    <?php
                    if (isset($err) && in_array('thuongHieu', $err))
                        echo ' <small style="color: #ff0000">Vui lòng chọn thương hiệu sản phẩm!</small>';
                    ?>
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
                    <?php
                    if (isset($err) && in_array('npp', $err))
                        echo ' <small style="color: #ff0000">Vui lòng chọn nhà phân phối sản phẩm!</small>';
                    ?>
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
                    <?php
                    if (isset($err) && in_array('unitPrice', $err))
                        echo ' <small style="color: #ff0000">Vui lòng điền giá sản phẩm!</small>';
                    ?>
                    <input class="form-control" placeholder="Đơn giá" name="unitPrice" type="number">
                </div>

                <div class="form-group">
                    <label>Ảnh sản phẩm *</label>
                    <?php
                    if (isset($err) && in_array('upload_missing', $err))
                        echo ' <small style="color: #ff0000">Vui lòng đăng ảnh sản phẩm!</small>';
                    else if (isset($err) && in_array('upload_wrong_type', $err))
                        echo " <small style='color: #ff0000'>Vui lòng đăng đúng định dạng ảnh! " . $imgType . "</small>";
                    ?>
                    <input class="form-control" placeholder="Ảnh" accept=".PNG,.JPG,.JPEG" name="upload" type="file">
                </div>

                <div class="form-group">
                    <label>Mô tả ngắn sản phẩm *</label>
                    <?php
                    if (isset($err) && in_array('moTaNgan', $err))
                        echo ' <small style="color: #ff0000">Vui lòng nhập mô tả ngắn của sản phẩm!</small>';
                    ?>
                    <div class="panel-options">
                        <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                        <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                    </div>
                </div>
                <div class="form-group">
                    <textarea id="tinymce_basic" name="moTaNgan"></textarea>
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm *</label>
                    <?php
                    if (isset($err) && in_array('moTa', $err))
                        echo ' <small style="color: #ff0000">Vui lòng nhập mô tả của sản phẩm!</small>';
                    ?>
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
                    <?php
                    if (isset($err) && in_array('kho', $err))
                        echo ' <small style="color: #ff0000">Vui lòng nhập số lượng của sản phẩm!</small>';
                    ?>
                    <input class="form-control" placeholder="Số lượng trong kho" name="txtQuan" type="number">
                </div>
                <div class="form-group">
                    <label>Trạng thái *</label>
                    <?php
                    if (isset($err) && in_array('trangThai', $err))
                        echo ' <small style="color: #ff0000">Vui lòng chọn trạng thái của sản phẩm!</small>';
                    ?>
                    <select name="trangThai" class="form-control">
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
