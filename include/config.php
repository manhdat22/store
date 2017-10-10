<?php
//khai báo host, user, pass và tên db//
    $HOST = "localhost";
    $DATABASE = "store_database";
    $USER = "root";
    $PASS = "";
//báo lỗi//
    $ERROR = "Không thể kết nối tới database: ";
//kết nối//
try {
    $conn = new PDO("mysql:host=".$HOST.";dbname=".$DATABASE, $USER, $PASS);
    mysql_query("SET NAMES 'utf8'");
    
} catch (Exception $exc) {
    //check lỗi//
    echo $ERROR . $exc ->getMessage();
}

    
    

   

