<?php

require_once './init.php';

if (isset($_REQUEST['id'])) {

    $id = $_REQUEST['id'];

    $xoa = "DELETE FROM `don_hang` WHERE `id` = $id";
    $db->query($xoa_danh_muc);
    echo "<script>alert('Xóa thành công');</script>";
    new Redirect("index.php?page=danhmuc");
}
?>
