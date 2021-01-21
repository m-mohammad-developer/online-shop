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
                            محصولات <small>صفحه مدیریت</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> محصولات
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php

                if (isset($_GET['action'])) 
                    $source = $_GET['action'];
                else 
                    $source = "";

                
                switch ($source) {
                    case 'add-products':
                        include(VIEW_PATH . "products/add-products.php");
                        break;
                    
                    default:
                        include(VIEW_PATH . "products/view-products.php");
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
