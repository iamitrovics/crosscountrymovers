<?php
/**
 * Template Name: Thanks Template
 */

get_header(); ?>

    <div id="error-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-content">
                        <h1><?php the_field('main_title_tnx' ); ?></h1>
                        <h2><?php the_field('main_subtitle_tnx'); ?></h2>
                        <?php the_field('content_block_tnx'); ?>
                        <a href="<?php the_field('button_link_tnx'); ?>" class="go-home"><i class="icon-arrow-left"></i> <?php the_field('button_label_tnx'); ?></a>
                    </div>
                    <!-- /.error-content -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#error-page -->

<?php get_footer(); ?>