<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

    <footer id="page-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-left">
                        <div class="certifications">
                            <ul>
                                <?php if( have_rows('license_list_footer', 'options') ): ?>
                                    <?php while( have_rows('license_list_footer', 'options') ): the_row(); ?>
                                        <li><a href="<?php the_sub_field('link'); ?>" target="_blank"><img src="<?php the_sub_field('icon'); ?>" alt=""></a></li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <span class="licence"><?php the_field('license_notice_footer', 'options'); ?></span>
                        
                    </div>
                    <!-- /.footer-left -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="footer-right">
                        <div class="footer-socials">
                            <ul>

                            <?php if( have_rows('socials_list_gen', 'options') ): ?>
                                <?php while( have_rows('socials_list_gen', 'options') ): the_row(); ?>

                                    <?php if (get_sub_field('network') == 'Facebook') { ?>
                                        <li>
                                            <a href="<?php the_sub_field('link_to_social'); ?>" target="_blank">
                                                <div class="icon-fb"><span class="path1"></span><span class="path2"></span></div>
                                            </a>
                                        </li>
                                    <?php } elseif (get_sub_field('network') == 'Twitter') { ?>
                                        <li>
                                            <a href="<?php the_sub_field('link_to_social'); ?>" target="_blank">
                                                <div class="icon-twitter"><span class="path1"></span><span class="path2"></span></div>
                                            </a>
                                        </li>
                                    <?php } elseif (get_sub_field('network') == 'Youtube') { ?>
                                        <li>
                                            <a href="<?php the_sub_field('link_to_social'); ?>" target="_blank">
                                                <div class="icon-youtube"><span class="path1"></span><span class="path2"></span></div>
                                            </a>
                                        </li>                                    
                                    <?php } elseif (get_sub_field('network') == 'Instagram') { ?>
                                        <li>
                                            <a href="<?php the_sub_field('link_to_social'); ?>" target="_blank">
                                                <div class="icon-insta"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></div>
                                            </a>
                                        </li>                                    
                                    <?php } elseif (get_sub_field('network') == 'AngiesList') { ?>
                                        <li>
                                            <a href="<?php the_sub_field('link_to_social'); ?>" target="_blank">
                                                <div class="icon-angies"><span class="path1"></span><span class="path2"></span></div>
                                            </a>
                                        </li>                                    
                                    <?php } ?>   

                                <?php endwhile; ?>
                            <?php endif; ?>

                            </ul>
                        </div>
                        <!-- /.footer-socials -->
                        <div class="footer-nav">
                            <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
                        </div>
                        <!-- /.footer-nav -->
                        <span class="copyright">&copy; <?php echo(date('Y'));?> <?php the_field('copyright_notice_footer', 'options'); ?></span>
                    </div>
                    <!-- /.footer-right -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </footer>
    <!-- /#page-footer -->

    </div>
    <!-- /.wraper -->
    <script src="<?php bloginfo('template_directory'); ?>/js/map.js"></script>   


    <?php 
    $values = get_field( 'phone_number_city_single' );
    if ( $values ) { ?>

        <div id="fixed-cta">
            
            <a href="tel:<?php the_field('phone_number_city_single') ?>">
                <em><i class="fal fa-phone-alt"></i></em>
                <div class="phone-text">
                    <small class="label">Get a Free Estimate</small>
                    <span><?php the_field('phone_number_city_single') ?></span>
                </div>
                <!-- // text  -->
            </a>

        </div>
        <!-- // fixed cta  -->

    <?php 
    } else { ?>

    <div id="fixed-cta">
        
        <a href="tel:<?php the_field('phone_number_top_general', 'options') ?>">
            <em><i class="fal fa-phone-alt"></i></em>
            <div class="phone-text">
                <small class="label">Get a Free Estimate</small>
                <span><?php the_field('phone_number_top_general', 'options') ?></span>
            </div>
            <!-- // text  -->
        </a>

    </div>
    <!-- // fixed cta  -->

    <?php } ?>

<?php wp_footer(); ?>

<?php if( get_field('footer_code_snippet', 'options') ): ?>
    <?php the_field('footer_code_snippet', 'options'); ?>
<?php endif; ?>

</body>

</html>

