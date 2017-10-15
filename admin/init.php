<?php

//gọi các thư viện
require_once './libs/DB.php';
require_once './libs/Sessions.php';
require_once './libs/functions.php';
//database
$db = new DB();
$db->connect();
$db->set_char('utf8');
$db->conn;

//thông tin chung
$_DOMAINS = 'http://localhost/store/admin/';
$home = 'http://localhost/store';
$login = 'http://localhost/store/admin/login.php';

date_default_timezone_get('Asia/Ho_Chi_Minh');
$today = '';
$today = date("Y-m-d H:i:sa");

//sestion
$session = new Sessions();
$session->start();


if ($session->get() != "") {
    $user = $session->get();
} else {
    $user = '';
}

if ($user) {
    $sql_get_data = "SELECT * FROM users WHERE username = '$user'";

    if ($db->num_rows($sql_get_data)) {
        $data_user = $db->fetch_assoc(1, $sql_get_data);
    }
}