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
                    		    		<a href="index.html"><img src="images/logo-bw.png" alt="Webmarket Logo" width="48" height="48" /></a>
                    		    	</div>
                    		    	<div class="span6">
                    		    	    <div class="center-align">
                    		    	        <h1><span class="light">بازبینی</span> سبد خرید</h1>
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
                    		<div class="checkout-steps">
                    		    <div class="clearfix">
                    		    	<div class="step active">
                    		    	    <div class="step-badge">1</div>
                    		    	    سبد خرید
                    		    	</div>
                    		    	<div class="step">
                    		    	    <div class="step-badge">2</div>
                    		    	    آدرس ارسال
                    		    	</div>
                    		    	<div class="step">
                                        <div class="step-badge">3</div>
                                        شیوه پرداخت
                                    </div>
                    		    	<div class="step">
                    		    	    <div class="step-badge">4</div>
                    		    	    تایید و وارد کردن کد رهگیری
                    		    	</div>
                    		    </div>
                    		</div> <!-- /steps -->
                    		
                    		<!--  ==========  -->
							<!--  = Selected Items =  -->
							<!--  ==========  -->
							<table class="table table-items">
							    <thead>
							    	<tr>
							    		<th colspan="2">آیتم</th>
							    		<th><div class="align-center">تعداد</div></th>
							    		<th><div class="align-right">قیمت</div></th>
							    		<th><div class="align-right">قیمت کل</div></th>
							    	</tr>
							    </thead>
							    <tbody>
								<?php
								
								if(!empty($_SESSION['cart'])):
									$total = 0;

									foreach ($_SESSION['cart'] as $key => $pr):

										$product = Product::findById($pr['id']);
								?>
										<tr>
											<td class="image"><img src="<?= $product->getPhotoPath(); ?>" alt="" width="124" height="124" /><a title="حذف محصول" class="btn btn-danger" href="cart.php?action=delete&id=<?= $product->id; ?>"> حذف </a></td>
											<td class="desc"> <?= $product->title; ?> </td>
											<td class="qty">
												<?= $pr['quantity']; ?>
											</td>
											<td class="price">
												<?= number_format($product->price); ?> تومان
											</td>
											<td class="price">
												<?= number_format($product->price * $pr['quantity']); ?> تومان
											</td>
										</tr>
									<?php
									$total = $total + ($product->price * $pr['quantity']);
									endforeach; 
									?>
							        <tr>
							        	<td colspan="2" rowspan="2">
							        	    <div class=""></div>
							        	</td>
							        </tr>
							        <tr>
							        	<td class="stronger">جمع کل :</td>
							        	<td class="stronger"><div class="size-16 align-right"><?= number_format($total); ?> تومان</div></td>
									</tr>
									<?php else: ?>
										<tr>سبد خرید خالی است</tr>
									<?php endif; ?>
							    </tbody>
							</table>
							
							<hr />
							
							<p class="right-align">
							    در مرحله بعد جزیات سفارش را می بینید.
							    <a href="checkout-step-2.html" class="btn btn-primary higher bold">ادامه</a>
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