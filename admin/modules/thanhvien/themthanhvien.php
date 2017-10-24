<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $err_empty = false;
    $err_duplicate = false;
    $ten_danh_muc = $_POST['txtDm'];
    if ($ten_danh_muc != '') {
        $check_ton_tai = "SELECT ten_danh_muc FROM danh_muc WHERE ten_danh_muc='{$ten_danh_muc}'";
        if (!$db -> num_rows($check_ton_tai)) {
            //xử lý thêm mới
            $them_moi_danh_muc = "INSERT INTO danh_muc(ten_danh_muc) VALUES ('{$ten_danh_muc}')";
            $db->query($them_moi_danh_muc);
            if ($db -> num_rows($check_ton_tai)) {
                echo "<script>alert('Thêm mới thành công');</script>";
                new Redirect("index.php?page=danhmuc");
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
        echo "<script>alert('Tên danh mục đã tồn tại');</script>";
    }
}
?>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Thêm danh mục</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <form action="" method="POST">
            <fieldset>
                <div class="form-group">
                    <label>Tên danh mục *</label>
                    <input class="form-control" placeholder="Tên danh mục" name="txtDm" type="text">
                    <small style="color: #ff0000">(*) bắt buộc</small>

                </div>
            </fieldset>
            <div>
                <input type="submit" value="Lưu" class="btn btn-primary">
                <a class="btn btn-danger" href="index.php?page=danhmuc">Hủy</a>              
            </div>
        </form>
    </div>
</div>
