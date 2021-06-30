<?php get_header(); ?>

    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <h2><?php the_field('main_title_blog_list' , get_option('page_for_posts')); ?></h2>        
                        <?php the_field('text_intro_blog_list' , get_option('page_for_posts')); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

    <div id="blog-listing">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="category-filter">
                        <?php
                        $args = array(
                            'show_option_all'    => 'Select category',
                            'class'              => 'selectpicker',
                        );
                        ?>
                        <?php wp_dropdown_categories(  $args  ); ?>
                        <script type="text/javascript">
                            <!--
                            var dropdown = document.getElementById("cat");
                            function onCatChange() {
                                if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
                                    location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
                                }
                            }
                            dropdown.onchange = onCatChange;
                            -->
                        </script>
                    </div>
                    <!-- /.category-filter -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">

                    <?php if( have_posts() ){
                        while( have_posts() ) {
                            the_post(); ?>

                            <div class="blog-item">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="info">
                                    <p>Posted in 
                                    <?php the_category( ',' ); ?>
                                    on <?php echo get_the_date(); ?></p>
                                </div>
                                <!-- /.info -->
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

                                    <?php } ?>

                                   </a>
                                </div>
                                <!-- /.blog-photo -->
                                <div class="blog-text">
                                    <?php the_field('excerpt_text'); ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
                                </div>
                            </div>
                            <!-- /.blog-single -->

                        <?php }
                        }
                    ?>

                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="pagination__wrapper">
                        <?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); // WP-PageNavi function ?>
                    </div>
                    <!-- // wrapper  -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#blog-listing -->   

<?php get_footer(); ?>