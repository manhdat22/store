<?php
if (!isset($_SESSION['user'])) {
    echo '<script>alert("Bạn chưa đăng nhập, vui lòng đăng nhập")</script>';

    new Redirect($login);
}if (isset($_SESSION['user'])) {
    $check_permission = "SELECT * FROM `users` WHERE `username` = '" . $_SESSION['user'] . "' AND `quyen` = 0 AND `trang_thai` = 1 ";

    if (!$db->num_rows($check_permission)) {
    
        echo '<script>alert("Bạn không có quyền truy cập trang này")</script>';
        new Redirect('../index.php');
    }
}
?>

<!DOCTYPE html>
<html
    <head>
        <meta charset="utf-8" />
        <title>Trang quản trị</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- jQuery UI -->
        <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
        <!-- styles -->
        <link href="css/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="http://localhost/store/font/css/font-awesome.min.css">
        <link href="css/calendar.css" rel="stylesheet">
        <style>
            .panel-options{display:none;}
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>