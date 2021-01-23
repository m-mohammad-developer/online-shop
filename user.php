<?php include('tmp-inc/header-main.php'); ?>
<?php include('tmp-inc/bootstrap4.php'); ?>

    <div id="wrapper">
        <!-- naviation start -->
    
        <!-- naviation end -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <pre>
                    <?php 
                    var_dump($_SESSION['user_info']);
                    ?>

                </pre>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include('tmp-inc/footer-main.php'); ?>