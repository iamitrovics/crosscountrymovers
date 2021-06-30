<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

    <div id="error-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-content">
                        <h1><?php the_field('main_title_ermac' , 'options'); ?></h1>
                        <h2><?php the_field('main_subtitle_ermac', 'options'); ?></h2>
                        <?php the_field('content_block_ermac', 'options'); ?>
                        <a href="<?php the_field('button_link_ermac', 'options'); ?>" class="go-home"><i class="icon-arrow-left"></i> <?php the_field('button_label_ermac', 'options'); ?></a>
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

<?php
get_footer();
