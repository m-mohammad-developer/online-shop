    <!--  ==========  -->
    <!--  = Footer =  -->
    <!--  ==========  -->
    <footer>
        <!--  ==========  -->
        <!--  = Upper footer =  -->
        <!--  ==========  -->
        <div class="foot-light">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <h2 class="pacifico">Alix &nbsp; <img src="images/webmarket.png" alt="Webmarket Cart" class="align-baseline" /></h2>
                        <p>این یک نوشته آزمایشی است. شما میتوانید این قسمت را با نوشته های دلخواه خود که مناسب این ناحیه باشند پر نمایید. ما این بخش را با نوشته هایی بی معنی پر کرده ایم.</p>
                    </div>
                    
                </div>
            </div>
        </div> <!-- /upper footer -->
        
        <!--  ==========  -->
        <!--  = Middle footer =  -->
        <!--  ==========  -->
        <div class="foot-dark">
            <div class="container">
                <div class="row">
                    
                    <!--  ==========  -->
                    <!--  = Menu 1 =  -->
                    <!--  ==========  -->
                    <div class="span12">
                        <div class="main-titles lined">
                            <h3 class="title"><span class="light">ناوبری</span> اصلی</h3>
                        </div>
                        <ul class="nav bold">
                            <li><a href="index.php">خانه</a></li>
                            <li><a href="about-us.php">تماس با ما</a></li>
                            <li><a href="contact-us.php">درباره ما</a></li>
                            <li><a href="<?= SITE_URL . DS . "admin/"; ?>"> ورود به بخش مدیریت</a></li>
                        </ul>
                    </div>
                        
                </div>
            </div>
			
        </div> <!-- /middle footer -->
        
        <!--  ==========  -->
        <!--  = Bottom Footer =  -->
        <!--  ==========  -->
        <div class="foot-last">
            <a href="#" id="toTheTop">
                <span class="icon-chevron-up"></span>
            </a>
            <div class="container">
                <div class="row" style="text-align: center;">
                    <div class="span12">
                        &copy; Copyright 2021 alix online shop
                    </div>
                </div>
            </div>
        </div> <!-- /bottom footer -->
    </footer> <!-- /footer -->



    <!--  ==========  -->
    <!--  = Modal Windows =  -->
    <!--  ==========  -->
    
    <!--  = Login =  -->
    <div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="loginModalLabel"><span class="light">ورود</span> به بخش کاربری</h3>
        </div>
        <div class="modal-body">
            <form method="post" action="login.php">
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputEmail">ایمیل</label>
                    <div class="controls">
                        <input type="text" class="input-block-level" id="inputEmail" placeholder="ایمیل خود را وارد کنید" name="email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputPassword">رمز عبور</label>
                    <div class="controls">
                        <input type="password" class="input-block-level" id="inputPassword" placeholder="پسورد خود را وارد کنید" name="password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-primary input-block-level bold higher" name="login_user">
                    ورود
                </button>   
            </form>
            <p class="center-align push-down-0">
                <a href="#" data-dismiss="modal">رمز عبورتان را فراموش کرده اید؟</a>
            </p>
        </div>
    </div>
    
    <!--  = Register =  -->

    <!-- <div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="registerModalLabel"><span class="light">عضویت</span> در وبمارکت</h3>
        </div>
        <div class="modal-body">
            <form method="post" action="#">
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputUsernameRegister">نام کاربری</label>
                    <div class="controls">
                        <input type="text" class="input-block-level" id="inputUsernameRegister" placeholder="Username">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputEmailRegister">ایمیل</label>
                    <div class="controls">
                        <input type="email" class="input-block-level" id="inputEmailRegister" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label hidden shown-ie8" for="inputPasswordRegister">رمز عبور</label>
                    <div class="controls">
                        <input type="password" class="input-block-level" id="inputPasswordRegister" placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-danger input-block-level bold higher">
                    عضویت
                </button>
            </form>
            <p class="center-align push-down-0">
                <a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">قبلا ثبت نام کرده اید؟</a>
            </p>
            
        </div>
    </div> -->
    
    