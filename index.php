<?php use classes\Product, classes\Utility; ?>
<?php include('tmp-inc/header-main.php'); ?> 
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
    <div class="container" style="padding: 100px; border-bottom: 5px solid #ff0000; border-top: 5px solid red; border-radius: 100px; margin-top: 40px; margin-bottom: 10px;">
        <!--  ==========  -->
        <!--  = Featured Items =  -->
        <!--  ==========  -->
        <div class="row featured-items blocks-spacer">
            <div class="span12">
                <!--  ==========  -->
                <!--  = Title =  -->
                <!--  ==========  -->
            	<div class="main-titles lined">
            	    <a href="category.php?id=1"><h2 class="title"><span class="light">محصولات</span> ویژه</h2></a>
            	</div>
            </div>
            
            <div class="span12">
                <!--  ==========  -->
                <!--  = Carousel =  -->
                <!--  ==========  -->
                
                <div class="carouFredSel" data-autoplay="false" data-nav="featuredItems">
                <?php   $products = classes\Product::findAllWhere([['cat_id', '=', 1]], 9); ?>
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
    	            	            <h4 class="title"><?= number_format($product->price); ?> تومان</h4>
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
    
   
    <div class="container" style="padding: 70px; background: #f2f7fb; border-radius: 100px;">
        <!--  ==========  -->
        <!--  = Featured Items =  -->
        <!--  ==========  -->
        <div class="row featured-items blocks-spacer">
            <div class="span12">
                <!--  ==========  -->
                <!--  = Title =  -->
                <!--  ==========  -->
            	<div class="main-titles lined">
            	    <h2 class="title"><span class="light">محصولات</span> جدید</h2>
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
                    <?php   $products = classes\Product::findAllWhere([['created_at', '>', Utility::getLastTime(15)]], 9); ?>
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
    	            	            <h4 class="title"><?= number_format($product->price); ?> تومان</h4>
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
    
    <br /><br /><br /><br />
    <!--  ==========  -->
    <!--  = Most Popular products =  -->
    <!--  ==========  -->
    <div class="container" style="padding: 70px; background: #f2f7fb; border-radius: 100px;">
        <!--  ==========  -->
        <!--  = Featured Items =  -->
        <!--  ==========  -->
        <div class="row featured-items blocks-spacer">
            <div class="span12">
                <!--  ==========  -->
                <!--  = Title =  -->
                <!--  ==========  -->
            	<div class="main-titles lined">
            	    <h2 class="title"><span class="light">محصولات</span> پرفروش</h2>
            	</div>
            </div>
            
            <div class="span12">
                <!--  ==========  -->
                <!--  = Carousel =  -->
                <!--  ==========  -->
                <div class="carouFredSel" data-autoplay="false" data-nav="featuredItems">
                    <?php $pop_products = Product::findAllWhere([['id', '>', 1]], 12    , 'desc', 'buy_count') ?>
                    <div class="slide">
                        <div class="row">
                	    <?php foreach ($pop_products as $product): ?>
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
    	            	            <h4 class="title"><?= number_format($product->price); ?> تومان</h4>
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
    
    <br /><br /><br /><br />
    
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