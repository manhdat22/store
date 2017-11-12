<?php

require_once './init.php';

if (isset($_REQUEST['username'])) {

    $id_user = $_REQUEST['username'];
    $kiem_tra = "SELECT * FROM `users` WHERE `username` ='$id_user'";
    $xoa = "DELETE FROM `users` WHERE `username` ='$id_user'";
   

    if ($db->num_rows($kiem_tra)) {
       
            $db->query($xoa);
            echo "<script>alert('Xóa thành công');</script>";

        new Redirect("index.php?page=thanhvien");
    } else {
        echo "<script>alert('Không có thành viên nào');</script>";
    }
} else {
    echo 'loi';
}
?>
