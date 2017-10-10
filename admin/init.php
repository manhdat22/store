<?php

//gọi các thư viện
require_once './libs/DB.php';
require_once './libs/session.php';
require_once './libs/functions.php';
//database
$db = new DB();
$db->connect();
$db->set_char('utf8');

//thông tin chung
$_DOMAINS = 'http://localhost/store/admin/';
$_DOMAINS = 'http://localhost/store/admin/';

date_default_timezone_get('Asia/Ho_Chi_Minh');
$today = '';
$today = date("Y-m-d H:i:sa");

//sestion
$session = new session();
$session->start();


if ($session->get() != "") {
    $user = $session->get();
} else {
    $user = '';
}