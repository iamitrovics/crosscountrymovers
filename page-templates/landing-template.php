<?php
/**
 * Template Name: Landing Template
 */

get_header('new'); ?>

    <header id="lp-hero">
        <div class="container">
            <div class="hero-text">
                <h1><?php the_field('main_title_lp_hero'); ?></h1>
                <h2><?php the_field('subtitle_lp_hero'); ?></h2>
                <?php the_field('hero_list_lp'); ?>
                <div class="awards">
                    <?php if( have_rows('awards_list_hero_lp') ): ?>
                        <?php while( have_rows('awards_list_hero_lp') ): the_row(); ?>

                            <div class="award">
                                <a href="<?php the_sub_field('link'); ?>" target="_blank">
                                    <img src="<?php the_sub_field('logo'); ?>" alt="">
                                </a>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <!-- // awrds  -->
            </div>
            <!-- // text  -->
            <div class="hero-form" id="form-lp">
                <span class="title"><?php the_field('form_title_lp_hero'); ?></span>
                <?php the_field('form_code_lp_hero'); ?>
            </div>
            <!-- // form  -->
        </div>
        <!-- // container  -->
    </header>
    <!-- // lp hero  -->

    <section id="services" class="lp-services">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h2><?php the_field('section_title_serv_lp'); ?></h2>
                        <?php the_field('intro_text_serv_lp'); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="services-list row">

                <?php if( have_rows('services_list_lp') ): ?>
                    <?php while( have_rows('services_list_lp') ): the_row(); ?>

                        <div class="col-md-4">
                            <div class="service-box">
                                <div class="service-image">
                                    <img src="<?php the_sub_field('icon'); ?>">
                                </div>
                                <h3><?php the_sub_field('title'); ?></h3>
                                <div class="service-text">
                                    <p><?php the_sub_field('description'); ?></p>
                                </div>
                            </div>
                            <!-- /.service-box -->
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
            <!-- /.services-list -->

        </div>
        <!-- /.container -->
    </section>
    <!-- /#services -->

    <section id="features" class="features-lp">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <h2><?php the_field('section_title_about_lp'); ?></h2>
                        <?php the_field('intro_text_about_lp'); ?>
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

                    <div class="box">
                        <div class="box-right">
                            <h4><?php the_field('block_title_about_lp_home'); ?></h4>
                            <?php the_field('content_block_about_lp'); ?>
                        </div>
                    </div>

                </div>
                <div class="img-wrapper" style="background-image: url('<?php the_field('featured_image_lp_about'); ?>');">
                </div>
            </div>
        </div>
        <!-- /.features-in -->
    </section>
    <!-- /#features -->    

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
                        <h2><?php the_field('reviews_title_lp'); ?></h2>
                        <?php the_field('reviews_intro_lp'); ?>
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
                $post_objects = get_field('reviews_list_lp_reviews');

                if( $post_objects ): ?>
                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>

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
                                                <?php } elseif (get_field('network_reviwer') == 'GMB') { ?>
                                                    <img alt="" src="<?php bloginfo('template_directory'); ?>/img/ico/GMB.svg">
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

                    <?php endforeach; ?>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>

        </div>
        <!-- /.review-slider -->
    </section>    

    <div id="bottom-cta--lp">
        <div class="container">
            <div class="cta-content">
                <h3><?php the_field('cta_title_bottom_lp'); ?></h3>
                <?php the_field('cta_text_bottom_lp'); ?>
                <a href="<?php the_field('button_link_cta_bottom'); ?>" class="btn-cta"><?php the_field('button_label_cta_bottom_lp'); ?></a>
            </div>
            <!-- // content  -->
        </div>
    </div>
    <!-- // bottom cta lp  -->

<?php get_footer(); ?>