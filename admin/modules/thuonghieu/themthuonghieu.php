<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $err_empty = false;
    $err_duplicate = false;
    $ten_thuong_hieu = $_POST['txtTh'];
    if ($ten_thuong_hieu != '') {
        $check_ton_tai = "SELECT ten_thuong_hieu FROM thuong_hieu WHERE ten_thuong_hieu='{$ten_thuong_hieu}'";
        if (!$db -> num_rows($check_ton_tai)) {
            //xử lý thêm mới
            $them_moi_thuong_hieu = "INSERT INTO thuong_hieu(ten_thuong_hieu) VALUES ('{$ten_thuong_hieu}')";
            $db->query($them_moi_thuong_hieu);
            if ($db -> num_rows($check_ton_tai)) {
                echo "<script>alert('Thêm mới thành công');</script>";
                new Redirect("index.php?page=thuonghieu");
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
        echo "<script>alert('Tên thương hiệu đã tồn tại');</script>";
    }
}
?>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Thêm thương hiệu</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <form action="" method="POST">
            <fieldset>
                <div class="form-group">
                    <label>Tên thương hiệu *</label>
                    <input class="form-control" placeholder="Tên thương hiệu" name="txtTh" type="text">
                    <small style="color: #ff0000">(*) bắt buộc</small>

                </div>
            </fieldset>
            <div>
                <input type="submit" value="Lưu" class="btn btn-primary">
                <a class="btn btn-danger" href="index.php?page=thuonghieu">Hủy</a>              
            </div>
        </form>
    </div>
</div>
