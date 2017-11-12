<?php

if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];

    switch ($page) {
        //danh muc
        case 'locsanpham' : include 'pages/locsanpham.php';
            break;
        case 'timkiem' : include 'pages/search.php';
            break;
        case 'sanpham' : include 'pages/sanpham.php';
            break;
        case 'dangky' : include 'pages/reg.php';
            break;
        case 'dangnhap' : include 'pages/login.php';
            break;
        case 'chinhsuathongtin' : include 'pages/user-edit.php';
            break;
        
        case 'giohang' : include 'pages/cart.php';
            break;
         case 'themgiohang' : include 'include/themgiohang.php';
            break;
        case 'xoagiohang' : include 'include/xoagiohang.php';
            break;
        case 'thanhtoan' : include 'pages/checkout.php';
            break;
        
    }
} else {
    include 'pages/index-page.php';
}
?>