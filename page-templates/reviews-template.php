<?php
/**
 * Template Name: Reviews Template
 */

get_header(); ?>

    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h2><?php the_field('main_title_reviews_page'); ?></h2>        
                        <?php the_field('intro_text_reviews_page_content'); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

    <section class="text-reviews">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3><?php the_field('main_title_reviews_page_reviews'); ?></h3>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">

                    <?php
                    $loop = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => 115) ); ?>  
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

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
                                    <h4><?php the_field('review_title_reviwer'); ?></h4>
                                </div>
                                <div class="content">
                                    <?php the_field('review_content_box'); ?>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>      

                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </section>
    <!-- /.text-reviews -->

    <?php include(TEMPLATEPATH . '/inc/bottomcta-inc.php'); ?>

<?php get_footer(); ?>