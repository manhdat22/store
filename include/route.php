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
    }
} else {
    include 'pages/index-page.php';
}
?>