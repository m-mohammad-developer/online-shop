<?php 
use classes\User;
use classes\Utility;
?>
<?php $users = User::findAll(); ?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>آیدی</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>آدرس</th>
                    <th>تعداد خرید</th>
                    <th>تاریخ ثبت نام</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user->id ?></td>
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->email; ?></td>
                    <td><?php echo $user->address; ?></td>
                    <td><?php echo $user->buy_count; ?></td>
                    <td><?php echo $user->created_at; ?></td>



                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $user->id; ?>" name="user_id">
                        <td><button class="btn btn-danger" name="delete">حذف</button></button></td>
                        <td><button class="btn btn-info" name="update">ویرایش</button></td>
                    </form>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
if(isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];
    if ($user = User::findById($user_id)) {
        if ($user->delete()) {
            Utility::redirect("users.php");
        } else {
            echo '<div class="alert alert-warning"> مشکلی در حذف کاربر پیش آمد </div>';
        }
    }
} 

if(isset($_POST['update'])) {
    Utility::redirect("?action=edit-users&id={$_POST['user_id']}");
}
?>

