<?php

use classes\Product;
use classes\User;
use classes\Utility;
use classes\Order_detail;

include("admin/includes/init.php"); ?>
<?php 
if (!isset($_SESSION['user_info'])) classes\Utility::redirect(SITE_URL . DS . "login.php");
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
    <title>SB Admin - Bootstrap Admin Template</title>
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
try {
    $user = classes\User::findById($_SESSION['user_info']['id']);
    $orders = classes\Order::findAllWhere([['user_id', '=', $user->id]]);
    $deleted_orders = classes\Deleted_order::findAllWhere([['user_id', '=', $_SESSION['user_info']['id']]]);
}catch (PDOException $e) {
    Utility::redirect('login.php');
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    حساب کاربری / <a href="admin/logout.php" class="text-danger">خروج از حساب</a>
                    <a href="index.php"><span class="pull-left text-danger">مشاهده سایت</span></a>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                    <thead> 
                        <tr>
                            <th>آیدی</th>
                            <th>نام</th>
                            <th>آدرس</th>
                            <th>ایمیل</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= $user->id; ?></td>
                            <td><?= $user->name; ?></td>
                            <td><?= $user->address; ?></td>
                            <td><?= $user->email; ?></td>
                            <td><a href="?action=edit-user">ویرایش اطلاعات</a></td>
                            <td><a href="?action=edit-user-pass">ویرایش پسورد</a></td>
                        </tr>
                    </tbody>
                    </table>

                    <?php if(isset($_GET['action']) && $_GET['action'] == 'edit-user'): ?>
                        <div class="col-md-6 col-md-offset-3">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="name">نام جدید را وارد کنید</label>
                                    <input type="text" class="form-control" placeholder="نام خود را وارد کنید" value="<?= $user->name; ?>" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="name">ایمیل جدید را وارد کنید</label>
                                    <input type="email" class="form-control" placeholder="ایمیل خود را وارد کنید" value="<?= $user->email; ?>" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="name">آدرس جدید را وارد کنید</label>
                                    <input type="text" class="form-control" placeholder="آدرس دقیق خود را وارد کنید" value="<?= $user->address; ?>" name="address">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning btn-block" value="ویرایش" name="edit_user_info">
                                </div>
                            </form>
                        </div>
                        <?php
                        // update user information
                        if (isset($_POST['edit_user_info'])) {
                            $user->name = $_POST['name'];
                            $user->email = $_POST['email'];
                            $user->address = $_POST['address'];
                            // save user new info
                            try {
                                $user->save();
                                Utility::redirect("user.php");
                            } catch (PDOException $e) {
                                echo "<script>alert('مشکلی در ویرایش کاربر بوجود آمد لطفا بعد امتحان کنید');</script>";
                            }
                        }
                        ?>
                    <?php endif; ?>
                    <?php if(isset($_GET['action']) && $_GET['action'] == 'edit-user-pass'): ?>

                        <div class="col-md-6 col-md-offset-3">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="passsword">پسورد جدید را وارد کنید</label>
                                    <input type="password" class="form-control" placeholder="پسورد جدید" name="password">
                                </div>
                        
                                <div class="form-group">
                                    <input type="submit" class="btn btn-warning btn-block" value="ویرایش" name="edit_user_pass">
                                </div>
                            </form>
                        </div>
                        <?php
                        // update user information
                        if (isset($_POST['edit_user_pass'])) {

                            $pass = $_POST['password'];
                            
                            if (!empty($pass)) {
                                $user->password = $pass;
                                if($user->updateUserPassword())
                                    Utility::redirect('user.php');
                                else 
                                    echo "<script>alert('مشکلی در ویرایش پسورد بوجود آمد لطفا بعدا امتحان کنید');</script>";
                            }
                           
                            // save user new info
                            
                        }
                        ?>

                    <?php endif; ?>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    مشاهده سفارشات 
                </div>
                <div class="panel-body">  
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>آیدی</th>
                                <th>کاربر</th>
                                <th>کل پرداختی</th>
                                <th>کد رهگیری پرداخت</th>
                                <th>وضعیت</th>
                                <th>مشاهده</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($orders): ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order->id; ?></td>
                                <td><?php echo $user->name; ?></td>
                                <td><?php echo number_format($order->total_price); ?></td>
                                <td><?php echo $order->track_code; ?></td>
                                <td>
                                    <?php if ($order->is_confirmed == 1): ?>
                                        <span class="text-success">تایید شده</span>
                                    <?php else: ?>
                                        <span class="text-danger">تایید نشده</span>
                                    <?php endif; ?>
                                </td>
                                <td><a class="btn btn-info" href="?order_id=<?= $order->id; ?>">جزییات</a></td>                                <!-- <td><a href="?action=view-order&id=<?= $order->id; ?>" class="btn btn-info">مشاهده جزییات</a></td> -->
                            </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center">سفارشی یافت نشد</div>
                        <?php endif; ?>
                        </tbody>
                    </table>

                </div>

            </div>
            
            <?php if (isset($_GET['order_id'])): ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                            مشاهده جزییات سفارش
                </div>
            
                <div class="panel-body">
                    <table class="table table-responsive">

                        <thead>
                            <tr>
                            <th>آیدی محصول</th>
                            <th>تعداد</th>
                            <th>قیمت واحد</th>
                            <th>قیمت کل</th>
                            <th>تایید</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php  
                            $order_products = Order_detail::findAllWhere([['order_id', '=', $_GET['order_id']]]);
                            
                            $total_price = 0;
                            foreach($order_products as $order_product): 
                            // products of this order
                            $product = Product::findById($order_product->product_id); 
                            // total_price of products from database
                            $total_price += ($product->price * $order_product->product_quantity);
                            ?>
                            <tr>
                            <td><?= $order_product->product_id; ?></td>
                            <td><?= $order_product->product_quantity; ?></td>
                            <td><?= number_format($product->price); ?></td>
                            <td><?= number_format($product->price * $order_product->product_quantity); ?></td>
                            <td>
                            <?php if ($order_product->is_confirmed == 1): ?>
                            <span class="text-success">تایید شده</span>
                            <?php else: ?>
                            <span class="text-danger">تایید نشده</span>
                            <?php endif; ?>
                            </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <tfoot>
                            <tr>
                            <td>قیمت کل : <?= number_format($total_price); ?></td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
                
            </div>
            <?php endif; ?>

            <div class="panel panel-danger">
                <div class="panel-heading">
                    مشاهده سفارشات حذف شده
                </div>
                <div class="panel-body">  
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>آیدی</th>
                                <th>کاربر</th>
                                <th>کل پرداختی</th>
                                <th>کد رهگیری پرداخت</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($deleted_orders): ?>
                        <?php foreach ($deleted_orders as $deleted_order): ?>
                            <tr>
                                <td><?php echo $deleted_order->id; ?></td>
                                <td><?php echo $user->name; ?></td>
                                <td><?php echo number_format($deleted_order->total_price); ?></td>
                                <td><?php echo $deleted_order->track_code; ?></td>                              
                            </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center">سفارشی یافت نشد</div>
                        <?php endif; ?>
                        </tbody>
                    </table>

                </div>

            </div>
        
        </div>

    </div>

</div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
</body>
</html>