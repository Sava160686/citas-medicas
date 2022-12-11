<?php
namespace App\Helpers;

class UserTokenUtil{
    static $TOKEN_USER = 0;

    static function getTokenUser(){
        return self::$TOKEN_USER;
    }
}
