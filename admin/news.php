<?php

use classes\News;
use classes\Utility;

include('views/header.php'); ?>
<?php 
// delete news from database
if (isset($_GET['action']) && $_GET['action'] == "delete" && is_numeric($_GET['id']))
{
    $news = News::findById($_GET['id']);
    if ($news)
    try {
        //delete and redirect.
        $news->delete();
        Utility::redirect("news.php"); 
    } catch (PDOException $e) {
        Utility::redirect("index.php");  
    } 
}
// save news in database
if (isset($_POST['send_news'])) {
    $news = new News();

    $news->text = $_POST['text'];

    try {
        if ($news->create()) 
        {
            Utility::redirect("news.php");
        }
    } catch (PDOException $e) {
        Utility::redirect("index.php");
        
    }
    
}
// get news from database
$newses = News::findAll();
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
                            خبر ها <small>صفحه مدیریت</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-users"></i>  اخبار
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form action="" method="post">
                            <div class="panel panel-primary">
                                <div class="panel-heading">افزودن خبر</div>
                                <div class="panel-body">
                                        <div class="form-group">
                                            <label for="text"> متن خبر </label>
                                            <textarea name="text" id="" cols="30" rows="10" class="form-control" placeholder="متن خبر را وارد کنید" name="text"></textarea>
                                        </div>
                                </div>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-block btn-primary" name="send_news">افزودن</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <table class="table table-hover table-responsive table-dark">
                            <thead>
                                <tr>
                                    <th>آیدی</th>
                                    <th>متن</th>
                                    <th>تاریخ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if ($newses):  ?>
                                <?php foreach ($newses as $news): ?>
                                    <tr>
                                        <td><?= $news->id; ?></td>
                                        <td><?= $news->text; ?></td>
                                        <td><?= $news->created_at; ?></td>
                                        <td><a class="btn btn-danger" href="?action=delete&id=<?= $news->id; ?>">حذف</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
 
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include('views/footer.php'); ?>
