<?php

// Directory Seprator
!defined("DS") ? define("DS", DIRECTORY_SEPARATOR) : "";

// site path
!defined("SITE_ROOT") ? define("SITE_ROOT", "/home/mohammad/Desktop/server/online-shop/") : "";
// site url
!defined("SITE_URL") ? define("SITE_URL", "http://server.com/online-shop") : "";
// View Files Path
!defined("VIEW_PATH") ? define("VIEW_PATH", SITE_ROOT . "admin/views/") : "";

// View Files Path
// upload dircetory path
!defined("UPLOAD_DIR") ? define("UPLOAD_DIR", SITE_ROOT . "uploads" ) : "";
// setting file path
!defined("SETTING_PATH") ? define("SETTING_PATH", SITE_ROOT . DS . 'admin' . DS . 'includes' . DS . 'config' . DS .'setting.json' ) : "";


// configur setting and information of site
$jsonString = file_get_contents(SETTING_PATH);
$setting = json_decode($jsonString);   

!defined("SITE_TITLE") ? define("SITE_TITLE", $setting->site_info->name) : "";

!defined("ADMIN_TITLE") ? define("ADMIN_TITLE", "پنل مدیریت") : "";
!defined("PAY_CART") ? define("PAY_CART", [
    'name'   => $setting->site_info->pay_cart_name,
    'number' => $setting->site_info->pay_cart
]) : "";

!defined("SITE_INFO") ? define("SITE_INFO", array(
    "name" => $setting->site_info->name,
    "email" => $setting->site_info->email,
    "phone" => $setting->site_info->phone,
    "about" => $setting->site_info->about,
)) : "";
