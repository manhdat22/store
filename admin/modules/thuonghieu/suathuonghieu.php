<?php
if (isset($_REQUEST['id'])) {
    $id_thuong_hieu = $_REQUEST['id'];

    //lấy data cũ để điền vào ô text
    $data_cu = "SELECT ten_thuong_hieu FROM thuong_hieu WHERE id='{$id_thuong_hieu}' LIMIT 1";
    $data = mysqli_query($db->conn, $data_cu);
    foreach ($data as $c) {
        $ten_thuong_hieu_cu = $c['ten_thuong_hieu'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten_thuong_hieu = $_POST['txtDm'];
        $err_empty = false;
        $err_duplicate = false;
        //kiểm tra xem có record nào sử dụng tên đó chưa
        $check_ton_tai = "SELECT ten_thuong_hieu FROM thuong_hieu WHERE ten_thuong_hieu='{$ten_thuong_hieu}' AND id !='{$id_thuong_hieu}'";

        if ($ten_thuong_hieu != "") {
            if (!$db->num_rows($check_ton_tai)) {
                //xử lý sửa
                $sua_thuong_hieu = "UPDATE `thuong_hieu` SET `ten_thuong_hieu`='{$ten_thuong_hieu}' WHERE `id` = '{$id_thuong_hieu}'";
                $db->query($sua_thuong_hieu);
                echo "<script>alert('Sửa thành công');</script>";
                new Redirect("index.php?page=thuonghieu");
                $db->close();
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
}
?>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Sửa thương hiệu</div>

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
                    <input class="form-control" placeholder="Tên thương hiệu" name="txtDm" type="text" value="<?php echo $ten_thuong_hieu_cu; ?>">
                    <small style="color: #ff0000">(*) bắt buộc</small>

                </div>
            </fieldset>
            <div>
                <input type="submit" value="Lưu" class="btn btn-primary">
                <a class="btn btn-danger" href="<?php echo $_DOMAINS; ?>">Hủy</a>              
            </div>
        </form>
    </div>
</div>
