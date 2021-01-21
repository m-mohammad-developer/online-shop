<?php

namespace classes;

class Utility
{
    

    public static function redirect(string $location)
    {
        return header("Location: ". $location);
    }
}