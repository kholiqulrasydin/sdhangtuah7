<?php

class Controller
{
    public static function is_crlf_valid(?string $crlf)
    {
        $sessionCrlf = $_SESSION['crlf_token'];
        if($sessionCrlf == $crlf)
        {
            return true;
        }else{
            return false;
        }
    }
}