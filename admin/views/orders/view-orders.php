<?php 
use classes\Order;
use classes\Utility;
?>
<?php 
$order_by = "all";

$order = "";
if (isset($_GET['order'])) {
    $order = $_GET['order'];
}
switch ($order) {
    case 'week':
        $time = Utility::getLastTime(7);
        break;

    case 'month':
        $time = Utility::getLastTime(30);
        break;
    case 'year':
        $time = Utility::getLastTime(365);
        break;
    
    case 'costume':
        $days = $_GET['days'];
        $time = Utility::getLastTime($days);
        break;
    
    default:
        $time = Utility::getLastTime(0);
        
        break;
}
?>

<?php $orders = Order::findAllWhere([['created_at', '>', $time]]); ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                انتخاب بازه زمانی
            </div>

            <div class="panel-body">    
                <a href="?order=week" class="btn btn-primary"> یک هفته قبل</a>
                <a href="?order=month" class="btn btn-primary"> یک ماه قبل</a>
                <a href="?order=year" class="btn btn-primary"> یک سال قبل</a>
                <div class="pull-left">
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="چند روز قبل؟" id="days">
                        </div>
                        <div class="form-group form-inline">
                            <input type="submit" class="btn btn-block btn-primary" id="costume" value="پیدا کردن">    
                        </div>
                </div>
            </div>
        </div>

        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>آیدی</th>
                    <th>کاربر</th>
                    <th>کل پرداختی</th>
                    <th>کد رهگیری پرداخت</th>
                    <th>وضعیت</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order->id; ?></td>
                    <td><?php echo $order->user_id; ?></td>
                    <td><?php echo number_format($order->total_price); ?></td>
                    <td><?php echo $order->track_code; ?></td>
                    <td>
                        <?php if ($order->is_confirmed == 1): ?>
                            <span class="text-success">تایید شده</span>
                        <?php else: ?>
                            <span class="text-danger">تایید نشده</span>
                        <?php endif; ?>
                        </td>
 
                    <td><a href="?action=view-order&id=<?= $order->id; ?>" class="btn btn-info">مشاهده جزییات</a></td>
                  

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
if(isset($_POST['delete'])) {
    $order_id = $_POST['order_id'];
    if ($order = Order::findById($order_id)) {
        var_dump($order);
        if ($order->delete()) {
            classes\Utility::redirect("orderegories.php");
            // echo "OK";
        } else {
            echo '<div class="alert alert-warning"> مشکلی در حذف دسته بندی پیش آمد </div>';
        }
    }
} 

if(isset($_POST['update'])) {
    // include("?edit-orderegories.php&action=edit-orderegories&id={$_POST['order_id']}");
    Utility::redirect("?action=edit-orderegories&id={$_POST['order_id']}");
}
?>

