<?php if(!isset($_GET['id']) || empty($_GET['id'])) classes\Utility::redirect("categories.php"); ?>

<?php use classes\User, classes\Utility; ?>
<?php
$user = User::findById($_GET['id']);

if (isset($_POST['update_user'])) 
{
    $user->name     = $_POST['name'];
    $user->email    = $_POST['email'];
    $user->address  = $_POST['address'];

    if ($user->register())
        Utility::redirect("?action=view-users");
    else
        $error_lists[] = "مشکلی در ویرایش کاربر بوجود آمد لطفا دوباره تلاش کنید";
}
?>
<div class="row">

    <div class="col-md-8 col-md-offset-2">
        <form action="" method="post">
            
        <div class="form-group">
                <label for="name"> نام و نام خانوادگی</label>
                <input type="text" name="name" class="form-control" placeholder="نام کاربر را وارد کنید" required value="<?php echo $user->name ?>">
            </div>

            <div class="form-group">
                <label for="emial"> ایمیل</label>
                <input type="email" name="email" class="form-control" placeholder="ایمیل کاربر را وارد کنید" required value="<?php echo $user->email ?>">
            </div>

        
            <div class="form-group">
                <label for="address"> آدرس</label>
                <input type="text" name="address" class="form-control" placeholder=" آدرس کاربر را وارد کنید" value="<?php echo $user->address; ?>">
            </div>
            <br>  
            <br>  
            <div class="form-group">
                <button type="submit" name="update_user" class="btn btn-block btn-primary"> ویرایش کاربر</button>
            
            </div>
            <br><br><br><br><br><br>
            


        </form>
    </div>

</div>