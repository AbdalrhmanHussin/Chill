<?php 

namespace web\Error;

class error {
    public static function abort($type) {
        if($type == '404') {
             include view_bath().'404.blade.php';
        }
    }
}