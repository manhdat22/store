<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Thư viện kết nối DATABASE
 *
 * @author leeli
 */
class DB {

    //khai báo
    private $HOST = "localhost",
            $DATABASE = "store_database",
            $USER = "root",
            $PASS = "",
            $ERROR = "Không thể kết nối tới database: ";
    //biến lưu kết nối
    public $conn = NULL;

    //hàm kết nối
    public function connect() {
        try {
            $this->conn = mysqli_connect($this->HOST, $this->USER, $this->PASS, $this->DATABASE);
        } catch (Exception $e) {
            echo $this->ERROR . $e ->getMessage();
        }
    }

    //close
    public function close() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

    //hàm truy vấn
    public function query($sql = null) {
        if ($this->conn) {
            mysqli_query($this->conn, $sql);
        }
    }

    //hàm đếm số record
    public function num_rows($sql = null) {
        if ($this->conn) {
            $q = mysqli_query($this->conn, $sql);
            if ($q) {
                $row = mysqli_num_rows($q);
                return $row;
            }
        }
    }

    //set charset
    public function set_char($utf) {
        if ($this->conn) {
            mysqli_set_charset($this->conn, $utf);
        }
    }

}
