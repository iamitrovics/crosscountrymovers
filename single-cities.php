<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>


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
                    <h1><?php the_field('main_title_city_single'); ?></h1>
                </div>
            </div>
        </div>
    </header>
    <!-- /.hero-banner -->

    <?php include(TEMPLATEPATH . '/booking-div.php'); ?>


    <div class="areas-detailed">

    <?php if( get_field('intro_text_city_single') ): ?>
        <section class="areas-detailed__video">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="intro">
                            <h2><?php the_field('main_title_city_singlerica'); ?></h2>
                            <?php the_field('intro_text_city_single'); ?>
                        </div>
                        <!-- /.intro -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="video-box">
                        <?php if( get_field('video_url_city_singlerica') ): ?>
                            <a class="various fancybox.iframe" href="<?php the_field('video_url_city_singlerica'); ?>?autoplay=1">
                            <?php endif; ?>
                                <?php
                                $imageID = get_field('featured_image_city_singlerica');
                                $image = wp_get_attachment_image_src( $imageID, 'servicebig-image' );
                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                ?> 

                                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                <?php if( get_field('video_url_city_singlerica') ): ?>
                                <i class="icon-play"></i>
                                <?php endif; ?>

                                <?php if( get_field('video_url_city_singlerica') ): ?>
                                </a>
                                <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.areas-detailed__video -->
        <?php endif; ?>


        <?php if( have_rows('content_layout_city') ): ?>
        <section class="city__main">
            <div class="container">
                        
                    <?php while( have_rows('content_layout_city') ): the_row(); ?>
                        <?php if( get_row_layout() == 'full_widh_content' ): ?>

                            <div class="city__main--full">
                                <?php the_sub_field('content_block'); ?>
                            </div>
                            
                        <?php elseif( get_row_layout() == 'content_left_image_right' ): ?>

                        <?php elseif( get_row_layout() == 'image_left_content_right' ): ?>

                        <?php elseif( get_row_layout() == 'faq' ): ?>
                            

                            <div class="services-accordion accordion__narrow">

                                <div class="services-accordion__in">

                                    <?php if( get_field('main_title_faq') ): ?>
                                        <h2><?php the_sub_field('main_title_faq'); ?></h2>
                                    <?php endif; ?>

                                    <?php if( have_rows('faq_list') ): ?>
                                        <?php while( have_rows('faq_list') ): the_row(); ?>

                                            <div class="faq-wrap">
                                                <h3><?php the_sub_field('question') ;?></h3>
                                                <div class="faq-content">
                                                    <?php the_sub_field('answer'); ?>
                                                </div>
                                            </div>
                                            <!-- /.faq-wrap -->

                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                </div>
                                <!-- /.services-accordion__in -->       
                        
                        </div>

                        <?php elseif( get_row_layout() == 'full_widh_image' ): ?>
                            
                            <div class="city__main--image">
                                <?php
                                $imageID = get_sub_field('featured_image_full');
                                $image = wp_get_attachment_image_src( $imageID, 'servicebig-image' );
                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                ?> 

                                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />                             
                            </div>
                            <!-- // image  -->

                        <?php endif; ?>
                    <?php endwhile; ?>

            </div>
        </section>
        <!-- // city main  -->

        <?php endif; ?>


        <?php if( get_field('main_title_content_city') ): ?>
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="intro">
                            <h2><?php the_field('main_title_content_city'); ?></h2>
                            <?php the_field('intro_text_city_intro_single_content'); ?>
                        </div>
                        <!-- /.intro -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="services-list">

                            <?php
                                $post_objects = get_field('services_list_single');

                                if( $post_objects ): ?>
                                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                        <?php setup_postdata($post); ?>

                                        <div class="service-box">
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="service-image"><img src="<?php the_field('icon_service'); ?>"></div>
                                                <h3><?php the_title(); ?></h3>
                                                <div class="service-text">
                                                    <?php the_field('short_services_text'); ?>
                                                </div>
                                                <div class="service-cta">Learn more</div>
                                            </a>
                                        </div>
                                        <!-- /.service-box -->

                                    <?php endforeach; ?>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>

                        </div>
                        <!-- /.services-list -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /#services -->
        <?php endif; ?>

        <section class="testimonials">
            <div class="container">  
                <div class="row">
                    <div class="col-md-12">
                        <div class="intro">

                            <?php 
                            $values = get_field( 'main_title_test_city' );
                            if ( $values ) { ?>
                                <h2><?php the_field('main_title_test_city'); ?></h2>
                            <?php 
                            } else { ?>
                                <h2><?php the_field('main_title_test_gen', 'options'); ?></h2>
                            <?php } ?>
                                                     
                            <?php 
                            $values = get_field( 'intro_text_test_test_city' );
                            if ( $values ) { ?>
                                <?php the_field('intro_text_test_test_city'); ?>
                            <?php 
                            } else { ?>
                                <?php the_field('intro_text_test_gen', 'options'); ?>
                            <?php } ?>

                        </div>
                        <!-- /.intro -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
            <div class="review-slider" id="review-slider">

                <?php 
                $values = get_field( 'choose_reviews_city_single' );
                if ( $values ) { ?>

                    <?php
                        $post_objects = get_field('choose_reviews_city_single');

                        if( $post_objects ): ?>
                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                <?php setup_postdata($post); ?>

                                    <a href="#" target="_blank" class="read-more">
                                        <div class="reviewBox">
                                            <div class="review__top">
                                                <div class="review__left" >
                                                    <span class="author"><?php the_title(); ?></span>
                                                    <span class="location"><?php the_field('place_reviwer'); ?></span>
                                                </div>
                                                <div class="review__right">
                                                    <div class="stars">
                                                    <?php if (get_field('score_reviwer') == '4') { ?>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                    <?php } elseif (get_field('score_reviwer') == '4.5') { ?>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                    <?php } elseif (get_field('score_reviwer') == '5') { ?>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                    <?php } ?>   
                                                    </div>
                                                    <div class="source">
                                                        <!-- yelp here -->
                                                        <?php if (get_field('network_reviwer') == 'Yelp') { ?>
                                                            <img alt="" src="<?php bloginfo('template_directory'); ?>/img/ico/yelp-t.svg">
                                                        <?php } elseif (get_field('network_reviwer') == 'Trustpilot') { ?>
                                                            <img alt="" src="<?php bloginfo('template_directory'); ?>/img/ico/trustpilot-t.svg">
                                                        <?php } ?>   
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review__main">
                                                <div class="title">
                                                    <h4><?php the_title(); ?></h4>
                                                </div>
                                                <div class="content">
                                                    <?php the_field('review_content_box'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                            <?php endforeach; ?>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>

                <?php 
                } else { ?>

                    <?php
                    $loop = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => 15) ); ?>  
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <a href="#" target="_blank" class="read-more">
                            <div class="reviewBox">
                                <div class="review__top">
                                    <div class="review__left" >
                                        <span class="author"><?php the_title(); ?></span>
                                        <span class="location"><?php the_field('place_reviwer'); ?></span>
                                    </div>
                                    <div class="review__right">
                                        <div class="stars">
                                        <?php if (get_field('score_reviwer') == '4') { ?>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                        <?php } elseif (get_field('score_reviwer') == '4.5') { ?>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                        <?php } elseif (get_field('score_reviwer') == '5') { ?>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                            <li><i class="icon-star"></i></li>
                                        <?php } ?>   
                                        </div>
                                        <div class="source">
                                            <!-- yelp here -->
                                            <?php if (get_field('network_reviwer') == 'Yelp') { ?>
                                                <img alt="" src="<?php bloginfo('template_directory'); ?>/img/ico/yelp-t.svg">
                                            <?php } elseif (get_field('network_reviwer') == 'Trustpilot') { ?>
                                                <img alt="" src="<?php bloginfo('template_directory'); ?>/img/ico/trustpilot-t.svg">
                                            <?php } ?>   
                                        </div>
                                    </div>
                                </div>
                                <div class="review__main">
                                    <div class="title">
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                                    <div class="content">
                                        <?php the_field('review_content_box'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>     

                <?php } ?>

            </div>
            <!-- /.review-slider -->
        </section>

        <?php if( get_field('main_title_faq_city_single') ): ?>
        <section class="services-accordion" id="areas-accordion">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="intro">
                            <h2><?php the_field('main_title_faq_city_single'); ?></h2>
                        </div>
                        <!-- /.intro -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="services-accordion__in">

                            <?php if( have_rows('faq_list_repe_city') ): ?>
                                <?php while( have_rows('faq_list_repe_city') ): the_row(); ?>

                                    <div class="faq-wrap">
                                        <h3><?php the_sub_field('quesiton') ;?></h3>
                                        <div class="faq-content">
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
            <!-- /.container -->
        </section>
        <!-- /.services-accordion -->
        <?php endif; ?>

    </div>
    <!-- /.areas-detailed -->
   
    <?php include(TEMPLATEPATH . '/inc/bottomcta-inc.php'); ?>

<?php
get_footer();
