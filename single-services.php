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

    <?php include(TEMPLATEPATH . '/inc/bottomcta-inc.php'); ?>

<?php
get_footer();