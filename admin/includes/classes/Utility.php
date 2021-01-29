<?php

namespace classes;

class Utility
{
    
    
    public static function getLastTime($day = 7){
        $curTime = time();
        date("Y-m-d",$curTime);
        return date("Y-m-d",($curTime-(60*60*24*$day)));
    }


    public static function redirect(string $location)
    {
        return header("Location: ". $location);
    }

    public static function dd($var)
    {
        echo "<pre style='direction: ltr;text-align: left;'>";
        var_dump($var);
        echo "</pre>";
        die;
    }
}