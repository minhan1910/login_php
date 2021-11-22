<?php

    function checkEmpty($value) {
        $flag = false;
        if(!isset($value) || trim($value) == "") {
            $flag = true;
        }
        return $flag;
    }
    
    function checkLength($value, $min, $max) {
        $flag = false;
        $length = strlen($value);
        if($length < $min || $length > $max) {
            $flag = true;
        }
        return $flag;
    }

