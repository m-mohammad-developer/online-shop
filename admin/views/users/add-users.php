<?php use classes\Admin, classes\User, classes\Utility; ?>

<?php

$error_lists= [];
if (isset($_POST['create_user_admin'])) 
{
    $new_admin = new Admin();
    $new_admin->name     = $_POST['name'];
    $new_admin->email    = $_POST['email'];
    $new_admin->password = $_POST['password'];

    if ($new_admin->register())
        Utility::redirect("?action=view-admins");
    else
        $error_lists[] = "مشکلی در ایجاد ادمین بوجود آمد لطفا دوباره تلاش کنید";
}


if (isset($_POST['create_user'])) 
{
    $new_user = new User();
    $new_user->name     = $_POST['name'];
    $new_user->email    = $_POST['email'];
    $new_user->password = $_POST['password'];
    $new_user->address  = $_POST['address'];
    $new_user->buy_count  = 0;

    if ($new_user->register())
        Utility::redirect("?action=view-users");
    else
        $error_lists[] = "مشکلی در ایجاد کاربر بوجود آمد لطفا دوباره تلاش کنید";
}
?>

<div class="row">
    <?php // id	name	email	password	address	buy_count	created_at	?>
    <div class="col-md-6 col-md-offset-3">
        
        <?php foreach ($error_lists as $error): ?>
        <div class="alert alert-warning">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="name"> نام و نام خانوادگی</label>
                <input type="text" name="name" class="form-control" placeholder="نام کاربر را وارد کنید" required>
            </div>

            <div class="form-group">
                <label for="emial"> ایمیل</label>
                <input type="email" name="email" class="form-control" placeholder="ایمیل کاربر را وارد کنید" required>
            </div>

            <div class="form-group">
                <label for="password"> پسورد</label>
                <input type="password" name="password" class="form-control" placeholder="پسورد کاربر را وارد کنید" required>
            </div>

            <div class="form-group">
                <label for="address"> آدرس</label>
                <input type="text" name="address" class="form-control" placeholder=" آدرس کاربر را وارد کنید">
            </div>
            <br>  
            <br>  
            <div class="form-group">
                <button type="submit" name="create_user" class="btn btn-block btn-primary"> ایجاد کاربر</button>
                <button type="submit" name="create_user_admin" class="btn btn-block btn-warning"> ایجاد ادمین</button>
            </div>
            <br><br><br><br><br><br>
            

        </form>
    </div>

</div>