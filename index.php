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
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="push-up over-slider blocks-spacer">
                    <!--  ==========  -->
                    <!--  = Three Banners =  -->
                    <!--  ==========  -->
                    <div class="row">
                        <div class="span4">
                            <a href="#" class="btn btn-block banner">
                                <span class="title"><span class="light">فروش</span> تابستانی</span>
                                <em>تا 60% تخفیف روی کفش ها</em>
                            </a>
                        </div>
                        <div class="span4">
                            <a href="#" class="btn btn-block colored banner">
                                <span class="title"><span class="light">ارسال</span> رایگان</span>
                                <em>برای خرید های بیش از 69000 تومان</em>
                            </a>
                        </div>
                        <div class="span4">
                            <a href="#" class="btn btn-block banner">
                                <span class="title"><span class="light">محصولات</span> جدید</span>
                                <em>از محصولات جدید دیدن کنید.</em>
                            </a>
                        </div>
                    </div> <!-- /three banners -->
                </div>
            </div>
        </div>
        
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
                    <div class="slide">
                        <div class="row">
                    	 
                        <?php   
                        $products = classes\Product::findAllWhere([['cat_id', '=', 1]]);
                        ?>
                    	
                    	 
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
    	            	        		    <a href="#" class="btn buy btn-danger">خرید</a>
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
                    	 
                	            	
    	            	<!--  ==========  -->
    					<!--  = Product =  -->
    					<!--  ==========  -->
    	            	<div class="span4">
    	            	    <div class="product">
    	            	        <div class="product-img featured">
    	            	            <div class="picture">
    	            	        	    <img src="images/dummy/featured-products/featured-1.png" alt="" width="518" height="358" />
    	            	        		<div class="img-overlay">
    	            	        		    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
    	            	        		    <a href="#" class="btn buy btn-danger">خرید</a>
    	            	        		</div>
    	            	            </div>
    	            	        </div>
    	            	        <div class="main-titles">
    	            	            <h4 class="title">$41</h4>
    	            	            <h5 class="no-margin">محصول ویژه 515</h5>
    	            	        </div>
    	            	        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
    	            	        <p class="center-align stars">
                    	            <span class="icon-star stars-clr"></span>
                    	            <span class="icon-star stars-clr"></span>
                    	            <span class="icon-star stars-clr"></span>
                    	            <span class="icon-star stars-clr"></span>
                    	            <span class="icon-star stars-clr"></span>
                    	             
                    	        </p>
    	            	    </div>
                	      </div> <!-- /product -->
    	            	 
                    	 
                    	
                    	 
                	            	
    	            	<!--  ==========  -->
    					<!--  = Product =  -->
    					<!--  ==========  -->
    	            	<div class="span4">
    	            	    <div class="product">
    	            	        <div class="product-img featured">
    	            	            <div class="picture">
    	            	        	    <img src="images/dummy/featured-products/featured-2.png" alt="" width="518" height="358" />
    	            	        		<div class="img-overlay">
    	            	        		    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
    	            	        		    <a href="#" class="btn buy btn-danger">خرید</a>
    	            	        		</div>
    	            	            </div>
    	            	        </div>
    	            	        <div class="main-titles">
    	            	            <h4 class="title">$107</h4>
    	            	            <h5 class="no-margin">محصول ویژه 690</h5>
    	            	        </div>
    	            	        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
    	            	        <p class="center-align stars">
                    	            <span class="icon-star stars-clr"></span>
                    	            <span class="icon-star stars-clr"></span>
                    	            <span class="icon-star"></span>
                    	            <span class="icon-star"></span>
                    	            <span class="icon-star"></span>
                    	             
                    	        </p>
    	            	    </div>
                	      </div> <!-- /product -->
    	            	 
                    	 
                    	
                    	 
                	            	
    	            	<!--  ==========  -->
    					<!--  = Product =  -->
    					<!--  ==========  -->
    	            	<div class="span4">
    	            	    <div class="product">
    	            	        <div class="product-img featured">
    	            	            <div class="picture">
    	            	        	    <img src="images/dummy/featured-products/featured-3.png" alt="" width="518" height="358" />
    	            	        		<div class="img-overlay">
    	            	        		    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
    	            	        		    <a href="#" class="btn buy btn-danger">خرید</a>
    	            	        		</div>
    	            	            </div>
    	            	        </div>
    	            	        <div class="main-titles">
    	            	            <h4 class="title">$61</h4>
    	            	            <h5 class="no-margin">محصول ویژه 405</h5>
    	            	        </div>
    	            	        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
    	            	        <p class="center-align stars">
                    	            <span class="icon-star stars-clr"></span>
                    	            <span class="icon-star stars-clr"></span>
                    	            <span class="icon-star stars-clr"></span>
                    	            <span class="icon-star"></span>
                    	            <span class="icon-star"></span>
                    	             
                    	        </p>
    	            	    </div>
                	      </div> <!-- /product -->
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
            
            <div class="row popup-products blocks-spacer">
                  
                 
                <!--  ==========  -->
                <!--  = Product =  -->
                <!--  ==========  -->   
            	<div class="span3">
            	    <div class="product">
            	        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-6.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 434</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                             
                        </p>
            	    </div>
            	</div> <!-- /product -->
            	
            	 
            	  
                 
                <!--  ==========  -->
                <!--  = Product =  -->
                <!--  ==========  -->   
            	<div class="span3">
            	    <div class="product">
            	        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-7.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 414</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                             
                        </p>
            	    </div>
            	</div> <!-- /product -->
            	
            	 
            	  
                 
                <!--  ==========  -->
                <!--  = Product =  -->
                <!--  ==========  -->   
            	<div class="span3">
            	    <div class="product">
            	        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-8.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 450</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                             
                        </p>
            	    </div>
            	</div> <!-- /product -->
            	
            	 
            	  
                 
                <!--  ==========  -->
                <!--  = Product =  -->
                <!--  ==========  -->   
            	<div class="span3">
            	    <div class="product">
            	        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-9.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 186</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                             
                        </p>
            	    </div>
            	</div> <!-- /product -->
            	
            	<div class="clearfix"></div> 
            	  
                 
                <!--  ==========  -->
                <!--  = Product =  -->
                <!--  ==========  -->   
            	<div class="span3">
            	    <div class="product">
            	        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-10.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 258</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                             
                        </p>
            	    </div>
            	</div> <!-- /product -->
            	
            	 
            	  
                 
                <!--  ==========  -->
                <!--  = Product =  -->
                <!--  ==========  -->   
            	<div class="span3">
            	    <div class="product">
            	        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-11.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 128</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                             
                        </p>
            	    </div>
            	</div> <!-- /product -->
            	
            	 
            	  
                 
                <!--  ==========  -->
                <!--  = Product =  -->
                <!--  ==========  -->   
            	<div class="span3">
            	    <div class="product">
            	        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-12.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 156</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                             
                        </p>
            	    </div>
            	</div> <!-- /product -->
            	
            	 
            	  
                 
                <!--  ==========  -->
                <!--  = Product =  -->
                <!--  ==========  -->   
            	<div class="span3">
            	    <div class="product">
            	        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/products/product-13.jpg" alt="" width="540" height="374" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 218</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                             
                        </p>
            	    </div>
            	</div> <!-- /product -->
            	
            	 
            	 
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
    	                <h2 class="title"><span class="light">محبوبترین</span>محصولات فروشگاه</h2>
    	            </div>
    	    	</div>
    	    </div> <!-- /title -->
    	    
	    	<div class="row popup-products">
	    	     
	    	     
	    	            
		        <!--  ==========  -->
				<!--  = Product =  -->
				<!--  ==========  -->
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/most-popular-products/popular-1.jpg" alt="" width="540" height="412" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 456</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                             
                        </p>
                    </div>
                </div> <!-- /product -->
                 
	    	     
	    	            
		        <!--  ==========  -->
				<!--  = Product =  -->
				<!--  ==========  -->
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/most-popular-products/popular-2.jpg" alt="" width="540" height="412" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 280</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                             
                        </p>
                    </div>
                </div> <!-- /product -->
                 
	    	     
	    	            
		        <!--  ==========  -->
				<!--  = Product =  -->
				<!--  ==========  -->
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/most-popular-products/popular-3.jpg" alt="" width="540" height="412" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 158</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                             
                        </p>
                    </div>
                </div> <!-- /product -->
                 
	    	     
	    	            
		        <!--  ==========  -->
				<!--  = Product =  -->
				<!--  ==========  -->
                <div class="span3">
                    <div class="product">
                        <div class="product-img">
                            <div class="picture">
                                <img src="images/dummy/most-popular-products/popular-4.jpg" alt="" width="540" height="412" />
                                <div class="img-overlay">
                                    <a href="#" class="btn more btn-primary">توضیحات بیشتر</a>
                                    <a href="#" class="btn buy btn-danger">اضافه به سبد خرید</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles no-margin">
                            <h4 class="title">$32</h4>
                            <h5 class="no-margin">محصول ویژه 275</h5>
                        </div>
                        <p class="desc">توضیحاتی که در مورد محصول لازم است را در اینجا مینویسید</p>
                        <p class="center-align stars">
                            <span class="icon-star stars-clr"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                             
                        </p>
                    </div>
                </div> <!-- /product -->
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
