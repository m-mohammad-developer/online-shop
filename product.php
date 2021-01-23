<?php include('tmp-inc/header-main.php'); ?> 
<?php
use classes\Utility, classes\Product, classes\Category; 
if (!isset($_GET['id']) || empty($_GET['id']))  {
    Utility::redirect("index.php");
}

$product = Product::findById($_GET['id']);
$product_cat = Category::findById($product->cat_id);
?>
<!-- Body Start -> in main-header -->


    <div class="master-wrapper">
     
    <!--  ==========  -->
    <!--  = Header =  -->
    <!--  ==========  -->
    <?php include('tmp-inc/header-body.php'); ?> 
    
    <!--  ==========  -->
    <!--  = Main Menu / navbar =  -->
    <!--  ==========  -->
    <?php include('tmp-inc/navigation.php'); ?> 

    <!--  ==========  -->
    <!--  = Breadcrumbs =  -->
    <!--  ==========  -->
    <div class="darker-stripe">
        <div class="container">
        	<div class="row">
        		<div class="span12">
        		    <ul class="breadcrumb">
	                    <li>
	                        <a href="index.html">وبمارکت</a>
	                    </li>
	                    <li><span class="icon-chevron-right"></span></li>
	                    <li>
	                        <a href="shop.html">فروشگاه</a>
	                    </li>
	                    <li><span class="icon-chevron-right"></span></li>
	                    <li>
	                        <a href="#"><?= $product_cat->title; ?></a>
	                    </li>
	                    
	                </ul>
        		</div>
        	</div>
        </div>
    </div>

    <!--  ==========  -->
    <!--  = Main container =  -->
    <!--  ==========  -->
    <div class="container">
        <div class="push-up top-equal blocks-spacer">
            
            <!--  ==========  -->
            <!--  = Product =  -->
            <!--  ==========  -->
            <div class="row blocks-spacer">
                
                <!--  ==========  -->
                <!--  = Preview Images =  -->
                <!--  ==========  -->
                <div class="span5">
                    <div class="product-preview">
                        <div class="picture">
                            <img src="<?= $product->getPhotoPath(); ?>" alt="" width="940" height="940" id="mainPreviewImg" />
                        </div>
                    </div>
                </div>
                
                <!--  ==========  -->
                <!--  = Title and short desc =  -->
                <!--  ==========  -->
                <div class="span7">
                    <div class="product-title">
                        <h1 class="name"><span class="light"></span><?= $product->title; ?></h1>
                        <div class="meta">
                            <span class="tag"><?= $product->price; ?> تومان</span>
                            <span class="stock">
                            <?php if ($product->stock == 0) : ?>
                                <span class="btn btn-danger">اتمام موجودی</span>
                            <?php else: ?>
                                <span class="btn btn-success">موجود</span> 
                            <?php endif; ?>

                            </span>
                        </div>
                    </div>
                    <div class="product-description">
                        <p>
                        <?= substr($product->description, 0, 400); ?> ...
                        </p>
                        <hr />
                        
                        <!--  ==========  -->
                        <!--  = Add to cart form =  -->
                        <!--  ==========  -->
                        <?php
                        // if (isset($_POST['add_to_cart'])) {
                        //     $pr_id    = $_POST['product_id'];
                        //     $pr_conut = $_POST['product_count'];
                        //     $is_in_cart = false;
                        //     if (isset($_SESSION['cart'])) {
                        //         foreach ($_SESSION['cart'] as $cart) {
                        //             foreach ($cart as $key => $val) {
                        //                 if ($key == $pr_id) {
                        //                     $is_in_cart = true;
                        //                     break;
                        //                 }
                        //             }
                        //         }
                        //     }   

                        //     if (!$is_in_cart) {
                        //         $_SESSION['cart'] = array(
                        //             $pr_id => $pr_conut
                        //         );
                        //         echo "<script>alert('محصول مورد نظر با موفقیت به سبد خرید اضافه شد');</script>";
                        //     } else {
                        //         echo "<script>alert('محصول مورد نظر در سبد خرید وجود دارد');</script>";
                        //         // die;
                        //     }

                        // }

                        // check if add-to-cart button is submitted
                        if (isset($_POST['add_to_cart'])) {
                            $pr_id    = $_POST['product_id'];
                            $pr_conut = $_POST['product_count'];
                            
                            // check if session['cart'] exists
                            if (isset($_SESSION['cart'])) {

                                // get count of added products to $_SESSION
                                $count = count($_SESSION['cart']);

                                // get products id's from $_SESSION['cart']
                                $product_ids = array_column($_SESSION['cart'], 'id');

                                // add prodcut to $_SESSION if not exists
                                if (!in_array($pr_id, $product_ids)) {
                                    $_SESSION['cart'][$count] = [
                                        'id'       => $_POST['product_id'],
                                        'quantity' => $_POST['product_count']
                                    ];
                                    echo "<script>alert('محصول مورد نظر با موفقیت به سبد خرید اضافه شد');</script>";

                                } 
                                else {
                                    // increase the quantity of existing product
                                    for ($i=0; $i < count($product_ids); $i++) { 
                                        if ($product_ids[$i] == $pr_id) {
                                            $_SESSION['cart'][$i]['quantity'] += $pr_conut;
                                            echo "<script>alert('تعداد مورد نظر در سبد خرید افزوده شد');</script>";
                                        }
                                    }

                                }

                            } else {
                                // if $_SESSION['cart'] doesn't exist create $_SESSION['cart]
                                // for first product with array key 0

                                $_SESSION['cart'][0] = [
                                    'id'       => $_POST['product_id'],
                                    'quantity' => $_POST['product_count']
                                ];
                                echo "<script>alert('محصول مورد نظر با موفقیت به سبد خرید اضافه شد');</script>";
                                
                            }
                            
                            Utility::dd($_SESSION);


                        }

                         

                        ?>
                        <?php if(isset($_SESSION['user_info'])): ?>
                        <form action="" class="form form-inline clearfix" method="post">
                            <div class="numbered">
                                <input type="hidden" value="<?= $product->id; ?>" name="product_id">
                            	<input type="text" value="1" class="tiny-size" name="product_count"/>
                            	<span class="clickable add-one icon-plus-sign-alt"></span>
                            	<span class="clickable remove-one icon-minus-sign-alt"></span>
                            </div>
                            &nbsp;
                            <button type="submit" class="btn btn-danger pull-right" name="add_to_cart"><i class="icon-shopping-cart"></i> اضافه به سبد خرید</button>
                        </form>
                        <?php else: ?>
                            <div>برای خرید باید ابتدا وارد شوید</div>
                        <?php endif; ?>
                        
                        <hr />
                      
                        
                    </div>
                </div>

            </div>
            
            <!--  ==========  -->
            <!--  = Tabs with more info =  -->
            <!--  ==========  -->
            <div class="row">
                <div class="span12">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab-1" data-toggle="tab">جزئیات</a>
                        </li>
                        <li>
                            <a href="#tab-2" data-toggle="tab">نظرات</a>
                        </li>
                        
                    </ul>
                    <div class="tab-content">
                        <div class="fade in tab-pane active" id="tab-1">
                           <?= $product->description; ?>
                        </div>
                        
                        <div class="fade tab-pane" id="tab-2">
                            <p>
                                لورم ایپسوم متنی است که ساختگی برای طراحی و چاپ آن مورد اراااحی   رد.  
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- /container -->
    
    <!--  ==========  -->
    <!--  = Related Products =  -->
    <!--  ==========  -->
    <div class="boxed-area no-bottom">
        <div class="container">
            
            <!--  ==========  -->
            <!--  = Title =  -->
            <!--  ==========  -->
            <div class="row">
                <div class="span12">
                    <div class="main-titles lined">
                    	<h2 class="title"><span class="light">محصولات</span> مرتبط</h2>
                    </div>
                </div>
            </div>
            
            <!--  ==========  -->
            <!--  = Related products =  -->
            <!--  ==========  -->
            <div class="row popup-products">

            <?php   $products = classes\Product::findAllWhere([['cat_id', '=', $product->cat_id, 1, 'asc']]); ?>
            <?php foreach ($products as $product): ?>
    	            	<!--  ==========  -->
    					<!--  = Product =  -->
    					<!--  ==========  -->
    	            	<div class="span4">
    	            	    <div class="product">
    	            	        <div class="product-img">
    	            	            <div class="picture">
    	            	        	    <img src="<?php echo $product->getPhotoPath(); ?>" alt="" width="518" height="358" />
    	            	        		<div class="img-overlay">
    	            	        		    <a href="product.php?id=<?= $product->id; ?>" class="btn more btn-primary">توضیحات بیشتر</a>
    	            	        		    <a href="product.php?id=<?= $product->id; ?>" class="btn buy btn-danger">خرید</a>
    	            	        		</div>
    	            	            </div>
    	            	        </div>
    	            	        <div class="main-titles">
    	            	            <h4 class="title"><?= $product->price; ?> تومان</h4>
    	            	            <h5 class="no-margin"><?= $product->title; ?></h5>
    	            	        </div>
    	            	        <p class="desc"><?= substr($product->description, 0, 56); ?></p>
    	            	    </div>
                	      </div> <!-- /product -->
                    	<?php endforeach; ?>
                    	
            
              
            	
            </div>
        </div>
    </div>
    
    <?php include('tmp-inc/footer-body.php'); ?>
     
    </div> <!-- end of master-wrapper -->

<!-- Body End -> in main-footer -->
<?php include('tmp-inc/footer-main.php'); ?>

    