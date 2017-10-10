<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of function
 *
 * @author leeli
 */
class Redirect {
    public function __construct($url = null) {
        if ($url) {
            echo '<script>location.href="'.$url.'";</script>';
        }
    }
}