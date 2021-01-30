<?php

use classes\User;
use classes\Utility;

include("admin/includes/init.php"); ?>
<?php 
if (isset($_SESSION['user_info'])) classes\Utility::redirect(SITE_URL . DS . "user.php");
// var_dump($_SESSION['admin_info']);
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="User Pages">
    <meta name="author" content="WebMarket">
    <title>Register Page</title>
    <!-- Bootstrap Core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Core CSS RTL-->
    <link href="admin/css/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="admin/css/sb-admin.css" rel="stylesheet">
    <link href="admin/css/sb-admin-rtl.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="admin/css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
$errors = []; 
if (isset($_POST['register'])) 
{
    if (!isset($_POST['name']) || empty($_POST['name']) || strlen($_POST['name']) <= 8)
    {
        $errors['name'] = "فیلد نام نباید خالی باشد و طول آن باید بیشتر از 8 باشد";
    }
    
    if (!isset($_POST['email']) || empty($_POST['email']) || strlen($_POST['email']) <= 9)
    {
        $errors['email'] = "فیلد ایمیل نباید خالی باشد و طول آن باید بیشتر از 9 باشد";
    }
    if (!isset($_POST['password']) || empty($_POST['password']) || strlen($_POST['password']) < 8)
    {
        $errors['password'] = "فیلد پسورد نباید خالی باشد و طول آن باید حداقل 8 باشد";
    }

    if (!isset($_POST['address']) || empty($_POST['address']) || strlen($_POST['address']) < 40)
    {
        $errors['address'] = "لطفا آدرس دقیق خود را وارد کنید و طول آن را رعایت کنید (حداقل 40)";
    }


    foreach ($errors as $key => $error) {
        if (empty($error))
            unset($errors[$key]);
    }

    if (empty($errors))
    {
        $user = new User;

        $user->name     = $_POST['name'];
        $user->email    = $_POST['email'];
        $user->password = $_POST['password'];
        $user->address  = $_POST['address'];

        if ($user->register())
            Utility::redirect("login.php");
        else 
            $errors['create_user'] = "ثبت نام با مشکلی مواجه شد لطفا به مدیران سایت اطلاع دهید";
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="" method="post">       
                <div class="panel panel-primary">
                    <div class="panel-heading">ثبت نام در سایت</div>
                    <div class="panel-body">
                    <?php if (!empty($errors)): ?>
                        <div class="text-danger" style="padding: 10px; border-right: 5px solid red; border-radius: 5px;">
                            <?php foreach ($errors as $error):  ?>
                                <p><?= $error; ?></p>
                            <?php endforeach; ?>
                        </div>  
                    <?php endif; ?>
                    <br />
                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email"> ایمیل</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password"> پسورد</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="address"> آدرس دقیق (استفاده برای ارسال)</label>
                                <input type="address" class="form-control" name="address" placeholder="آذربایجان شرقی - میانه - خیابان 45 - کوچه 12 - پلاک 12" required>
                            </div>
                        </form>
                    </div>  

                    <div class="panel-footer">
                        <button type="submit" class="btn btn-block btn-success" name="register">ثبت نام</button>
                    </div>
                </div>
            </form>    
        </div>

    </div>

</div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>