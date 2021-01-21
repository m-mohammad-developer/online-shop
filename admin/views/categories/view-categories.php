<?php 
use classes\Category;
use classes\Utility;
?>
<?php $cats = Category::findAll(); ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>آیدی</th>
                    <th>عنوان</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($cats as $cat): ?>
                <tr>
                    <td><?php echo $cat->id ?></td>
                    <td><?php echo $cat->title; ?></td>
                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $cat->id; ?>" name="cat_id">
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
    $cat_id = $_POST['cat_id'];
    if ($cat = Category::findById($cat_id)) {
        var_dump($cat);
        if ($cat->delete()) {
            classes\Utility::redirect("categories.php");
            // echo "OK";
        } else {
            echo '<div class="alert alert-warning"> مشکلی در حذف دسته بندی پیش آمد </div>';
        }
    }
}

if(isset($_POST['update'])) {
    // include("?edit-categories.php&action=edit-categories&id={$_POST['cat_id']}");
    Utility::redirect("?edit-categories.php&action=edit-categories&id={$_POST['cat_id']}");
}
?>

