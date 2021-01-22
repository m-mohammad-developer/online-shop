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
                            کاربر ها <small>صفحه مدیریت</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-users"></i> کاربران سایت
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
                    case 'add-users':
                        include(VIEW_PATH . "users/add-users.php");
                        break;
                case 'view-admins':
                    include(VIEW_PATH . "users/view-admins.php");
                    break;
                case 'edit-users':
                    include(VIEW_PATH . "users/edit-users.php");
                    break;
                    default:
                        include(VIEW_PATH . "users/view-users.php");
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
