<?php use classes\Product, classes\Category, classes\Utility; ?>
<?php $products = Product::findAll(); ?>

<?php $products = Product::findAll(); ?>
<table class="table table-hover">
    <thead>
        <tr>
            <th>آیدی</th>
            <th>عنوان</th>
            <th>توضیحات</th>
            <th>دسته بندی</th>
            <th>قیمت</th>
            <th>موجودی در انبار</th>
            <th>عکس</th>
            <th>تاریخ ایجاد</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product->id; ?></td>
            <td><?php echo $product->title; ?></td>
            <td><?php echo substr($product->description, 0, 120); ?></td>
            <td><?php echo Category::findById($product->cat_id)->title;; ?></td>
            <td><?php echo $product->price; ?></td>
            <td><?php echo $product->stock; ?></td>
            <td>
            <?php // echo $product->photo; ?>
                <img class="img-responsive" width="60px" src="<?php echo $product->getPhotoPath(); ?>" alt="product_photo">
            </td>
            <td><?php echo $product->created_at; ?></td>

            <form action="" method="post">
                <input type="hidden" value="<?php echo $product->id; ?>" name="product_id">
                <td><button class="btn btn-danger" name="delete">حذف</button></button></td>
                <td><button class="btn btn-info" name="update">ویرایش</button></td>
            </form>
        </tr>
    <?php endforeach; ?>
    </tbody>

</table>
<?php 
if(isset($_POST['delete'])) {
    $product_id = $_POST['product_id'];


    if ($product = Product::findById($product_id)) {
        if ($product->deleteWithPhoto()) {
            classes\Utility::redirect("products.php");
        } else {
            echo '<div class="alert alert-warning"> مشکلی در حذف محصول پیش آمد </div>';
        }
    }

} 


if(isset($_POST['update'])) {
    // include("?edit-categories.php&action=edit-categories&id={$_POST['cat_id']}");
    Utility::redirect("?action=edit-products&id={$_POST['product_id']}");
}
?>