<?php
if (isset($_REQUEST['id'])) {
    $id_san_pham = $_REQUEST['id'];
    $data_cu = "SELECT * FROM san_pham WHERE id='{$id_san_pham}' LIMIT 1";
    $data = mysqli_query($db->conn, $data_cu);
    foreach ($data as $c) {
        //data cũ
        $tenSpCu = $c['ten_san_pham'];
        $danhMucCu = $c['id_danh_muc'];
        $thuongHieuCu = $c['id_thuong_hieu'];
        $nppCu = $c['id_nha_phan_phoi'];
        $unitPriceCu = $c['don_gia'];
        $uploadCu = $c['hinh_anh'];
        $trangThaiCu = $c['status'];
        $khoCu = $c['available'];
        $moTaCu = $c['mo_ta'];
        $moTaNganCu = $c['mo_ta_ngan'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $err = array();
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
        if (empty($err)) {

            $kiem_tra_ton_tai = "SELECT ten_san_pham FROM san_pham WHERE  = '{$tenSp}'";
//            $c = mysqli_query($db->conn, $kiem_tra_ton_tai);
//            $count = mysqli_num_rows($c);
//
//            if ($count != 1) {
//              
            if ($_FILES['upload']['name'] == NULL) {
                $update_du_lieu = "UPDATE `san_pham` SET `ten_san_pham`='$tenSp',`mo_ta_ngan`='$moTaNgan',`mo_ta`='$moTa',`don_gia`=$unitPrice,`id_danh_muc`=$danhMuc,`id_thuong_hieu`=$thuongHieu,`id_nha_phan_phoi`=$npp,`status`=$trangThai,`available`=$kho WHERE id = $id_san_pham";
            } else {
                $update_du_lieu = "UPDATE `san_pham` SET `ten_san_pham`='$tenSp',`mo_ta_ngan`='$moTaNgan',`mo_ta`='$moTa',`hinh_anh`='$upload',`don_gia`=$unitPrice,`id_danh_muc`=$danhMuc,`id_thuong_hieu`=$thuongHieu,`id_nha_phan_phoi`=$npp,`status`=$trangThai,`available`=$kho WHERE id = $id_san_pham";
            }
            
            
            $q = mysqli_query($db->conn, $update_du_lieu);
            move_uploaded_file($_FILES['upload']['tmp_name'], "../images/$upload");
            echo "<script>alert('Cập nhật sản phẩm thành công');</script>";?>
            
            <?php new Redirect("index.php?page=sanpham");
            $db->close();
//           } else {                $err[] = 'tenSp_dub';
//            }
        }
    }
} else {
    new Redirect("index.php?sanpham");
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
                    <input class="form-control" placeholder="Tên sản phẩm" value="<?php echo $tenSpCu; ?>" name="txtName" type="text">
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
                            if ($r['id'] == $danhMucCu) {
                                echo "<option selected value=" . $r['id'] . ">" . $r['ten_danh_muc'] . "</option>";
                            } else {
                                echo "<option value=" . $r['id'] . ">" . $r['ten_danh_muc'] . "</option>";
                            }
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
                            if ($r['id'] == $thuongHieuCu) {
                                echo "<option selected value=" . $r['id'] . ">" . $r['ten_thuong_hieu'] . "</option>";
                            } else {
                                echo "<option value=" . $r['id'] . ">" . $r['ten_thuong_hieu'] . "</option>";
                            }
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
                        <option value="-1">-- Nhà phân phối --</option>
                        <?php
                        foreach ($rs as $r) {
                            if ($r['id'] == $nppCu) {
                                echo "<option selected value=" . $r['id'] . ">" . $r['ten_nha_phan_phoi'] . "</option>";
                            } else {
                                echo "<option value=" . $r['id'] . ">" . $r['ten_nha_phan_phoi'] . "</option>";
                            }
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
                    <input class="form-control" placeholder="Đơn giá" value="<?php echo $unitPriceCu; ?>" name="unitPrice" type="number">
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
                    <br>
                    <img style="border: 1px solid #eee" src="<?php echo "http://localhost/store/images/" . $uploadCu; ?>" width="200px"/>
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
                    <textarea  id="tinymce_basic" name="moTaNgan"><?php echo $moTaNganCu; ?> </textarea>
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
                    <textarea id="tinymce_full" name="moTa"><?php echo $moTaCu; ?> </textarea>
                </div>
                <div class="form-group">
                    <label>Số lượng trong kho * </label>
                    <?php
                    if (isset($err) && in_array('kho', $err))
                        echo ' <small style="color: #ff0000">Vui lòng nhập số lượng của sản phẩm!</small>';
                    ?>
                    <input class="form-control" value="<?php echo $khoCu; ?>" placeholder="Số lượng trong kho" name="txtQuan" type="number">
                </div>
                <div class="form-group">
                    <label>Trạng thái *</label>
                    <?php
                    if (isset($err) && in_array('trangThai', $err))
                        echo ' <small style="color: #ff0000">Vui lòng chọn trạng thái của sản phẩm!</small>';
                    ?>
                    <select name="trangThai" class="form-control">
                        <?php
                        $check1 = $check2 = $check0 = "";
                        if ($trangThaiCu == 1) {
                            $check1 = "selected";
                        } elseif ($trangThaiCu == 2) {
                            $check2 = "selected";
                        } elseif ($trangThaiCu == 0) {
                            $check0 = "selected";
                        }
                        echo $trangThaiCu;
                        ?>
                        <option value="-1"> -- Trạng thái --</option>
                        <option value="1" <?php echo $check1 ?>>Hiện</option>
                        <option value="0" <?php echo $check0 ?>>Ẩn</option>
                        <option value="2" <?php echo $check2 ?>>Hết hàng</option>
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
