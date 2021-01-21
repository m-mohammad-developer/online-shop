<?php if(!isset($_GET['id']) || empty($_GET['id'])) classes\Utility::redirect("categories.php"); ?>

<?php use classes\Category; ?>
<?php
$cat = Category::findById($_GET['id']);

if (isset($_POST['update_cat'])) 
{
    if (!empty($_POST['title'])) {
        

        $cat->title = $_POST['title'];
        if ($cat->save())
            classes\Utility::redirect("categories.php");
        else 
            echo "مشکلی در ویرایش دسته بندی پیش آمد لطفا دوباره تلاش کنید";
    } else {
        echo "عنوان دسته بندی را وارد کنید";
    }
}
?>
<div class="row">

    <div class="col-md-8 col-md-offset-2">
        <form action="" method="post">
            <div class="form-group">
                <label for="cat"> عنوان دسته بندی</label>
                <input type="text" name="title" class="form-control" value="<?php echo $cat->title; ?>" required>
            </div>
            <br>  
            <br>  
            <div class="form-group">
                <button type="submit" name="update_cat" class="btn btn-block btn-primary"> ویرایش دسته بندی </button>
            </div>
            <br><br><br><br><br><br>
            

        </form>
    </div>

</div>