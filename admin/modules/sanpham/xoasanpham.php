<?php

require_once './init.php';

if (isset($_REQUEST['id'])) {

    $id_san_pham = $_REQUEST['id'];
    $kiem_tra_san_pham = "SELECT * FROM `san_pham` WHERE `id` ='$id_san_pham'";
    $xoa_san_pham = "DELETE FROM `san_pham` WHERE `id` = '$id_san_pham'";
    $kiem_tra_sp_trong_san_pham = "SELECT * FROM `san_pham` WHERE `id_san_pham` ='$id_san_pham'";

    if ($db->num_rows($kiem_tra_san_pham)) {
       
            $db->query($xoa_san_pham);
            echo "<script>alert('Xóa thành công');</script>";

        new Redirect("index.php?page=sanpham");
    } else {
        echo "<script>alert('Không có sản phẩm nào');</script>";
    }
} else {
    echo 'loi';
}
?>
