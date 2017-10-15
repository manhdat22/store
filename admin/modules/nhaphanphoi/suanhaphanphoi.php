<?php
if (isset($_REQUEST['id'])) {
    $id_nha_phan_phoi = $_REQUEST['id'];

    //lấy data cũ để điền vào ô text
    $data_cu = "SELECT ten_nha_phan_phoi FROM nha_phan_phoi WHERE id='{$id_nha_phan_phoi}' LIMIT 1";
    $data = mysqli_query($db->conn, $data_cu);
    foreach ($data as $c) {
        $ten_nha_phan_phoi_cu = $c['ten_nha_phan_phoi'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ten_nha_phan_phoi = $_POST['txt'];
        $err_empty = false;
        $err_duplicate = false;
        //kiểm tra xem có record nào sử dụng tên đó chưa
        $check_ton_tai = "SELECT ten_nha_phan_phoi FROM nha_phan_phoi WHERE ten_nha_phan_phoi='{$ten_nha_phan_phoi}' AND id !='{$id_nha_phan_phoi}'";

        if ($ten_nha_phan_phoi != "") {
            if (!$db->num_rows($check_ton_tai)) {
                //xử lý sửa
                $sua_nha_phan_phoi = "UPDATE `nha_phan_phoi` SET `ten_nha_phan_phoi`='{$ten_nha_phan_phoi}' WHERE `id` = '{$id_nha_phan_phoi}'";
                $db->query($sua_nha_phan_phoi);
                echo "<script>alert('Sửa thành công');</script>";
                new Redirect("index.php?page=nhaphanphoi");
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
            echo "<script>alert('Tên nhà phân phối đã tồn tại');</script>";
        }
    }
}
?>

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Sửa nhà phân phối</div>

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
                    <input class="form-control" placeholder="Tên nhà phân phối" name="txt" type="text" value="<?php echo $ten_nha_phan_phoi_cu; ?>">
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
