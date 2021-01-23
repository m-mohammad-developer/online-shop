<?php
ob_start();
session_start();


require_once  "config/constants.php";
require_once SITE_ROOT . "admin/includes/config/db_config.php";

// autoloading
require_once SITE_ROOT . "admin/includes/vendor/autoload.php";







// global variables
$conn = new classes\Database();