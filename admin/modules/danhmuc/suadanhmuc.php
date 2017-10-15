<?php
if (isset($_REQUEST['id'])) {
    $id_danh_muc = $_REQUEST['id'];

    //lấy data cũ để điền vào ô text
    $data_cu = "SELECT ten_danh_muc FROM danh_muc WHERE id='{$id_danh_muc}' LIMIT 1";
    $data = mysqli_query($db->conn, $data_cu);
    foreach ($data as $c) {
        $ten_danh_muc_cu = $c['ten_danh_muc'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten_danh_muc = $_POST['txtDm'];
        $err_empty = false;
        $err_duplicate = false;
        //kiểm tra xem có record nào sử dụng tên đó chưa
        $check_ton_tai = "SELECT ten_danh_muc FROM danh_muc WHERE ten_danh_muc='{$ten_danh_muc}' AND id !='{$id_danh_muc}'";

        if ($ten_danh_muc != "") {
            if (!$db->num_rows($check_ton_tai)) {
                //xử lý sửa
                $sua_danh_muc = "UPDATE `danh_muc` SET `ten_danh_muc`='{$ten_danh_muc}' WHERE `id` = '{$id_danh_muc}'";
                $db->query($sua_danh_muc);
                echo "<script>alert('Sửa thành công');</script>";
                new Redirect("index.php?page=danhmuc");
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
            echo "<script>alert('Tên danh mục đã tồn tại');</script>";
        }
    }
}
?>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Sửa danh mục</div>

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
                    <input class="form-control" placeholder="Tên danh mục" name="txtDm" type="text" value="<?php echo $ten_danh_muc_cu; ?>">
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
