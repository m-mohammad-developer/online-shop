<?php use classes\Utility, classes\Product, classes\Category; ?>
<?php
if (!isset($_GET['id']) || empty($_GET['id'])) Utility::redirect("products.php");
?>
<?php 
$product = Product::findById($_GET['id']);

// update_product_with_photo

if (isset($_POST['update_product'])) {


    $product->title = $_POST['title'];
    $product->description = $_POST['description'];
    $product->cat_id = $_POST['cat_id'];
    $product->price = $_POST['price'];
    // $product->photo = $_FILES['photo_updated']['name'];
    $product->stock = $_POST['stock'];

    try {
        $product->save();
        Utility::redirect("products.php");
    } catch (PDOException $e) {
        echo ($e->getMessage());
    }

}

if (isset($_POST['update_product_with_photo'])) {

    $old_photo = $product->photo;

    $product->title = $_POST['title'];
    $product->description = $_POST['description'];
    $product->cat_id = $_POST['cat_id'];
    $product->price = $_POST['price'];
    $product->photo = $_FILES['photo_update']['name'];
    $product->stock = $_POST['stock'];

    try {
        var_dump($product->saveWithPhoto($_FILES['photo_update'], $old_photo));
        Utility::redirect("products.php");   
    } catch (\PDOException $e) {
        echo ($e->getMessage());
    }

}



?>
<div class="row">

    <form action="" method="post" enctype="multipart/form-data">
        <br />
        <div class="form-group">
            <label for="title">عنوان / نام محصول</label>
            <input type="text" name="title" class="form-control" placeholder="عنوان محصول را وارد کنید" value="<?php echo $product->title;  ?>">
        </div>

        <div class="form-group">
            <label for="description">توضیحات محصول</label>
            <textarea class="form-control" name="description" cols="30" rows="20" placeholder="توضیحات محصول را وارد کنید"><?php echo $product->description;?></textarea>
        </div>
        <hr />
        <div class="form-group">
            <label for="cat">انتخاب دسته بندی</label>
            <select class="form-control" name="cat_id" id="">
                <?php
                $cats = Category::findAll();
                foreach ($cats as $cat):
                ?>
                <option <?php echo $product->cat_id == $cat->id ? "selected" : ""; ?> value="<?php echo $cat->id; ?>"><?php echo $cat->title; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="stock">موجودی</label>
            <input type="number" name="stock" class="form-control" placeholder="تعداد موجود را وارد کنید" value="<?php echo $product->stock;  ?>" required>
        </div>

        <div class="form-group">
            <label for="tags">قیمت (تومان)</label>
            <input type="number" name="price" class="form-control" placeholder="قیمت" value="<?php echo $product->price;  ?>" required>
        </div>

        <div class="form-group">
            <label for="photo">عکس محصول</label>
            
            <img src="<?php echo $product->getPhotoPath(); ?>" class="img-responsive" style="margin-left:auto; margin-right:auto;" width="50%" alt="">

            <label for="photo">عکس جدید می خواهید؟ اینجا انتخاب کنید</label>
            <input type="file" name="photo_update" class="form-control">
        </div>

        <br />
        <br />

        <div class="form-group">
            <button type="submit" name="update_product" class="btn btn-block btn-primary"> ویرایش محصول</button>
            <button type="submit" name="update_product_with_photo" class="btn btn-block btn-info"> ویرایش محصول (همراه عکس)</button>
        </div>

        <br /><br /><br />
        <br /><br /><br />
    </form>
</div>