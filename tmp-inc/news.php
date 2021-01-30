    <!--  ==========  -->
    <!--  = Lastest News =  -->
    <!--  ==========  -->
    <div class="darker-stripe blocks-spacer more-space latest-news with-shadows">
    	<div class="container">
    	    
    	    <!--  ==========  -->
			<!--  = Title =  -->
			<!--  ==========  -->
    		<div class="row">
    			<div class="span12">
    			    <div class="main-titles center-align">
    			        <h2 class="title">
    			            <span class="clickable icon-chevron-right" id="tweetsRight"></span> &nbsp;&nbsp;&nbsp;
    			            <span class="light">آخرین</span> خبر ها &nbsp;&nbsp;&nbsp;
    			            <span class="clickable icon-chevron-left" id="tweetsLeft"></span>
			            </h2>
    			    </div>
    			</div>
    		</div> <!-- /title -->
    		
    		<!--  ==========  -->
			<!--  = News content =  -->
			<!--  ==========  -->
    		<div class="row">
    		    <div class="span12">
    		        <div class="carouFredSel" data-nav="tweets" data-autoplay="false">
    		            <?php $newses = classes\News::findAll(); ?>      
		                <!--  ==========  -->
						<!--  = Slide =  -->
						<!--  ==========  --> 
						<?php if ($newses): ?>
							<?php foreach ($newses as $news): ?>
								<div class="slide">
									<div class="row">
										<div class="span12">
											<div class="news-item">
												<div class="published"><?= $news->created_at; ?></div>
												<p><?= $news->text; ?></p>
											</div>
										</div>
									</div>
								</div> <!-- /slide -->
							<?php endforeach; ?>
                        <?php endif; ?>
                    </div>
    		    </div>
    		</div> <!-- /news content -->
    	</div>
    </div> <!-- /latest news -->
    