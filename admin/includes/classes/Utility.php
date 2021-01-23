<?php

namespace classes;

class Utility
{
    

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