<?php use classes\Category; ?>
<?php
if (isset($_POST['create_cat'])) 
{
    if (!empty($_POST['title'])) {
        $cat = new Category();

        $cat->title = $_POST['title'];
        if ($cat->create())
            classes\Utility::redirect("categories.php");
        else 
            echo "مشکلی در ایجاد دسته بندی پیش آمد لطفا دوباره تلاش کنید";
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
                <input type="text" name="title" class="form-control" placeholder="نام دسته بندی را وارد کنید" required>
            </div>
            <br>  
            <br>  
            <div class="form-group">
                <button type="submit" name="create_cat" class="btn btn-block btn-primary"> ایجاد دسته بندی </button>
            </div>
            <br><br><br><br><br><br>
            

        </form>
    </div>

</div>