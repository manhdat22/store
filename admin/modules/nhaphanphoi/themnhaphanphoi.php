<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $err_empty = false;
    $err_duplicate = false;
    $ten_nha_phan_phoi = $_POST['txt'];
    if ($ten_nha_phan_phoi != '') {
        $check_ton_tai = "SELECT ten_nha_phan_phoi FROM nha_phan_phoi WHERE ten_nha_phan_phoi='{$ten_nha_phan_phoi}'";
        if (!$db -> num_rows($check_ton_tai)) {
            //xử lý thêm mới
            $them_moi_nha_phan_phoi = "INSERT INTO nha_phan_phoi(ten_nha_phan_phoi) VALUES ('{$ten_nha_phan_phoi}')";
            $db->query($them_moi_nha_phan_phoi);
            if ($db -> num_rows($check_ton_tai)) {
                echo "<script>alert('Thêm mới thành công');</script>";
                new Redirect("index.php?page=nhaphanphoi");
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
        echo "<script>alert('Tên nhà phân phối đã tồn tại');</script>";
    }
}
?>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Thêm nhà phân phối</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <form action="" method="POST">
            <fieldset>
                <div class="form-group">
                    <label>Tên nhà phân phối *</label>
                    <input class="form-control" placeholder="Tên nhà phân phối" name="txt" type="text">
                    <small style="color: #ff0000">(*) bắt buộc</small>

                </div>
            </fieldset>
            <div>
                <input type="submit" value="Lưu" class="btn btn-primary">
                <a class="btn btn-danger" href="index.php?page=nhaphanphoi">Hủy</a>              
            </div>
        </form>
    </div>
</div>
