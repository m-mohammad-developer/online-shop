<?php 
use classes\Admin;
use classes\Utility;
?>
<?php $admins = Admin::findAll(); ?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>آیدی</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>تاریخ ثبت نام</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?php echo $admin->id ?></td>
                    <td><?php echo $admin->name; ?></td>
                    <td><?php echo $admin->email; ?></td>
                    <td><?php echo $admin->created_at; ?></td>



                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $admin->id; ?>" name="user_id">
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
    if ($user = Admin::findById($user_id)) {
        if ($user->delete()) {
            Utility::redirect("users.php?action=view-admins");
        } else {
            echo '<div class="alert alert-warning"> مشکلی در حذف کاربر پیش آمد </div>';
        }
    }
} 

if(isset($_POST['update'])) {
    Utility::redirect("?action=edit-users&id={$_POST['user_id']}");
}
?>

