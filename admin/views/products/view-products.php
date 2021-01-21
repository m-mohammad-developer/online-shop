<?php use classes\Product; ?>
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

</table>