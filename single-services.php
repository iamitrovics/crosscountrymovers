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

    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h1><?php the_field('main_title_services_singler'); ?></h1>
                        <?php the_field('intro_text_single_page_serv'); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

    <section class="services-detailed">
        <div class="container">
            <div class="services-detailed__video">

                <?php
                $imageID = get_field('featured_image_serv_singler_feat');
                $image = wp_get_attachment_image_src( $imageID, 'service-image' );
                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                ?> 


                <div class="video-box" style="background-image: url(<?php echo $image[0]; ?>);">
                
                    <a class="various fancybox.iframe" href="<?php the_field('video_url_singerl_serv'); ?>?autoplay=1">
                        <i class="icon-play"></i>
                    </a>
                </div>
                <!-- /.video-box -->
            </div>
            <!-- /.about-video -->
            <div class="services-detailed__text">
                <div class="services-detailed__text__box">
                    <?php the_field('content_block_services_content_singler'); ?>
                </div>
                <!-- /.about-box -->
            </div>
            <!-- /.about-content -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.about-content -->

    <div id="blog-single" class="services-flexible">
        <div class="blog-single-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog__content">
                        
                        <?php
                            // check if the flexible content field has rows of data
                            if( have_rows('content_layout_services') ):

                                // loop through the rows of data
                                while ( have_rows('content_layout_services') ) : the_row();								

                                    if( get_row_layout() == 'full_width_content' ): ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="blog__main">
                                                <?php the_sub_field('content_block'); ?>
                                            </div>
                                            <!-- // main  -->
                                        </div>
                                        <!-- /.col-md-12 -->
                                    </div>
                                    <!-- /.row -->								

                                    <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="blog-photo">
                                                    <?php
                                                    $imageID = get_sub_field('featured_image');
                                                    $image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
                                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                    ?> 

                                                    <?php 
                                                    $values = get_sub_field( 'image_alt_text' );
                                                    if ( $values ) { ?>
                                                        <img class="img-responsive" alt="<?php the_sub_field('image_alt_text'); ?>" src="<?php echo $image[0]; ?>" /> 
                                                    <?php 
                                                    } else { ?>
                                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                                    <?php } ?>

                                                    <?php if( get_sub_field('image_caption') ): ?>
                                                    <div class="image__caption">
                                                        <span><?php the_sub_field('image_caption'); ?></span>
                                                    </div>
                                                    <?php endif; ?>

                                                </div>
                                                <!-- /.blog-photo -->
                                            </div>
                                            <!-- // col  -->
                                        </div>

                                    <?php endif;
                                endwhile;
                            else :
                                // no layouts found
                        endif; ?>

                        </div>
                        <!-- // conten  -->
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container -->
        </div>
        <!-- /.blog-single-text -->
    </div>
    <!-- /#blog-single -->

    <section class="services-accordion">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><?php the_field('main_title_faq_page'); ?></h2>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="services-accordion__in">

                        <?php if( have_rows('faq_list_singler_page') ): ?>
                            <?php while( have_rows('faq_list_singler_page') ): the_row(); ?>

                                <div class="faq-wrap">
                                    <h3><?php the_sub_field('title'); ?></h3>
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
                        <h2>What Our Customers Say About Us</h2>
                        <p>We rely on genuine reviews of our clients to continue improving and providing the best possible moving services.</p>
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
                $post_objects = get_field('reviews_list_service_single');

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

    <?php include(TEMPLATEPATH . '/inc/bottomcta-inc.php'); ?>



    <?php
    $imageID = get_field('featured_image_serv_singler_feat');
    $image2 = wp_get_attachment_image_src( $imageID, 'service-image' );
    ?> 


    <script type="application/ld+json">
{
    "@context": "https://schema.org/", 
    "@type": "Product", 
    "name": "<?php the_title(); ?>",
    "image": "<?php echo $image2[0]; ?>",
    "description": "<?php the_field('short_services_text', false, false); ?>",
    "brand": {
        "@type": "Brand",
        "name": "Cross Country Movers"
    },


    <?php $post_objects = get_field('reviews_list_service_single'); ?>
        <?php $count = count(get_field('reviews_list_service_single')); ?>
        <?php $rowCount = $count; //GET THE COUNT ?>    

 

       "review": [
        
            <?php $i = 1; ?>


                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>


                {
                    "@type": "Review",
                    "name": "<?php the_field('review_title_reviwer'); ?>",
                    "reviewBody": "<?php the_field('review_content_box', false, false); ?>",
                    "reviewRating": {
                    "@type": "Rating",

                    <?php if (get_field('score_reviwer') == '5') { ?>
                        "ratingValue": "5",
                    <?php } elseif (get_field('score_reviwer') == '4.5') { ?>
                        "ratingValue": "4",
                    <?php } elseif (get_field('score_reviwer') == '4') { ?>
                        "ratingValue": "4",
                    <?php } ?>  

                    "bestRating": "5",
                    "worstRating": "1"
                    },
                    "datePublished": "<?php echo get_the_date( 'F j, Y' ); ?>",
                    "author": {"@type": "Person", "name": "<?php the_title(''); ?>"},
                    "publisher": {"@type": "Organization", "name": "Cross Country Movers"}
                }


                <?php if($i < $rowCount): ?>
                    ,
                <?php endif; ?>

                <?php
                $rating = get_field('score_reviwer');
                $ratingsArray[$i++] += get_field('score_reviwer');
                ?>                       

                <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        
        ] ,

        "aggregateRating": {
            "@type": "AggregateRating",
            <?php
                $totalRatings =  array_sum($ratingsArray);      
                $totalCountReview = $totalRatings  / $rowCount ;
            ?>
            "ratingValue": "<?php echo round($totalCountReview , 1); ?>",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "<?php echo $rowCount; ?>",
            "reviewCount": "<?php echo $rowCount; ?>"
        }


    }
    </script>    

<?php
get_footer();
