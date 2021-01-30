<?php

use classes\Contact;
use classes\Utility;

include('views/header.php'); ?>
<?php 
// delete news from database
if (isset($_GET['action']) && $_GET['action'] == "delete" && is_numeric($_GET['id']))
{
    $news = Contact::findById($_GET['id']);
    if ($news)
    try {
        //delete and redirect.
        $news->delete();
        Utility::redirect("contact_page.php"); 
    } catch (PDOException $e) {
        Utility::redirect("index.php");  
    } 
}
// get news from database
$messages = Contact::findAll();
?>
    <div id="wrapper">
        <!-- naviation start -->
        <?php include('views/navigation.php'); ?>
        <!-- naviation end -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            ارتباط با ما <small>صفحه مدیریت</small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary">
                            <div class="panel-heading">پیام های دریافت شده</div> 
                            <div class="panel-body">
                            <table class="table table-hover table-responsive table-dark">
                            <thead>
                                <tr>
                                    <th>آیدی</th>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>متن پیام</th>
                                    <th>تاریخ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($messages):  ?>
                                <?php foreach ($messages as $message): ?>
                                    <tr>
                                        <td><?= $message->id; ?></td>
                                        <td><?= $message->name; ?></td>
                                        <td><?= $message->email; ?></td>
                                        <td><?= $message->text; ?></td>
                                        <td><?= $message->created_at; ?></td>
                                        <td><a class="btn btn-danger" href="?action=delete&id=<?= $message->id; ?>">حذف</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                            </div>  
                        </div>
                    </div>
                </div>
                <br /><br /><br /><br />
                <hr />            
                <?php 
                // get setting info
                $setting_str = file_get_contents(SETTING_PATH);
                $info = json_decode($setting_str);
                if (isset($_POST['edit_site_info'])) 
                {
                    // edit site information (setting.json)
                    $info->site_info->name  = $_POST['site_name'];
                    $info->site_info->phone = $_POST['site_phone'];
                    $info->site_info->email = $_POST['site_email'];
                    $info->site_info->about = $_POST['site_info'];
                    $info->site_info->pay_cart = $_POST['site_pay_cart'];
                    $info->site_info->pay_cart_name = $_POST['site_pay_cart_name'];

                    $newJsonStr = json_encode($info);
                    if (file_put_contents(SETTING_PATH ,$newJsonStr)) {
                        echo "<script>alert('اطلاعات سایت با موفقیت ویرایش شد');</script>";
                        echo "<script>location.replace('contact_page.php');</script>";
                    } else {
                        echo "<script>alert('مشکلی پیش آمد دوباره تلاش کنید');</script>";
                    } 
                }               
                ?>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form action="" method="post">
                        <div class="panel panel-info">  
                            <div class="panel-heading">اطلاعات سایت</div>
                            <div class="panel-body">
                                    <div class="form-group">
                                        <label for="name">نام سایت</label>
                                        <input type="text" class="form-control" name="site_name" value="<?= SITE_INFO['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">شماره تلفن سایت</label>
                                        <input type="text" class="form-control" name="site_phone" value="<?= SITE_INFO['phone']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="site_email">ایمیل سایت</label>
                                        <input type="email" class="form-control" name="site_email" value="<?= SITE_INFO['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="site_pay_cart"> شماره کارت پرداخت</label>
                                        <input type="text" class="form-control" name="site_pay_cart" value="<?= PAY_CART['number']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="site_pay_cart_name"> نام شماره کارت</label>
                                        <input type="text" class="form-control" name="site_pay_cart_name" value="<?= PAY_CART['name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="site_info">درباره سایت</label>
                                        <textarea class="form-control" name="site_info" id="" cols="30" rows="10"><?= SITE_INFO['about']; ?></textarea>
                                    </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-block btn-primary" name="edit_site_info">ویرایش</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include('views/footer.php'); ?>