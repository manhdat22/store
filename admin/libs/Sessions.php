<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Thư viện session
 *
 * @author leeli
 */
class Sessions{

    //start session
    public function start() {
        session_start();
    }
 
    //lưu session
    public function send($user) {
        $_SESSION['user'] = $user;
    }

    //get session
    public function get() {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        } else {
            $user = '';
        }
    }
    
    public function getCart() {
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        } else {
            $cart = '';
        }
    }

    public function destroy() {
        session_destroy();
    }

}
