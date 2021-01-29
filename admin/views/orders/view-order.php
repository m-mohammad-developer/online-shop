<?php 
use classes\Order;
use classes\Order_detail;
use classes\Product;
use classes\User;
use classes\Utility;

if (!isset($_GET['id'])) 
    Utility::redirect("orders.php");
?>
<?php 
try {
    if ($order = Order::findById($_GET['id'])) {
        // user that have made the order
        $user = User::findById($order->user_id);    
        // products of the order
        $order_products = Order_detail::findAllWhere([['order_id', '=', $_GET['id']]]);
    }
    
} catch (PDOException $e) {
    Utility::dd($e->getMessage());
}

?>
<?php
// Confirm Order by Id
if (isset($_POST['confirm_order'])) {
    $order_id = $_POST['order_id'];
    $order = Order::findById($order_id);
    if ($order->confirmOrder())
        Utility::redirect("orders.php");
}

if (isset($_POST['regect_order'])) {
    $order_id = $_POST['order_id'];
    $order = Order::findById($order_id);

    if ($order->deleteOrder())
        Utility::redirect("orders.php"); 
}
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <?php if(isset($user) && isset($order) && isset($order_products)): ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                جزییات محصول
            </div>

            <div class="panel-body">

                
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>آیدی سفارش</th>
                        <th>کل پرداختی</th>
                        <th>کد رهگیری پرداخت</th>
                        <th>وضعیت</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $order->id; ?></td>
                        <td><?= number_format($order->total_price); ?></td>
                        <td><?= $order->track_code; ?></td>
                        <td>
                        <?php if ($order->is_confirmed == 1): ?>
                            <span class="text-success">تایید شده</span>
                        <?php else: ?>
                            <span class="text-danger">تایید نشده</span>
                        <?php endif; ?>
                        </td>
                        
                    </tr>
                </tbody>
            </table> 

            <table class="table table-responsive">

                <thead>
                    <tr>
                        <th>آیدی محصول</th>
                        <th>تعداد</th>
                        <th>قیمت واحد</th>
                        <th>قیمت کل</th>
                        <th>تایید</th>
                    </tr>
                </thead>

                <tbody>
                <?php  
                $total_price = 0;
                foreach($order_products as $order_product): 
                    // products of this order
                    $product = Product::findById($order_product->product_id); 
                    // total_price of products from database
                    $total_price += ($product->price * $order_product->product_quantity);
                    ?>
                    <tr>
                        <td><?= $order_product->product_id; ?></td>
                        <td><?= $order_product->product_quantity; ?></td>
                        <td><?= number_format($product->price); ?></td>
                        <td><?= number_format($product->price * $order_product->product_quantity); ?></td>
                        <td>
                        <?php if ($order_product->is_confirmed == 1): ?>
                            <span class="text-success">تایید شده</span>
                        <?php else: ?>
                            <span class="text-danger">تایید نشده</span>
                        <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

                <tfoot>
                    <tr>
                        <td>قیمت کل : <?= number_format($total_price); ?></td>
                    </tr>
                </tfoot>

            </table>

            <table class="table table-responsive">

                <thead>
                    <tr>
                        <th>آیدی کاربر</th>
                        <th>نام</th>
                        <th>آدرس</th>
                        <th>ایمیل</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><?= $user->id; ?></td>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->address; ?></td>
                        <td><?= $user->email; ?></td>
                    </tr>
                </tbody>

             </table>
            </div>
            <div class="panel-footer">
                <form action="" method="POST">
                    <input type="hidden" name="order_id" value="<?= $order->id; ?>">
                    <button type="submit" class="btn btn-block btn-success" name="confirm_order">تایید سفارش</button>
                </form>
                <form action="" method="POST">
                    <input type="hidden" name="order_id" value="<?= $order->id; ?>">
                    <button type="submit" class="btn btn-block btn-danger" name="regect_order"> رد سفارش و حذف</button>
                </form>
            </div>
        </div>
        <?php else: ?>
            اطلاعات ورودی صحیح نمی باشند لطفا از حساب کاربری خود خارج شده و دوباره وارد شوید.
        <?php endif; ?>
    </div>
</div>
<br><br><br><br><br><br>