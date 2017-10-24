<?php

require_once './init.php';

if (isset($_REQUEST['id'])) {

    $id_danh_muc = $_REQUEST['id'];
    $kiem_tra_danh_muc = "SELECT * FROM `danh_muc` WHERE `id` ='$id_danh_muc'";
    $xoa_danh_muc = "DELETE FROM `danh_muc` WHERE `id` = '$id_danh_muc'";
    $kiem_tra_sp_trong_danh_muc = "SELECT * FROM `san_pham` WHERE `id_danh_muc` ='$id_danh_muc'";
    $move_sp_sang_danh_muc_khac = "UPDATE `san_pham` SET `id_danh_muc`= 1 WHERE `id_danh_muc` = '$id_danh_muc'";

    //nếu trong danh mục có sản phẩm thì chuyển sản phẩm sang danh mục "chưa được phân loại"
    if ($db->num_rows($kiem_tra_danh_muc)) {
        if ($db->num_rows($kiem_tra_sp_trong_danh_muc)) {
            $db->query($move_sp_sang_danh_muc_khac);
            $db->query($xoa_danh_muc);
            echo "<script>alert('Xóa thành công');</script>";
        } else {
            $db->query($xoa_danh_muc);
            echo "<script>alert('Xóa thành công');</script>";
        }

        new Redirect("index.php?page=danhmuc");
    } else {
        echo "<script>alert('Không có danh mục nào');</script>";
    }
} else {
    echo 'loi';
}
?>
