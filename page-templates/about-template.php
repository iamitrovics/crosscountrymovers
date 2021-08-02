<?php
/**
 * Template Name: About Template
 */

get_header(); ?>

    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h2><?php the_field('main_title_about_header'); ?></h2>        
                        <?php the_field('intro_text_about_header'); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

    <div id="about-page">
        <section class="about-content">
            <div class="container">
                <div class="about-featured">

                    <?php
                    $imageID = get_field('about_featured_about_page');
                    $image = wp_get_attachment_image_src( $imageID, 'video-image' );
                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                    ?> 

                    <div class="about-featured-box" style="background-image: url(<?php echo $image[0]; ?>);"></div>
                    <!-- /.about-video-box -->
                </div>
                <!-- /.about-featured -->
                <div class="about-text">
                    <div class="about-box">
                        <h3><?php the_field('main_title_about_content_page'); ?></h3>
                        <?php the_field('content_block_about_page_content'); ?>
                    </div>
                    <!-- /.about-box -->
                </div>
                <!-- /.about-content -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.about-content -->
    </div>
    <!-- /#about-page -->

    <?php include(TEMPLATEPATH . '/inc/bottomcta-inc.php'); ?>

<?php get_footer(); ?>