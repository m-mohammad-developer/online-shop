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
                            سفارش ها <small>صفحه مدیریت</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> سفارشات
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
                    case 'view-order':
                        include(VIEW_PATH . "orders/view-order.php");
                        break;
                
                    default:
                        include(VIEW_PATH . "orders/view-orders.php");
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
