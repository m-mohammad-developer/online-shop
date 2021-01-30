<?php $slides = classes\Slider::findAll(); ?>
    <!--  ==========  -->
    <!--  = Slider Revolution =  -->
    <!--  ==========  -->
    <div class="fullwidthbanner-container"> 
        <div class="fullwidthbanner">
            <ul>
            <?php foreach ($slides as $slide): ?>
                <li data-transition="premium-random" data-slotamount="3">
                    <img src="<?= SITE_URL . DS . $slide->path; ?>" alt="slider img" width="1400" height="377" />    
                </li><!-- /slide -->            
            <?php endforeach; ?>
             
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
        <!--  ==========  -->
        <!--  = Nav Arrows =  -->
        <!--  ==========  -->
        <div id="sliderRevLeft"><i class="icon-chevron-left"></i></div>
        <div id="sliderRevRight"><i class="icon-chevron-right"></i></div>
    </div> <!-- /slider revolution -->
