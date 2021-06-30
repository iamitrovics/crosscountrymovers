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

    <header id="inner-photo-banner">
        <div class="container">
            <div class="image__holder">
            
                <?php
                $imageID = get_field('header_background_blog_single');
                $image = wp_get_attachment_image_src( $imageID, 'blogheader-image' );
                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                ?> 

                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                <div class="overlay"></div>
                <div class="caption">
                    <div class="container">
                        <div class="caption__holder">
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>
                </div>              
            
            </div>      
        </div>
    </header>
    <!-- /.hero-banner -->

    <div id="blog-single">
        <div class="blog-single-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p><?php echo get_the_date(); ?></p>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.blog-single-info -->
        
        <div class="blog-single-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog__content">
                        
                        <?php
                            // check if the flexible content field has rows of data
                            if( have_rows('content_layout_blog') ):

                                // loop through the rows of data
                                while ( have_rows('content_layout_blog') ) : the_row();

                                    if( get_row_layout() == 'intro_text' ): ?>

                                    <div class="row">
                                        <div class="col-lg-12">								

                                        <div class="intro__content">
                                            <?php the_sub_field('intro_content'); ?>
                                        </div>
                                        <!-- // intro  -->

                                        </div>
                                        <!-- // content  -->
                                    </div>
                                    <!-- // row  -->									

                                    <?php elseif( get_row_layout() == 'full_width_content' ): ?>

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
                                    
                                    <?php elseif( get_row_layout() == 'half_width_image' ): ?>
                                    <?php elseif( get_row_layout() == 'table_of_contents' ): ?>

                                    <?php elseif( get_row_layout() == 'quote' ): ?>	

                                        <blockquote>
                                            <?php the_sub_field('quotation_content'); ?>
                                            <?php if( get_sub_field('source') ): ?>
                                            <span class="author">- <?php the_sub_field('source'); ?></span>
                                            <?php endif; ?>
                                        </blockquote>	

                                    <?php elseif( get_row_layout() == 'video' ): ?>	

                                        <div class="video__holder">
                                            <?php the_sub_field('embedded_code'); ?>
                                        </div>	
                                        
                                    <?php elseif( get_row_layout() == 'accordion' ): ?>	

                                            <div class="accordion-section">
                                                <?php if( get_sub_field('accordion_title') ): ?>
                                                    <h3><?php the_sub_field('accordion_title'); ?></h3>
                                                <?php endif; ?>
                                                <div class="faq-accordion">
                                                <?php if( have_rows('accordion_list') ): ?>
                                                    <?php while( have_rows('accordion_list') ): the_row(); ?>
                                                        <span class="h4"><?php the_sub_field('heading'); ?></span>
                                                        <div class="panel">
                                                        <?php the_sub_field('content'); ?>
                                                        </div>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                                </div>
                                                <!-- // acc  -->
                                            </div>
                                            <!-- // section  -->

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
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-single-autor">
                            <div class="bsa-in">
                                <div class="avatar-box">
                                    <!-- <img src="<?php bloginfo('template_directory'); ?>/img/misc/avatar.jpg"> -->
                                </div>
                                <!-- /.avatar-box -->
                                <div class="author-info">

                                <?php while ( have_posts() ) : the_post(); ?>
                                <h4><?php the_author(); ?></h4>
                                <p><?php echo nl2br( get_the_author_meta( 'description' ) ); ?></p>
                                <?php endwhile; // end of the loop. ?> 
                                    
                                </div>
                                <!-- /.author-info -->
                            </div>
                            <!-- /.bsa-in -->
                        </div>
                        <!-- /.blog-single-autor -->
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

    <section class="similar-posts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Similar posts</h2>
                    <div class="posts-list">
                        <div class="row">

                            <?php
                                $categories =   get_the_category();
                                // print_r($categories);
                                $rp_query   =  new WP_Query ([
                                    'posts_per_page'        =>  3,
                                    'post__not_in'          =>  [ $post->ID ],
                                    'cat'                   =>  !empty($categories) ? $categories[0]->term_id : null,

                                ]);

                                if ( $rp_query->have_posts() ) {
                                    while( $rp_query->have_posts() ) {
                                        $rp_query->the_post();
                                        ?>

                                        <div class="col-md-4">
                                            <div class="posts-item">
                                                <div class="blog-photo">
                                                <?php 
                                                    $values = get_field( 'featured_image_blog' );
                                                    if ( $values ) { ?>

                                                        <?php
                                                        $imageID = get_field('featured_image_blog');
                                                        $image = wp_get_attachment_image_src( $imageID, 'blog-image' );
                                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                        ?> 

                                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

                                                    <?php 
                                                    } else { ?>

                                                        <img src="<?php bloginfo('template_directory'); ?>/img/misc/placeholder.jpg" alt="">

                                                    <?php } ?>
                                                </div>
                                                <!-- /.blog-photo -->
                                                <div class="blog-title">
                                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                </div>
                                                <!-- /.blog-title -->
                                            </div>
                                            <!-- /.posts-item -->
                                        </div>
                                        <!-- /.col-md-4 -->

                                        <?php
                                    }

                                    wp_reset_postdata();

                                }

                            ?>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.posts-list -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.similar-posts -->
   
<?php
get_footer();
