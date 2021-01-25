<?php

use classes\Utility;

session_start();

if (isset($_SESSION['admin_info'])) 
{
    unset($_SESSION['admin_info']);
    session_destroy();

    header("Location: ../");
}

?>