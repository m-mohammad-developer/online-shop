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
                        <a href="<?= SITE_URL . DS . "index.php"; ?>"> خانه</a>
                    </li>
                    
                    <li class="dropdown">
                        <a href="<?= SITE_URL . DS . "category.php?id=-1"; ?>" class="dropdown-toggle"> فروشگاه <b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                        <?php foreach(classes\Category::findAll() as $cat): ?>
                            <li><a href="<?= SITE_URL . DS . "category.php"; ?>?id=<?= $cat->id; ?>"><?= $cat->title; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </li>
                    
                    <li><a href="<?= SITE_URL . DS . "about-us.php"; ?>">درباره ما</a></li>
                    <li><a href="<?= SITE_URL . DS . "contact-us.php"; ?>">تماس با ما</a></li>
                    <?php if (isset($_SESSION['user_info'])): ?>
                    <li><a href="<?= SITE_URL . DS . "user.php"; ?>"> ناحیه کاربری</a></li>
                    <?php endif; ?>
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
                        <p class="items"><a href="cart.php">مشاهده سبد خرید</a></p>
                        <a href="checkout-step-1.html" class="btn btn-danger">
                            <!-- <span class="icon icons-cart"></span> -->
                            <i class="icon-shopping-cart"></i>
                        </a>
                    </div>
                    
                </div>
            </div> <!-- /cart -->
          </div>
        </div>
      </div>
    </div> <!-- /main menu -->
    