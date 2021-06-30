<?php
/**
 * Template Name: Regular Template
 */

get_header(); ?>

    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h2><?php the_field('main_title_regular_header'); ?></h2>        
                        <?php the_field('intro_text_regular_content'); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

    <div id="privacy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php if( have_rows('content_layout_regular') ): ?>
                        <?php while( have_rows('content_layout_regular') ): the_row(); ?>
                            <?php if( get_row_layout() == 'full_widh_content' ): ?>

                                <div class="regular__content">
                                    <?php the_sub_field('content_block'); ?>                                
                                </div>

                            <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                                <div class="regular__photo">
                                
                                    <?php
                                    $imageID = get_sub_field('featured_image');
                                    $image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                    ?>                                 
                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                </div>

                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /#privacy -->

<?php get_footer(); ?>