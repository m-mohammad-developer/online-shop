<?php

use classes\Slider;
use classes\Utility;

include('views/header.php'); ?>
<?php 

// save picture path in database
if (isset($_POST['send']))
{
    $slider = new classes\Slider;
    $slider->path = "images/slider/" . $_POST['path'];

    if ($slider->create())
        Utility::redirect("slider.php");
}
// delete picture path from database
if (isset($_GET['action']) && $_GET['action'] == "delete" && is_numeric($_GET['id']))
{
    $slide = Slider::findById($_GET['id']);
    if ($slide)
        if ($slide->delete()) {
            echo "<script>alert('لطفا فایل عکس را از پوشه عکس های اسلایدر پاک کنید');</script>";
            echo "<script>location.replace('slider.php');</script>";
        }
    else 
        Utility::redirect("slider.php");    
}

?>
    <div id="wrapper">
        <!-- naviation start -->
        <?php include('views/navigation.php'); ?>
        <!-- naviation end -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         اسلاید ها <small>صفحه مدیریت</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>آیدی</th>
                                    <th>مسیر</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $slides = Slider::findAll(); ?>
                            <?php foreach ($slides as $slide): ?>
                                <tr>
                                    <td><?= $slide->id; ?></td>
                                    <td><?= $slide->path; ?></td>
                                    <td><a class="btn btn-danger" href="?action=delete&id=<?= $slide->id; ?>">حذف</a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">


                    <div class="col-md-6 col-md-offset-3">
                        <div class="alert alert-warning">
                            <p>
                                لطفا ابتدا تصویر مورد نظر را به پوشه " images/slider " منتقل کرده (در روت سایت) و نام آن را در فرم زیر وارد کنید در غیر اینصورت اسلایدر کار نخواهد کرد
                            </p>
                            <p>
                                اندازه پیشنهادی برای تصویر اسلایدر 1400 در 377 است
                            </p>
                        </div>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="path"></label>
                                <input type="text" class="form-control" name="path" placeholder="نام عکس را وارد کنید">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-block btn-primary" name="send" value="ارسال">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include('views/footer.php'); ?>
