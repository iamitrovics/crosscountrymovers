<?php
/**
 * Template Name: Services Template
 */

get_header(); ?>

    <header id="hero-banner">
        <?php
        $imageID = get_field('header_background_image_services_header');
        $image = wp_get_attachment_image_src( $imageID, 'header-image' );
        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
        ?> 

        <img class="img-responsive hero-img header-desk" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />     

        <?php
        $imageID = get_field('header_mobile_background_image_serv_page');
        $image = wp_get_attachment_image_src( $imageID, 'headermobile-image' );
        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
        ?> 

        <img class="img-responsive header-mob" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
        <div class="caption">
            <div class="container">
                <div class="caption__holder">
                    <h1><?php the_field('main_title_ser_listing_hero') ;?></h1>
                    <?php the_field('intro_text_serv_listing_header'); ?>
                </div>
            </div>
        </div>
    </header>
    <!-- /.hero-banner -->

    <?php include(TEMPLATEPATH . '/booking-div.php'); ?>

    <section class="services-list-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <h2><?php the_field('main_title_services_lister'); ?></h2>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

        <?php
        $loop = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => 115) ); ?>  
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <section class="service-content">
                <div class="container">
                    <div class="service-photo">
                        <?php
                        $imageID = get_field('featured_image_serv_singler');
                        $image = wp_get_attachment_image_src( $imageID, 'service-image' );
                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                        ?> 

                        <div class="photo-box" style="background-image: url(<?php echo $image[0]; ?>);">
                        </div>
                        <!-- /.photo-box -->
                    </div>
                    <!-- /.service-video -->
                    <div class="service-text">
                        <div class="service-box">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                                <?php the_field('intro_text_serv_singler'); ?>
                                <div class="service-cta">Learn more</div>
                            </a>
                        </div>
                        <!-- /.service-box -->
                    </div>
                    <!-- /.service-content -->
                </div>
                <!-- /.container -->
            </section>
            <!-- /.service-content -->

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>      

    </section>

    <!-- /.services-list-inner -->

    <?php include(TEMPLATEPATH . '/inc/bottomcta-inc.php'); ?>

<?php get_footer(); ?>