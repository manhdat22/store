<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $err = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
                empty($pass) ||
                
                empty($name) ||
                empty($mail) ||
                empty($phone) ||
                $per == -1 ||
                $stt == -1) {
            echo "<script>alert('Vui lòng điền đầy đủ thông tin');</script>";
        } else {
            $kiem_tra_ton_tai = "SELECT username FROM users WHERE username = '{$uname}'";
            $c = mysqli_query($db->conn, $kiem_tra_ton_tai);
            $count = mysqli_num_rows($c);

            if ($count != 1) {
                if ($pass != $cfmpass) {
                    echo "<script>alert('Mật khẩu không trùng nhau');</script>";
                } else {
                    //xử lý thêm thành viên
                    $finalPass = md5($pass);
                    $insert_du_lieu = "INSERT INTO `users`(`username`, `password`, `ho_ten`, `sdt`, `dia_chi`, `email`, `gioi_tinh`, `trang_thai`, `quyen`, `ngay_dang_ki`) VALUES"
                            . " ('$uname','$finalPass','$name','sdt','$address','$mail',$gender, $stt, $per, '$today')";
                    
                    
                    $q = mysqli_query($db->conn, $insert_du_lieu);
                    if ($q) {
                         echo "<script>alert('Thêm thành viên thành công');</script>";
                    new Redirect("index.php?page=thanhvien");
                    } else {
                        echo "<script>alert('Có lỗi xảy ra');</script>";
                        
                    }
                   
                }
            } else {
                echo "<script>alert('Tài khoản đã tồn tại');</script>";
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
                    <input class="form-control" placeholder="Tên đăng nhập" name="username" type="text">


                </div>
                <div class="form-group">
                    <label>Mật khẩu *</label>
                    <input class="form-control" placeholder="Mật khẩu" name="txtPass" type="password">

                </div>
                <div class="form-group">
                    <label>Xác nhận mật khẩu *</label>
                    <input class="form-control" placeholder="Xác nhận mật khẩu" name="txtCfmPass" type="password">

                </div>
                <div class="form-group">
                    <label>Họ tên *</label>
                    <input class="form-control" placeholder="Họ tên" name="txtName" type="text">

                </div>
                <div class="form-group">
                    <label>Giới tính *</label>
                    <br>
                    <input value="0" name="txtGen" checked id="nam" type="radio">&nbsp;&nbsp;<label for="nam">Nam &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input value="1" name="txtGen" id="nu" type="radio">&nbsp;&nbsp;<label for="nu">Nữ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                </div>
                <div class="form-group">
                    <label>Số điện thoại *</label>
                    <input class="form-control" placeholder="Số điện thoại" name="txtPhone" type="text">

                </div>
                <div class="form-group">
                    <label>Email *</label>
                    <input class="form-control" placeholder="Địa chỉ Email" name="txtMail" type="text">

                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <textarea class="form-control"  placeholder="Địa chỉ" name="txtAdd"></textarea>

                </div>

                <div class="form-group">
                    <label>Quyền *</label>
                    <select class="form-control"  name="slPer">
                        <option value="-1" selected>-- Chọn quyền --</option>
                        <option value="0">Người quản trị (Admin)</option>
                        <option value="1">Người dùng</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Trạng thái *</label>
                    <select  class="form-control" name="slStt">
                        <option value="-1" selected>-- Chọn trạng thái --</option>
                        <option value="1">Đang hoạt động</option>
                        <option value="0">Tạm dừng hoạt động</option>
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
