<?php
/**
 * Template Name: Estimate Template
 */

get_header(); ?>

    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h2 class="no-top--padding">Free Estimate</h2>        
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>


<div class="moving-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>What are you moving?</h1>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div id="moving-forms">
        <div class="container">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link scroll" id="home-choose-tab" data-toggle="tab" href="#home-choose" role="tab" aria-controls="home-choose" aria-selected="true">
                        <img src="<?php bloginfo('template_directory'); ?>/img/ico/move-house.png" alt="">
                        <h3>Home</h3>
                        <div class="icon-success">
                            <span class="path1"></span><span class="path2"></span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link scroll" id="car-choose-tab" data-toggle="tab" href="#car-choose" role="tab" aria-controls="car-choose" aria-selected="false">
                        <img src="<?php bloginfo('template_directory'); ?>/img/ico/move-car.svg" alt="">
                        <h3>Car</h3>
                        <div class="icon-success">
                            <span class="path1"></span><span class="path2"></span>
                        </div>
                    </a>
                </li> 
            </ul>
            <!-- /.nav-tabs -->

            <div class="tab-content">
                <div class="tab-pane fade" id="home-choose" role="tabpanel" aria-labelledby="home-choose-tab" style="display:none;">

                    <div class="form-wrapper">
                        <?php echo do_shortcode('[contact-form-7 id="2454" title="Blog Form Home Moving"]'); ?>
                    </div>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane fade" id="car-choose" role="tabpanel" aria-labelledby="car-choose-tab">

                    <div class="form-wrapper">
                        <?php echo do_shortcode('[contact-form-7 id="2455" title="Blog Form Car Moving"]'); ?>
                    </div>

                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.moving-forms -->
</div>
<!-- /.moving-body -->

<?php get_footer(); ?>