<?php include('tmp-inc/header-main.php'); ?> 
<link rel="stylesheet" href="css/style.css">
<?php use classes\User, classes\Admin, classes\Utility; ?>
<?php 
if (isset($_POST['login_admin'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    if (Admin::login($email, $pass)) {
        Utility::redirect('admin/');
    }
}


if (isset($_POST['login_user'])) {

  $email = $_POST['email'];
  $pass = $_POST['password'];

  if (User::login($email, $pass)) {
      Utility::redirect('./user.php');
  }
}
?>

<div class="container">
  <section id="content">
    <form action="" method="post">
      <h1>فرم ورود</h1>
      <div>
        <input type="text" placeholder="ایمیل" required="" id="username" name="email"/>
      </div>
      <div>
        <input type="password" placeholder="پسورد" required="" id="password" name="password"/>
      </div>
      <div>
        <input type="submit" value="ورود / مدیر" name="login_admin"/>
        <input type="submit" value="ورود / کاربر" name="login_user"/>
        <!-- <a href="#">Lost your password?</a> -->
        <a href="#">ثبت نام</a>
      </div>
    </form><!-- form -->
    
  </section><!-- content -->
</div><!-- container -->

<?php include('tmp-inc/footer-main.php'); ?>