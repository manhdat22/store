<?php
if (isset($_REQUEST['username'])) {
    $un = $_REQUEST['username'];
    $kiem_tra = "SELECT * FROM users WHERE username = '{$un}'";
    $ch = mysqli_query($db->conn, $kiem_tra);
    $u = mysqli_fetch_assoc($ch);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $err = array();
        $uname = $_POST['username'];
        $pass = $_POST['txtPass'];
        $cfmpass = $_POST['txtCfmPass'];
        $name = $_POST['txtName'];
        $gender = $_POST['txtGen'];
        $phone = $_POST['txtPhone'];
        $mail = $_POST['txtMail'];
        $address = $_POST['txtAdd'];
        $per = $_POST['slPer'];
        $stt = $_POST['slStt'];

        if (empty($uname) ||
                empty($name) ||
                empty($mail) ||
                empty($phone) ||
                $per == -1 ||
                $stt == -1) {
            echo "<script>alert('Vui lòng điền đầy đủ thông tin');</script>";
        } else {
            $kiem_tra_ton_tai = "SELECT username FROM users WHERE username = '{$uname}'";
            $c = mysqli_query($db->conn, $kiem_tra_ton_tai);
            $u = mysqli_fetch_assoc($c);
            $count = mysqli_num_rows($c);


            if ($pass != $cfmpass) {
                echo "<script>alert('Mật khẩu không trùng nhau');</script>";
            } else {
                //xử lý thêm thành viên
                $finalPass = md5($pass);
                $insert_du_lieu = "UPDATE `users` SET `username`='$uname',`password`='$finalPass',`ho_ten`='$name',`sdt`='$phone',`dia_chi`='$address',`email`='$mail',`gioi_tinh`=$gender,`trang_thai`=$stt,`quyen`=$per WHERE username='$un'";

                $q = mysqli_query($db->conn, $insert_du_lieu);
                if ($q) {
                    echo "<script>alert('Cập nhật thành viên thành công');</script>";
                    new Redirect("index.php?page=thanhvien");
                } else {
                    echo "<script>alert('Có lỗi xảy ra');</script>";
                }
            }
        }
    }
}
?>
<div class="content-box-large">
    <div class="panel-heading"> 
        <div class="panel-title">Thêm thành viên</div>

        <div class="panel-options">
            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <form action="" method="POST">
            <fieldset>
                <div class="form-group">
                    <label>Tên đăng nhập *</label>
                    <input class="form-control" placeholder="Tên đăng nhập" name="username" value="<?php echo $u['username']; ?>" type="text">


                </div>
                <div class="form-group">
                    <label>Mật khẩu *</label>
                    <input class="form-control" placeholder="Mật khẩu" name="txtPass" type="password" >

                </div>
                <div class="form-group">
                    <label>Xác nhận mật khẩu *</label>
                    <input class="form-control" placeholder="Xác nhận mật khẩu" name="txtCfmPass" type="password">

                </div>
                <div class="form-group">
                    <label>Họ tên *</label>
                    <input class="form-control" placeholder="Họ tên" name="txtName" type="text" value="<?php echo $u['ho_ten']; ?>">

                </div>
                <div class="form-group">
                    <label>Giới tính *</label>
                    <br>
<?php
$checked1 = $checked0 = "";
if ($u['gioi_tinh'] == 0) {
    $checked0 = "checked";
} elseif ($u['gioi_tinh'] == 1) {
    $checked1 = "checked";
}
?>
                    <input value="0" name="txtGen" <?php echo $checked1 ?> id="nam" type="radio">&nbsp;&nbsp;<label for="nam">Nam &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input value="1" name="txtGen" id="nu" <?php echo $checked0 ?> type="radio">&nbsp;&nbsp;<label for="nu">Nữ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
                <div class="form-group">
                    <label>Số điện thoại *</label>
                    <input class="form-control" placeholder="Số điện thoại" name="txtPhone" type="text"  value="<?php echo $u['sdt']; ?>">

                </div>
                <div class="form-group">
                    <label>Email *</label>
                    <input class="form-control" placeholder="Địa chỉ Email" name="txtMail" type="text" value="<?php echo $u['email']; ?>">

                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <textarea class="form-control"  placeholder="Địa chỉ" name="txtAdd"><?php echo $u['dia_chi']; ?></textarea>

                </div>

                <div class="form-group">
                    <label>Quyền *</label>
                    <select class="form-control"  name="slPer">

<?php
$check1 = $check2 = $check0 = "";
if ($u['quyen'] == 0) {
    $check0 = "selected";
} elseif ($u['quyen'] == 1) {
    $check1 = "selected";
}
?>
                        <option value="-1" selected>-- Chọn quyền --</option>
                        <option value="0" <?php echo $check0 ?>>Người quản trị (Admin)</option>
                        <option value="1" <?php echo $check1 ?>>Người dùng</option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Trạng thái *</label>
                    <select  class="form-control" name="slStt">
                        <option value="-1" selected>-- Chọn trạng thái --</option>
<?php
$chek1 = $chek2 = $chek0 = "";
if ($u['trang_thai'] == 1) {
    $chek0 = "selected";
} elseif ($u['trang_thai'] == 0) {
    $chek1 = "selected";
}
?>
                        <option value="1" <?php echo $chek0 ?>>Đang hoạt động</option>
                        <option value="0" <?php echo $chek1 ?>>Tạm dừng hoạt động</option>
                    </select>
                </div>
                <small style="color: #ff0000">(*) bắt buộc</small>
            </fieldset>
            <div>
                <input type="submit" value="Lưu" class="btn btn-primary">
                <a class="btn btn-danger" href="index.php?page=thanhvien">Hủy</a>              
            </div>
        </form>
    </div>
</div>
