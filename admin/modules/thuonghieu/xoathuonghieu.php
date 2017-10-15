<?php

require_once './init.php';

if (isset($_REQUEST['id'])) {

    $id_thuong_hieu = $_REQUEST['id'];
    $kiem_tra_thuong_hieu = "SELECT * FROM `thuong_hieu` WHERE `id` ='$id_thuong_hieu'";
    $xoa_thuong_hieu = "DELETE FROM `thuong_hieu` WHERE `id` = '$id_thuong_hieu'";
    $kiem_tra_sp_trong_thuong_hieu = "SELECT * FROM `san_pham` WHERE `id_thuong_hieu` ='$id_thuong_hieu'";
    $move_sp_sang_thuong_hieu_khac = "UPDATE `san_pham` SET `id_thuong_hieu`= 1 WHERE `id_thuong_hieu` = '$id_thuong_hieu'";

    //nếu trong thương hiệu có sản phẩm thì chuyển sản phẩm sang thương hiệu "chưa được phân loại"
    if ($db->num_rows($kiem_tra_thuong_hieu)) {
        if ($db->num_rows($kiem_tra_sp_trong_thuong_hieu)) {
            $db->query($move_sp_sang_thuong_hieu_khac);
            $db->query($xoa_thuong_hieu);
            echo "<script>alert('Xóa thành công');</script>";
        } else {
            $db->query($xoa_thuong_hieu);
            echo "<script>alert('Xóa thành công');</script>";
        }

        new Redirect("index.php?page=thuonghieu");
    } else {
        echo "<script>alert('Không có thương hiệu nào');</script>";
    }
} else {
    echo 'loi';
}
?>
