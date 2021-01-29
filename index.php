﻿<?php

use classes\Product;
use classes\Utility;

include('tmp-inc/header-main.php'); ?> 
<!-- Body Start -> in main-header -->
    
    <!-- Main Wrapper ************START************* --->
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
    <!--  = Slider Revolution =  -->
    <!--  ==========  -->
    <?php include('tmp-inc/banner-slider.php'); ?>
    <!--  ==========  -->
    <!--  = Main container =  -->
    <!--  ==========  -->
    <div class="container">
        <br>
        <br>
        <br>
        <!--  ==========  -->
        <!--  = Featured Items =  -->
        <!--  ==========  -->
        <div class="row featured-items blocks-spacer">
            <div class="span12">
                <!--  ==========  -->
                <!--  = Title =  -->
                <!--  ==========  -->
            	<div class="main-titles lined">
            	    <h2 class="title"><span class="light">محصولات</span> ویژه</h2>
            	    <div class="arrows">
                        <a href="#" class="icon-chevron-right" id="featuredItemsRight"></a>
                        <a href="#" class="icon-chevron-left" id="featuredItemsLeft"></a>
                    </div>
            	</div>
            </div>
            
            <div class="span12">
                <!--  ==========  -->
                <!--  = Carousel =  -->
                <!--  ==========  -->
                
                <div class="carouFredSel" data-autoplay="false" data-nav="featuredItems">
                <?php   $products = classes\Product::findAllWhere([['cat_id', '=', 1]]); ?>
                    <div class="slide">
                        <div class="row">
                    	 
                    	 
                	    <?php foreach ($products as $product): ?>
    	            	<!--  ==========  -->
    					<!--  = Product =  -->
    					<!--  ==========  -->
    	            	<div class="span4">
    	            	    <div class="product">
    	            	        <div class="product-img featured">
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

            	    <div class="slide">
            	        <div class="row">
                
                        </div> 
                	</div>
                </div> <!-- /carousel -->
            </div>
            
        </div>
    </div> <!-- /container -->
    
    <!--  ==========  -->
    <!--  = New Products =  -->
    <!--  ==========  -->
    <div class="boxed-area blocks-spacer">
        <div class="container">
            
            <!--  ==========  -->
            <!--  = Title =  -->
            <!--  ==========  -->
            <div class="row">
                <div class="span12">
                    <div class="main-titles lined">
                    	<h2 class="title"><span class="light">محصولات</span> جدید فروشگاه</h2>
                    </div>
                </div>
            </div> <!-- /title -->
            <?php   $products = classes\Product::findAllWhere([['created_at', '>', Utility::getLastTime(15)]]); ?>
                
            <div class="row popup-products blocks-spacer">
                  
            <?php foreach ($products as $product): ?>
                <!--  ==========  -->
                <!--  = Product =  -->
                <!--  ==========  -->    
            	<div class="span6">
            	    <div class="product">
            	        <div class="product-img">
                            <div class="picture">
                                <img src="<?php echo $product->getPhotoPath(); ?>" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="product.php?id=<?= $product->id; ?>" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="product.php?id=<?= $product->id; ?>" class="btn buy btn-danger">اضافه به سبد خرید</a>
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
            	<div class="clearfix"></div>             	     
            </div>
        </div>
    </div> <!-- /new products -->
    
    <!--  ==========  -->
    <!--  = Most Popular products =  -->
    <!--  ==========  -->
    <div class="most-popular blocks-spacer">
    	<div class="container">
    	    
    	    <!--  ==========  -->
			<!--  = Title =  -->
			<!--  ==========  -->
    	    <div class="row">
    	    	<div class="span12">
    	    	    <div class="main-titles lined">
    	                <h2 class="title"><span class="light">پر فروش ترین</span>محصولات فروشگاه</h2>
    	            </div>
    	    	</div>
    	    </div> <!-- /title -->
    	    
	    	<div class="row popup-products">
                <?php  ?>
                <?php $pop_products = Product::findAllWhere([['id', '>', 1]], null, 'desc', 'buy_count') ?>
                <?php foreach ($pop_products as $product): ?>
                <!--  ==========  -->
                <!--  = Product =  -->
                <!--  ==========  -->
                <div class="span6">
                    <div class="product">
                        <div class="product-img featured">
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
    </div> <!-- /most popular -->
    
    <!--  ==========  -->
    <!--  = Lastest News =  -->
    <!--  ==========  -->
    <?php include('tmp-inc/news.php'); ?>

    <!--  ==========  -->
    <!--  = Brands Carousel =  -->
    <!--  ==========  -->
    <?php include('tmp-inc/brands.php'); ?>
     
    <!--  ==========  -->
    <!--  = Footer =  -->
    <!--  ==========  -->
    <?php include('tmp-inc/footer-body.php'); ?>

    </div> <!-- end of master-wrapper -->
    <!-- Main Wrapper ************END************* --->
    <!--  ==========  -->
    <!--  = JavaScript =  -->
    <!--  ==========  -->
<!-- Body End -> in main-footer -->
<?php include('tmp-inc/footer-main.php'); ?>