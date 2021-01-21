<?php include('views/header.php'); ?>



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
                            دسته بندی محصولات <small>صفحه مدیریت</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> دسته بندی ها
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php

                if (isset($_GET['action'])) 
                    $action = $_GET['action'];
                else 
                    $action = "";

                
                switch ($action) {
                    case 'add-categories':
                        include(VIEW_PATH . "categories/add-categories.php");
                        break;
                    case 'edit-categories':
                        include(VIEW_PATH . "categories/edit-categories.php");
                        break;
                    
                    default:
                        include(VIEW_PATH . "categories/view-categories.php");
                        break;
                }



                ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include('views/footer.php'); ?>
