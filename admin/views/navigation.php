<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="ُindex.php"> پنل مدیریت</a>
                <a class="navbar-brand" target="blank" href="../index.php"> مشاهده سایت</a>
            </div>




            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['admin_info']['name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php" ><i class="fa fa-fw fa-power-off"></i><span class="text-danger"> خروج از حساب </span></a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> داشبورد</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#cat"><i class="fa fa-fw fa-arrows-v"></i> دسته بندی ها <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cat" class="collapse">
                            <li>
                                <a href="categories.php"> مشاهده</a>
                            </li>
                            <li>
                                <a href="categories.php?action=add-categories"> افزودن</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#product"><i class="fa fa-fw fa-arrows-v"></i>  محصولات <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="product" class="collapse">
                            <li>
                                <a href="products.php"> مشاهده</a>
                            </li>
                            <li>
                                <a href="products.php?action=add-products"> افزودن</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-users"></i>  کاربران <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="users.php"> مشاهده کاربران معمولی</a>
                            </li>
                            <li>
                                <a href="users.php?action=view-admins"> مشاهده ادمین ها</a>
                            </li>
                            <li>
                                <a href="users.php?action=add-users"> افزودن</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="orders.php"><i class="fa fa-fw fa-"></i> سفارشات</a>
                    </li>

                    <li>
                        <a href="slider.php"><i class="fa fa-fw fa-sliders"></i> اسلایدر</a>
                    </li>

                    <li>
                        <a href="news.php"><i class="fa fa-fw fa-hacker-news"></i> اخبار</a>
                    </li>

                    <li>
                        <a href="contact_page.php"><i class="fa fa-fw fa-hacker-news"></i> تماس با ما / درباره ما</a>
                    </li>

                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>