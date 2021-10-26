<?php
/*
 * Template Name: Parent Child Template
 * Template Post Type: post
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

            <?php if( have_rows('list_of_posts_parent') ): ?>
            <div id="post-navi">
                <div class="post-wrapper">                           
                    <div id="nav-slider">
                        
                            <?php while( have_rows('list_of_posts_parent') ): the_row(); ?>

                                <div class="item">
                                    <div class="nav-col">
                                        <a href="<?php the_sub_field('link_to_post'); ?>">
                                            <div class="icon">
                                                <img src="<?php the_sub_field('icon'); ?>" alt="">
                                            </div>
                                            <span><?php the_sub_field('label'); ?></span>
                                        </a>
                                    </div>
                                    <!-- // col  -->
                                </div>

                            <?php endwhile; ?>
                        
                    </div>
                    <!-- // nav  -->
                </div>
                <!-- // wrapper  -->
            </div>
            <!-- // post nav  -->
            <?php endif; ?>    

        </div>
    </header>
    <!-- /.hero-banner -->

    <div id="blog-single">
        <div class="blog-single-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="info">
                            <p>Posted in 
                            <?php the_category( ',' ); ?>
                            on <?php echo get_the_date(); ?></p>
                        </div>
                        <!-- /.info -->
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

                                    <?php elseif( get_row_layout() == 'quote_cta' ): ?>

                                        <div class="quote-cta--single">
                                            <span class="title"><?php the_sub_field('cta_title'); ?></span>
                                            <a href="#bottom-form" class="btn-cta"><?php the_sub_field('button_label'); ?></a>
                                        </div>
                                        <!-- // single  -->     
                                        
                                    <?php elseif( get_row_layout() == 'featured_article' ): ?>    
                                        <?php
                                            $post_objects = get_sub_field('featured_article_list');

                                            if( $post_objects ): ?>
                                                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                    <?php setup_postdata($post); ?>
                                                        
                                                    <div class="featured-article-box">
                                                        <div class="blog-item">
                                                            <div class="blog-photo">
                                                                <a href="<?php the_permalink(); ?>" target="_blank">

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
                                                            </a>
                                                            </div>
                                                            <!-- /.blog-photo -->
                                                            <div class="blog-text">
                                                                <h3><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h3>
                                                                <a href="<?php the_permalink(); ?>" class="read-more" target="_blank">Read more</a>
                                                            </div>
                                                        </div>
                                                        <!-- /.blog-item -->
                                                    </div>
                                                    <!-- /.featured-article -->
                                                        
                                                <?php endforeach; ?>
                                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                        <?php endif; ?>
                                        <?php wp_reset_postdata(); ?>
                                        
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

                                    <?php elseif( get_row_layout() == 'services_module' ): ?>

                                        <div id="services" class="services-blog-module">
                                            <div class="services-list">

                                                <?php
                                                    $post_objects = get_sub_field('services_list_blog_page');

                                                    if( $post_objects ): ?>
                                                        <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                            <?php setup_postdata($post); ?>

                                                            <div class="service-box">
                                                                <a href="<?php the_permalink(); ?>" target="_blank">
                                                                    <div class="service-image">
                                                                        <img src="<?php the_field('icon_service'); ?>">
                                                                    </div>
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
                                        <!-- /#services -->

                                    <?php elseif( get_row_layout() == 'table' ): ?>
                                        <table style="width:100%" class="single-table">
                                            <thead>
                                                <tr role="row">
                                                <?php
                                                    // check if the repeater field has rows of data
                                                    if(have_rows('table_head_cells')):
                                                        // loop through the rows of data
                                                        while(have_rows('table_head_cells')) : the_row();

                                                            $hlabel = get_sub_field('table_cell_label_thead');

                                                            ?>  
                                                            <th tabindex="0" rowspan="1" colspan="1"><?php echo $hlabel; ?></th>
                                                        <?php endwhile;
                                                    else :
                                                        echo 'No data';
                                                    endif;
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php while ( have_posts() ) : the_post(); ?>
                                                <?php 
                                                // check for rows (parent repeater)
                                                if( have_rows('table_body_row') ): ?>
                                                    <?php 
                                                    // loop through rows (parent repeater)
                                                    while( have_rows('table_body_row') ): the_row(); ?>
                                                            <?php 
                                                            // check for rows (sub repeater)
                                                            if( have_rows('table_body_cells') ): ?>
                                                                <tr>
                                                                    <?php 
                                                                    // loop through rows (sub repeater)
                                                                    while( have_rows('table_body_cells') ): the_row();
                                                                        ?>
                                                                        <td><?php the_sub_field('table_cell_label_tbody'); ?></td>
                                                                    <?php endwhile; ?>
                                                                </tr>
                                                            <?php endif; //if( get_sub_field('') ): ?>
                                                    <?php endwhile; // while( has_sub_field('') ): ?>
                                                <?php endif; // if( get_field('') ): ?>
                                                <?php endwhile; // end of the loop. ?>
                                            </tbody>
                                        </table>

                                    <?php endif;

                                endwhile;

                            else :

                                // no layouts found

                        endif; ?>

                        </div>
                        <!-- // conten  -->
                        <div class="blog-single-autor">
                            <div class="author-desc">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
                                <div class="author-content">
                                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
                                    <p><?php the_author_description(); ?></p>
                                </div>
                                <!-- /.author-content -->
                            </div>
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

    <div id="bottom-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    <?php echo do_shortcode('[gravityform id="7" title="false" description="false" ajax="true"]'); ?>

                </div>
            </div>
        </div>
        <!-- // container  -->
    </div>
    <!-- // form  -->

    <section class="similar-posts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Recent posts</h2>
                    <div class="posts-list">
                        <div class="row">

                        <?php
                            $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3) ); ?>  
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                        <div class="col-md-4">
                                            <div class="posts-item">
                                                <div class="blog-photo">
                                                <a href="<?php the_permalink(); ?>">
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

                                                    <?php } ?></a>
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

                                <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>    
                        <?php wp_reset_query(); ?>

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

    <section class="similar-posts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Related posts</h2>
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
                                                <a href="<?php the_permalink(); ?>">
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

                                                    <?php } ?></a>
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
