<?php

namespace classes;

class Utility
{
    

    public function redirect(string $location)
    {
        return header("Location: ". $location);
    }
}