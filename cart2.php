<?php

use classes\Product;
use classes\Utility;

include('tmp-inc/header-main.php'); ?> 

    <div class="master-wrapper">
     
	<?php
	// delete product from shopping cart
	if (filter_input(INPUT_GET, 'action') == 'delete') {
		
		// loop throgh items in $_SESSION['cart'] until find the product by id
		foreach ($_SESSION['cart'] as $key => $product) {
			if ($product['id'] == filter_input(INPUT_GET, 'id')) {
				// remove product from $_SESSION['cart'] by $_GET['id']
				unset($_SESSION['cart'][$key]);
			}
		}
		// reset $_SESSION['cart'] keys so they match with $product_ids of array
		$_SESSION['cart'] = array_values($_SESSION['cart']);
		Utility::redirect("cart.php");
		
		
	} 
 	?>
    <?php 
	// create order details 
	if (isset($_GET['next_step'])) {
		
	}
	?>
    
    
    <div class="container">
        <div class="row">
            
            <!--  ==========  -->
            <!--  = Main content =  -->
            <!--  ==========  -->
            <section class="span12">
                
                <div class="checkout-container">
                    <div class="row">
                    	<div class="span10 offset1">
                    	    
                    	    <!--  ==========  -->
							<!--  = Header =  -->
							<!--  ==========  -->
                    		<header>
                    		    <div class="row">
                    		    	<div class="span2">
                    		    		<a href="<?= SITE_URL . DS . "index.php"; ?>"><img src="images/logo-bw.png" alt="Webmarket Logo" width="48" height="48" /></a>
                    		    	</div>
                    		    	<div class="span6">
                    		    	    <div class="center-align">
                    		    	        <h1><span class="light">(کارت به کارت)</span> پرداخت</h1>
                    		    	    </div>
                    		    	</div>
                    		    	<div class="span2">
                    		    	    <div class="right-align">
                    		    	    	<img src="images/buttons/security.jpg" alt="Security Sign" width="92" height="65" />
                    		    	    </div>
                    		    	</div>
                    		    </div>
                    		</header>
                    		
                    		<!--  ==========  -->
							<!--  = Steps =  -->
							<!--  ==========  -->
                    		<br>
                            <br>
                            
                            <p>
                                لطفا مبلغ کل در سبد خرید را به کارت زیر واریز کرده و در مرحله بعد کد رهگیری پرداخت را وارد کنید : 
                            </p>
                            <p>
                            <?= PAY_CART['number']; ?>  به نام : <?= PAY_CART['name']; ?>
                            </p>


							<div style="margin-top: 330px; color:red;">
								<p>
									توجه داشته باشید در مراحل پرداخت از دکمه بازگشت مرورگر استفاده نکنید.
								</p>
								<p>
									در صورت بروز هرگونه مشکل از بخش تماس با ما با کارشناسان ما ارتباط بگیرید.
								</p>
							</div>
							<hr />
							<div class=""></div>
							<p class="right-align">
							    در صورت پرداخت موفق به صفحه بعدی رفته و کد رهگیری را وارد کنید
							    <a href="cart3.php" class="btn btn-primary higher bold">ادامه</a>
							</p>
                    	</div>
                    </div>
                </div>
                
                
            </section> <!-- /main content -->
        
        </div>
    </div> <!-- /container -->
    
     
    
     
    </div> <!-- end of master-wrapper -->
    


    <!--  ==========  -->
    <!--  = JavaScript =  -->
    <!--  ==========  -->
    
    <!--  = FB =  -->
<?php include('tmp-inc/footer-main.php'); ?>