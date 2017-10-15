<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $err_empty = false;
    $err_duplicate = false;
    $ten_san_pham = $_POST['txtTh'];
    if ($ten_san_pham != '') {
        $check_ton_tai = "SELECT ten_san_pham FROM san_pham WHERE ten_san_pham='{$ten_san_pham}'";
        if (!$db->num_rows($check_ton_tai)) {
            //xử lý thêm mới
            $them_moi_san_pham = "INSERT INTO san_pham(ten_san_pham) VALUES ('{$ten_san_pham}')";
            $db->query($them_moi_san_pham);
            if ($db->num_rows($check_ton_tai)) {
                echo "<script>alert('Thêm mới thành công');</script>";
                new Redirect("index.php?page=sanpham");
                $db->close();
            } else {
                echo "<script>alert('Có lỗi xảy ra');</script>";
            }
        } else {
            $err_duplicate = true;
        }
    } else {
        $err_empty = true;
    }
    if ($err_empty) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin yêu cầu');</script>";
    }
    if ($err_duplicate) {
        echo "<script>alert('Tên sản phẩm đã tồn tại');</script>";
    }
}
?>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Thêm sản phẩm</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <form action="" method="POST">
            <fieldset>
                <div class="form-group">
                    <label>Tên sản phẩm *</label>
                    <input class="form-control" placeholder="Tên sản phẩm" name="txtTh" type="text">
                </div>
                <div class="form-group">
                    <?php
                    $lay_danh_muc = "SELECT * FROM `danh_muc`";
                    $rs = mysqli_query($db->conn, $lay_danh_muc);
                    ?>
                    <label>Danh mục sản phẩm *</label>
                    <select class="form-control">
                        <option value="-1" selected>-- Danh mục --</option>
                        <?php
                        foreach ($rs as $dm) {
                            echo "<option value=" . $dm['id'] . ">" . $dm['ten_danh_muc'] . "</option>";
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
                    <select class="form-control">
                        <option value="-1" selected>-- Thương hiệu --</option>
                        <?php
                        foreach ($rs as $dm) {
                            echo "<option value=" . $dm['id'] . ">" . $dm['ten_thuong_hieu'] . "</option>";
                        }
                        ?>

                    </select>                 
                </div>
                <div class="form-group">
                    <?php
                    $lay_nha_phan_phoi = "SELECT * FROM `nha_phan_phoi`";
                    $rs = mysqli_query($db->conn, $lay_nha_phan_phoi);
                    ?>
                    <label>Danh mục sản phẩm *</label>
                    <select class="form-control">
                        <option value="-1" selected>-- Nhà phân phối --</option>
                        <?php
                        foreach ($rs as $dm) {
                            echo "<option value=" . $dm['id'] . ">" . $dm['ten_nha_phan_phoi'] . "</option>";
                        }
                        ?>

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
