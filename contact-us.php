<?php

use classes\Contact;

include('tmp-inc/header-main.php'); ?>

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
    <!--  = Breadcrumbs =  -->
    <!--  ==========  -->
    <div class="darker-stripe">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index.php">وبمارکت</a>
                        </li>
                        <li><span class="icon-chevron-right"></span></li>
                        <li>
                            <a href="contact-us.php">  درباره ما</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="push-up top-equal blocks-spacer-last">
            <div class="row">
                
                <!--  ==========  -->
                <!--  = Main Title =  -->
                <!--  ==========  -->
                
                <div class="span12">
                    <div class="title-area">
                        <h1 class="inline"><span class="light"> درباره ما </span> بدانید</h1>
                    </div>
                </div>
                
                <!--  ==========  -->
                <!--  = Main content =  -->
                <!--  ==========  -->
                <section class="span8 single single-page">
                    
                    <!--  ==========  -->
                    <!--  = Post =  -->
                    <!--  ==========  -->
                    <article class="post">
                        <div class="post-inner">
                            <p>
								<?= SITE_INFO['about']; ?>
                            </p>
                        </div>
                    </article>
                    
                    <hr />
                    
                    <!--  ==========  -->
                    <!--  = Contact Form =  -->
                    <!--  ==========  -->
                    <section class="contact-form-container">
                        
                        <h3 class="push-down-25"><span class="light">ارسال</span> پیام</h3>
                        <?php 
                        if (isset($_POST['send_message']))
                        {
                            $contact = new Contact();
                            $contact->name = $_POST['author'];
                            $contact->email = $_POST['email'];
                            $contact->text = $_POST['message'];
                            if ($contact->create())
                            {
                                echo "<script>alert('پیام شما با موفقیت ارسال شد و به زودی پاسخ آن به ایمیل شما ارسال میشود.');</script>";
                                echo "<script>location.replace('index.php');</script>";
                            }
                        }
                        ?>
                        <form id="commentform" method="post" action="" class="form form-inline form-contact">
                            <p class="push-down-20">
                                <label for="author"> نام <span class="red-clr bold"> * </span></label>
                                <input type="text" aria-required="true" tabindex="1" size="30" value="" id="author" name="author" required>
                            </p>
                            <p class="push-down-20">
                                <label for="email"> ایمیل <span class="red-clr bold"> * </span></label>
                                <input type="email" aria-required="true" tabindex="2" size="30" value="" id="email" name="email" required>
                            </p>
                            
    
                            <p class="push-down-20">
                                <textarea class="input-block-level" tabindex="4" rows="7" cols="70" id="comment" name="message" placeholder="پیامتان را در اینجا بنویسید ..." required></textarea>
                            </p>
                            <p>
                                <button class="btn btn-primary bold" type="submit" tabindex="5" id="submit" name="send_message">ارسال پیام</button>
                            </p>
                        </form>
                    </section>
                    
                    <hr />
                    
                    <!--  ==========  -->
                    <!--  = Company Info with Google Maps =  -->
                    <!--  ==========  -->
                    <article class="company-info">
                        <div class="row">
                        	<div class="span3">
                        		<h3 class="push-down-30"><span class="light">اطلاعات</span> شرکت</h3>
                        		    
                        		<p>
                        		    <strong class="opensans dark-clr">شماره تماس :</strong> <?= SITE_INFO['phone']; ?>
                        		    <br />
                        		    <strong class="opensans dark-clr">ایمیل:</strong> <a href="#"><?= SITE_INFO['email']; ?></a>
                        		</p>
                        	</div>
                    </article>
                </section> <!-- /main content -->
                
                <!--  ==========  -->
                <!--  = Sidebar =  -->
                <!--  ==========  -->
                <aside class="span4">

                </aside> <!-- /sidebar -->

            </div>
        </div>
    </div> <!-- /container -->
    <!--  ==========  -->
    <!--  = Footer =  -->
    <!--  ==========  -->
    <?php include('tmp-inc/footer-body.php'); ?>

    </div> <!-- end of master-wrapper -->
    
<?php include('tmp-inc/footer-main.php'); ?>
  