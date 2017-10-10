<?php
//chạy các thư viện
require_once './init.php';

if ($_GET['log'] == "true") {
    
    //Lấy thông tin từ form login
    $username = $_POST['txtU'];
    $password = md5($_POST['txtP']);
    
//Kiểm tra trong database
    $db = new DB();
    $check = $->num_rows("SELECT username, password FROM users WHERE username='{$username}' AND password='{$password}");
    
    if ($check == 1) {
        echo "gud";
    }
    }
?>