<?php

if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];

    switch ($page) {

        //danh muc
        case 'danhmuc' : include 'modules/danhmuc/danhmuc.php';
            break;
        case 'themdanhmuc' : include 'modules/danhmuc/themdanhmuc.php';
            break;
        case 'suadanhmuc' : include 'modules/danhmuc/suadanhmuc.php';
            break;
        case 'xoadanhmuc' : include 'modules/danhmuc/xoadanhmuc.php';
            break;
        //thuong hieu
        case 'thuonghieu' : include 'modules/thuonghieu/thuonghieu.php';
            break;
        case 'themthuonghieu' : include 'modules/thuonghieu/themthuonghieu.php';
            break;
        case 'suathuonghieu' : include 'modules/thuonghieu/suathuonghieu.php';
            break;
        case 'xoathuonghieu' : include 'modules/thuonghieu/xoathuonghieu.php';
            break;
        //nha phan phoi
        case 'nhaphanphoi' : include 'modules/nhaphanphoi/nhaphanphoi.php';
            break;
        case 'themnhaphanphoi' : include 'modules/nhaphanphoi/themnhaphanphoi.php';
            break;
        case 'suanhaphanphoi' : include 'modules/nhaphanphoi/suanhaphanphoi.php';
            break;
        case 'xoanhaphanphoi' : include 'modules/nhaphanphoi/xoanhaphanphoi.php';
            break;
        //san pham
        case 'sanpham' : include 'modules/sanpham/sanpham.php';
            break;
        case 'themsanpham' : include 'modules/sanpham/themsanpham.php';
            break;
        case 'suasanpham' : include 'modules/sanpham/suasanpham.php';
            break;
        case 'xoasanpham' : include 'modules/sanpham/xoasanpham.php';
            break;
        case 'chitietsanpham' : include 'modules/sanpham/chitietsanpham.php';
            break;

        default : 
            break;
    }
} else  {
    include 'modules/adminpage/dashboard.php';
}
?>

