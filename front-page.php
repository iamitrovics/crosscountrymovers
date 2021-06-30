<?php 
/**
 * Homepage / Front Page
**/
get_header(); ?>

    <header id="hero-banner">
        <?php
        $imageID = get_field('hero_image_home');
        $image = wp_get_attachment_image_src( $imageID, 'header-image' );
        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
        ?> 

        <img class="img-responsive hero-img header-desk" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />     

        <?php
        $imageID = get_field('hero_image_mobile_home');
        $image = wp_get_attachment_image_src( $imageID, 'headermobile-image' );
        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
        ?> 

        <img class="hero-img header-mob" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

        <div class="caption">
            <div class="container">
                <div class="caption__holder">
                    <h1><?php the_field('main_title_hero_home'); ?></h1>
                    <p><?php the_field('hero_text_home'); ?></p>
                </div>
            </div>
        </div>
    </header>
    <!-- /.hero-banner -->

    <?php include(TEMPLATEPATH . '/booking-div.php'); ?>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h2><?php the_field('main_title_services_home'); ?></h2>
                        <?php the_field('intro_text_services_home'); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="services-list">

                        <?php if( have_rows('services_list_home') ): ?>
                            <?php while( have_rows('services_list_home') ): the_row(); ?>

                                <div class="service-box">
                                    <a href="<?php the_sub_field('link_to_service'); ?>">
                                        <div class="service-image">
                                            <img src="<?php the_sub_field('icon'); ?>">
                                        </div>
                                        <h3><?php the_sub_field('title'); ?></h3>
                                        <div class="service-text">
                                            <?php the_sub_field('description'); ?>
                                        </div>
                                        <div class="service-cta">Learn more</div>
                                    </a>
                                </div>
                                <!-- /.service-box -->

                            <?php endwhile; ?>
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

    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <h2><?php the_field('main_title_why_content', 'options'); ?></h2>
                        <?php the_field('text_intro_why_general', 'options'); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <div class="features-in">
            <div class="container">
                <div class="three-box">

                    <?php if( have_rows('content_blocks_why', 'options') ): ?>
                        <?php while( have_rows('content_blocks_why', 'options') ): the_row(); ?>

                            <div class="box">
                                <div class="box-left"><?php the_sub_field('icon'); ?></div>
                                <div class="box-right">
                                    <h4><?php the_sub_field('title'); ?></h4>
                                    <?php the_sub_field('content_block'); ?>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
                <div class="img-wrapper" style="background-image: url('<?php the_field('background_image_why_gen', 'options'); ?>');">
                </div>
            </div>
        </div>
        <!-- /.features-in -->
    </section>
    <!-- /#features -->

    <section class="testimonials">
        <div class="container">  
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <h2><?php the_field('main_title_home_test_home'); ?></h2>
                        <?php the_field('intro_text_test_home'); ?>
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
                $post_objects = get_field('choose_reviews_home');

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

        </div>
        <!-- /.review-slider -->
    </section>

    <?php include(TEMPLATEPATH . '/inc/bottomcta-inc.php'); ?>

<?php get_footer(); ?>