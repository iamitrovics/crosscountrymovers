<?php
/*
 * Template Name: Featured Article
 * Template Post Type: post
 */
  
 get_header();  ?>
 
    <header id="hero-banner">

        <?php 
        $values = get_field( 'header_image_city_page' );
        if ( $values ) { ?>

            <?php
            $imageID = get_field('header_image_city_page');
            $image = wp_get_attachment_image_src( $imageID, 'header-image' );
            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
            ?> 

            <img class="img-responsive hero-img header-desk" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />   

        <?php 
        } else { ?>

            <img class="img-responsive hero-img header-desk" alt="<?php echo $alt_text; ?>" src="<?php bloginfo('template_directory'); ?>/img/headers/hero-img.jpg" />  

        <?php } ?>

        <?php 
        $values = get_field( 'header_image_mobile_city_page' );
        if ( $values ) { ?>

            <?php
            $imageID = get_field('header_image_mobile_city_page');
            $image = wp_get_attachment_image_src( $imageID, 'headermobile-image' );
            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
            ?> 

            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

        <?php 
        } else { ?>

            <img class="hero-img header-mob" alt="<?php echo $alt_text; ?>" src="<?php bloginfo('template_directory'); ?>/img/headers/hero-img-mob.jpg" />  

        <?php } ?>
                


        <div class="caption">
            <div class="container">
                <div class="caption__holder">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </header>
    <!-- /.hero-banner -->

    <?php include(TEMPLATEPATH . '/booking-div.php'); ?>
    
    <div id="featured-article">
        
        <?php if( have_rows('content_sections_featured') ): ?>
            <?php while( have_rows('content_sections_featured') ): the_row(); ?>
                <?php if( get_row_layout() == 'intro_text' ): ?>

                    <div class="intro-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="intro">
                                        <?php the_sub_field('intro_content'); ?>
                                    </div>
                                    <!-- /.intro -->
                                    <div class="featured-image">
                                        <?php
                                        $imageID = get_sub_field('featured_image');
                                        $image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php the_sub_field('alt_image'); ?>" src="<?php echo $image[0]; ?>" /> 
                                        <small><?php the_sub_field('image_caption'); ?></small>
                                    </div>
                                    <!-- // featured image  -->
                                    <div class="intro">
                                        <?php the_sub_field('bottom_content'); ?>
                                    </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- // wrapper  -->
                </div>

                <?php elseif( get_row_layout() == 'toc' ): ?>

                    <div class="toc-wrapper">
                        <div class="container">

                            <h3><?php the_sub_field('toc_title'); ?></h3>
                            <ul>
                                <?php if( have_rows('toc_items') ): ?>
                                    <?php while( have_rows('toc_items') ): the_row(); ?>

                                    <li><a href="#<?php the_sub_field('anchor'); ?>"><?php the_sub_field('label'); ?></a></li>

                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>

                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- // toc wrapper  -->

                <?php elseif( get_row_layout() == 'full_width_content' ): ?>

                    <?php if (get_sub_field('background_type') == 'White') { ?>
                        <div class="full-content-wrapper" id="<?php the_sub_field('section_id'); ?>">
                    <?php } elseif (get_sub_field('background_type') == 'Cream') { ?>
                        <div class="full-content-wrapper cream-bg" id="<?php the_sub_field('section_id'); ?>">
                    <?php } elseif (get_sub_field('background_type') == 'Orange') { ?>
                        <div class="full-content-wrapper orange-bg" id="<?php the_sub_field('section_id'); ?>">
                    <?php } ?>   
                   
                        <div class="container">
                            <div class="text-block">
                                <?php the_sub_field('content_block'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- // ful wrapper  -->

                <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                       <div class="featured-image">
                            <?php
                            $imageID = get_sub_field('featured_image');
                            $image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                            ?> 

                            <img class="img-responsive" alt="<?php the_sub_field('alt_image'); ?>" src="<?php echo $image[0]; ?>" /> 
                            <small><?php the_sub_field('image_caption'); ?></small>
                        </div>
                        <!-- // featured image  -->         
                        
                    <?php elseif( get_row_layout() == 'video' ): ?>

                        <div class="video-holder">
                            <?php the_sub_field('video_code'); ?>
                        </div>
                        <!-- // video holder  -->

                    <?php elseif( get_row_layout() == 'features' ): ?>

                        <?php if (get_sub_field('background_type') == 'White') { ?>
                            <div class="features-wrapper">
                        <?php } elseif (get_sub_field('background_type') == 'Cream') { ?>
                            <div class="features-wrapper cream-bg">
                        <?php } ?>                           

                        
                            <div class="container">
                                <div class="features-inner">

                                    <?php if( have_rows('features_list') ): ?>
                                        <?php while( have_rows('features_list') ): the_row(); ?>

                                            <div class="feat-card">
                                                <i class="fal fa-check-circle"></i>
                                                <?php the_sub_field('content_text'); ?>
                                            </div>

                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                </div>
                                <!-- // feat inner  -->
                            </div>
                            <!-- // container  -->
                        </div>
                        <!-- // wrapper  -->

                     <?php elseif( get_row_layout() == 'accordion' ): ?>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="faq-title"><?php the_sub_field('faq_title'); ?></h2>
                                    <div class="services-accordion__in">

                                        <?php if( have_rows('accordion_list') ): ?>
                                            <?php while( have_rows('accordion_list') ): the_row(); ?>

                                                <div class="faq-wrap">
                                                    <h3><?php the_sub_field('question'); ?></h3>
                                                    <div>
                                                        <?php the_sub_field('answer'); ?>
                                                    </div>
                                                </div>
                                                <!-- /.faq-wrap -->

                                            <?php endwhile; ?>
                                        <?php endif; ?>

                                    </div>
                                    <!-- /.services-accordion__in -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- // conainer  -->

                     <?php elseif( get_row_layout() == 'conclusion' ): ?>

                        <div class="conclusion-wrapper" id="<?php the_sub_field('section_id'); ?>">
                            <div class="container">
                                <div class="conc-inner">
                                    <?php the_sub_field('block_text'); ?>
                                </div>
                            </div>
                        </div>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>
    <!-- // featured article  -->

   
    <?php include(TEMPLATEPATH . '/inc/bottomcta-inc.php'); ?>    
    
<?php
get_footer();
