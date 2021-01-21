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
                            داشبورد <small>صفحه اصلی</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                <pre style="direction: ltr;">
                    <?php
                        use classes\Product;

                        // $p = Product::findAll();
                        // // var_dump($p);
                        // $pr = Product::findById(1);
                        // var_dump($pr);
                        // var_dump(Product::properties());

                        // $pp = Product::findById(3);
                        $pp = new Product();
                        // $id, $title, $description, $price, $photo, $stock, $created_at
                        $pp->title = "My 465464 P Title";
                        $pp->description = "My 33 P Description";
                        $pp->price = 320000;
                        $pp->photo = "My asd2322 P Photo";
                        $pp->stock = 849;

                        // date() C:/xampp/htdocs/shop/uploads/products/Capture.PNG
                        $path = UPLOAD_DIR . DS . "products/1.PNG";
                        
                        // var_dump($pp->save());
                    ?>
                </pre>
                </div>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php include('views/footer.php'); ?>
