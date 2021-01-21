<?php use classes\Utility, classes\Product, classes\Category; ?>
<?php 

if (isset($_POST['create_product'])) {

    $product = new Product();

    $product->title = $_POST['title'];
    $product->description = $_POST['description'];
    $product->cat_id = $_POST['cat_id'];
    $product->price = $_POST['price'];
    $product->photo = $_FILES['photo']['name'];
    $product->stock = $_POST['stock'];

    if ($product->uploadPhoto($_FILES['photo'])) {
        try {
            $product->saveWithPhoto();
            Utility::redirect("products.php");
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        } 
    } else {
        echo "problem in uploading photo";
        print_r($product->getUploadErrors());
    }
    
}

?>
<div class="row">

    <form action="" method="post" enctype="multipart/form-data">
        <br />
        <div class="form-group">
            <label for="title">عنوان / نام محصول</label>
            <input type="text" name="title" class="form-control" placeholder="عنوان محصول را وارد کنید">
        </div>

        <div class="form-group">
            <label for="description">توضیحات محصول</label>
            <textarea class="form-control" name="description" cols="30" rows="20" placeholder="توضیحات محصول را وارد کنید"></textarea>
        </div>
        <hr />
        <div class="form-group">
            <label for="cat">انتخاب دسته بندی</label>
            <select class="form-control" name="cat_id" id="">
                <?php
                $cats = Category::findAll();
                foreach ($cats as $cat):
                ?>
                <option value="<?php echo $cat->id; ?>"><?php echo $cat->title; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="stock">موجودی</label>
            <input type="number" name="stock" class="form-control" placeholder="تعداد موجود را وارد کنید" required>
        </div>

        <div class="form-group">
            <label for="tags">قیمت (تومان)</label>
            <input type="number" name="price" class="form-control" placeholder="قیمت" required>
        </div>

        <div class="form-group">
            <label for="photo">عکس محصول</label>
            <input type="file" name="photo" class="form-control">
        </div>

        <br />
        <br />

        <div class="form-group">
            <button type="submit" name="create_product" class="btn btn-block btn-primary"> افزودن محصول به فروشگاه</button>
        </div>

        <br /><br /><br />
        <br /><br /><br />
    </form>
</div>