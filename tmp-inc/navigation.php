    <!--  ==========  -->
    <!--  = Main Menu / navbar =  -->
    <!--  ==========  -->
    <div class="navbar navbar-static-top" id="stickyNavbar">
      <div class="navbar-inner">
        <div class="container">
          <div class="row">
            <div class="span9">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                
                <!--  ==========  -->
                <!--  = Menu =  -->
                <!--  ==========  -->
                <div class="nav-collapse collapse">
                  <ul class="nav" id="mainNavigation">
                    <li class="dropdown active">
                        <a href="index.php"> خانه</a>
                    </li>
                    
                    <li class="dropdown">
                        <a href="shop.html" class="dropdown-toggle"> فروشگاه <b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                        <?php foreach(classes\Category::findAll() as $cat): ?>
                            <li><a href="#"><?= $cat->title; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="blog.html" class="dropdown-toggle">بلاگ <b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li><a href="404.html">صفحه 404</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="features.html" class="dropdown-toggle">امکانات <b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li><a href="icons.html">آیکن ها</a></li>
                            <li class="dropdown">
                                <a href="features.html" class="dropdown-toggle"><i class="icon-caret-left pull-right visible-desktop"></i> همه امکانات</a>
                                <ul class="dropdown-menu">
                                    <li><a href="features.html#headings">سرخط ها</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="about-us.html">درباره ما</a></li>
                    <li><a href="contact.html">تماس با ما</a></li>
                  </ul>
                  
                  <!--  ==========  -->
                  <!--  = Search form =  -->
                  <!--  ==========  -->
                  <form class="navbar-form pull-right" action="#" method="get">
                      <button type="submit"><span class="icon-search"></span></button>
                      <input type="text" class="span1" name="search" id="navSearchInput">
                  </form>
                </div><!-- /.nav-collapse -->
            </div>
            
            <!--  ==========  -->
            <!--  = Cart =  -->
            <!--  ==========  -->
            <div class="span3">
                <div class="cart-container" id="cartContainer">
                    <div class="cart">
                        <p class="items">سبد خرید <span class="dark-clr">(3)</span></p>
                        <p class="dark-clr hidden-tablet">$1816.90</p>
                        <a href="checkout-step-1.html" class="btn btn-danger">
                            <!-- <span class="icon icons-cart"></span> -->
                            <i class="icon-shopping-cart"></i>
                        </a>
                    </div>
                    <div class="open-panel">
                         
                        <div class="item-in-cart clearfix">
                            <div class="image">
                                <img src="images/dummy/cart-items/cart-item-1.jpg" width="124" height="124" alt="cart item" />
                            </div>
                            <div class="desc">
                                <strong><a href="product.html">کلاه زمستانی</a></strong>
                                <span class="light-clr qty">
                                    تعداد : 1
                                    &nbsp;
                                    <a href="#" class="icon-remove-sign" title="Remove Item"></a>
                                </span>
                            </div>
                            <div class="price">
                                <strong>$4957</strong>
                            </div>
                        </div>
                         
                        <div class="item-in-cart clearfix">
                            <div class="image">
                                <img src="images/dummy/cart-items/cart-item-2.jpg" width="124" height="124" alt="cart item" />
                            </div>
                            <div class="desc">
                                <strong><a href="product.html">کمربند اسپورت</a></strong>
                                <span class="light-clr qty">
                                    تعداد : 1
                                    &nbsp;
                                    <a href="#" class="icon-remove-sign" title="Remove Item"></a>
                                </span>
                            </div>
                            <div class="price">
                                <strong>$1318</strong>
                            </div>
                        </div>
                         
                        <div class="item-in-cart clearfix">
                            <div class="image">
                                <img src="images/dummy/cart-items/cart-item-3.jpg" width="124" height="124" alt="cart item" />
                            </div>
                            <div class="desc">
                                <strong><a href="product.html">کیف پول مردانه</a></strong>
                                <span class="light-clr qty">
                                    تعداد : 1
                                    &nbsp;
                                    <a href="#" class="icon-remove-sign" title="Remove Item"></a>
                                </span>
                            </div>
                            <div class="price">
                                <strong>$3840</strong>
                            </div>
                        </div>
                         
                        <div class="summary">
                            <div class="line">
                                <div class="row-fluid">
                                    <div class="span6">هزینه ارسال :</div>
                                    <div class="span6 align-right">$4.99</div>
                                </div>
                            </div>
                            <div class="line">
                                <div class="row-fluid">
                                    <div class="span6">جمع کل :</div>
                                    <div class="span6 align-right size-16">$357.81</div>
                                </div>
                            </div>
                        </div>
                        <div class="proceed">
                            <a href="checkout-step-1.html" class="btn btn-danger pull-right bold higher">تصویه حساب <i class="icon-shopping-cart"></i></a>
                            <small>هزینه ارسال بر اساس منطقه جغرافیایی محاسبه میشود. <a href="#">اطلاعات بیشتر</a></small>
                        </div>
                    </div>
                </div>
            </div> <!-- /cart -->
          </div>
        </div>
      </div>
    </div> <!-- /main menu -->
    