<?php
use classes\Product;
use classes\Utility;
use classes\Order;
use classes\Order_detail;
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
							<?php	
							if (isset($_POST['send_track_code'])) {
								$track_code = $_POST['track_code'];
                                if (isset($_SESSION['order_detail']) && !empty($_SESSION['order_detail'])) {
                                    $_SESSION['order_detail']['track_code'] = $track_code;
                                    $order = new Order();
                                    $order->user_id     = $_SESSION['order_detail']['user_id'];
                                    $order->total_price = $_SESSION['order_detail']['total_price'];
									$order->track_code  = $_SESSION['order_detail']['track_code'];
									// Utility::dd($order->makeOrder($_SESSION['order_detail']['prodcuts']));
									if ($order->makeOrder($_SESSION['order_detail']['prodcuts'])) {
										unset($_SESSION['cart']);
										unset($_SESSION['order_detail']);
										echo "<script>alert('سفارش شما با موفقیت ثبت شد پس از تایید به آدرسی که در بخش کاربری خود ثبت کرده اید ارسال خواهد شد');</script>";
										// echo "<script>alert(\"'window.location.href = \"";'\");</script>";
										// sleep(5);
										Utility::redirect("index.php");
									}
                                }
							}
							?>
                            <form action="" method="POST">
                                <label for="cart">
                                    کد رهگیری را وارد کنید
                                </label>
                                <div class="controls">
                                    <input type="text" class="input-block-level" name="track_code">
                                </div>
								<div class="controls">
                                    <input type="submit" class="btn btn-primary higher bold" name="send_track_code" value="تایید و ثبت خرید">
                                </div>
                            </form>                          
                            <p style="margin-top: 400px;"></p>
		
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