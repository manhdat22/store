<?php

require_once './init.php';

if (isset($_REQUEST['id'])) {

    $id_nha_phan_phoi = $_REQUEST['id'];
    $kiem_tra_nha_phan_phoi = "SELECT * FROM `nha_phan_phoi` WHERE `id` ='$id_nha_phan_phoi'";
    $xoa_nha_phan_phoi = "DELETE FROM `nha_phan_phoi` WHERE `id` = '$id_nha_phan_phoi'";
    $kiem_tra_sp_trong_nha_phan_phoi = "SELECT * FROM `san_pham` WHERE `id_nha_phan_phoi` ='$id_nha_phan_phoi'";
    $move_sp_sang_nha_phan_phoi_khac = "UPDATE `san_pham` SET `id_nha_phan_phoi`= 1 WHERE `id_nha_phan_phoi` = '$id_nha_phan_phoi'";

    //nếu trong nhà phân phối có sản phẩm thì chuyển sản phẩm sang nhà phân phối "chưa được phân loại"
    if ($db->num_rows($kiem_tra_nha_phan_phoi)) {
        if ($db->num_rows($kiem_tra_sp_trong_nha_phan_phoi)) {
            $db->query($move_sp_sang_nha_phan_phoi_khac);
            $db->query($xoa_nha_phan_phoi);
            echo "<script>alert('Xóa thành công');</script>";
        } else {
            $db->query($xoa_nha_phan_phoi);
            echo "<script>alert('Xóa thành công');</script>";
        }

        new Redirect("index.php?page=nhaphanphoi");
    } else {
        echo "<script>alert('Không có nhà phân phối nào');</script>";
    }
} else {
    echo 'loi';
}
?>
