<?php

use classes\Utility;

session_start();

if (isset($_SESSION['admin_info'])) 
{
    unset($_SESSION['admin_info']);
    session_destroy();

    header("Location: ../");
} else if(isset($_SESSION['user_info'])) {
    unset($_SESSION['user_info']);
    session_destroy();

    header("Location: ../");

}else {
    header("Location: ../");
}

?>