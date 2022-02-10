<?php
class Regex
{
    static public $dniPattern = '/^([0-9]){8}([a-zA-Z]){1}$/';
    static public $emailPattern = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    
    // public static function checkRegex($regex, $string)
    // {
    //     return preg_match($regex, $string) == 1 ? true : false;
    // }
}
