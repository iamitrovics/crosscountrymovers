<?php
/**
 * Template Name: Areas We Serve Template
 */

get_header(); ?>

    <header id="hero-banner">
        <?php
        $imageID = get_field('header_background_image_areas_header');
        $image = wp_get_attachment_image_src( $imageID, 'header-image' );
        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
        ?> 

        <img class="img-responsive hero-img header-desk" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />     

        <?php
        $imageID = get_field('header_mobile_background_image_areas_page');
        $image = wp_get_attachment_image_src( $imageID, 'headermobile-image' );
        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
        ?> 

        <img class="img-responsive header-mob" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
        <div class="caption">
            <div class="container">
                <div class="caption__holder">
                    <h1><?php the_field('main_title_areas_listing_hero') ;?></h1>
                    <?php the_field('intro_text_areas_listing_header'); ?>
                </div>
            </div>
        </div>
    </header>
    <!-- /.hero-banner -->

    <?php include(TEMPLATEPATH . '/booking-div.php'); ?>

    <section class="all-areas">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <h2><?php the_field('main_title_areas_list'); ?></h2>  
                        <?php the_field('intro_text_areas_list'); ?>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="all-areas__top">
                        <div class="map-display">
                            <!-- map here -->
                            <div class="map-wrapper default active-side" data-side="west">
                                <img src="<?php bloginfo('template_directory') ;?>/img/misc/us-map-default-1.png" alt="">
                                <div class="cloud-title"><span>Western US</span></div>
                            </div>
                            <div class="map-wrapper west" data-side="west">
                                <img src="<?php bloginfo('template_directory') ;?>/img/misc/cross-cmovers-west-map.png" alt="">
                                <div class="cloud-title"><span>Western US</span></div>
                            </div>
                            <div class="map-wrapper middle" data-side="middle">
                                <img src="<?php bloginfo('template_directory') ;?>/img/misc/cross-cmovers-middle-map.png" alt="">
                                <div class="cloud-title"><span>Middle US</span></div>
                            </div>
                            <div class="map-wrapper east" data-side="east">
                                <img src="<?php bloginfo('template_directory') ;?>/img/misc/cross-cmovers-east-map.png" alt="">
                                <div class="cloud-title"><span>Eastern US</span></div>
                            </div>
                            <div class="map-hover-wrapper">
                                <div class="map-hover west" data-side="west"></div>
                                <div class="map-hover middle" data-side="middle"></div>
                                <div class="map-hover east" data-side="east"></div>
                            </div>
                        </div>
                        <!-- select areas -->
                        <div class="area-select">
                            <form action="" method="POST">
                                <div class="select-wrapper">
                                    <select name="choose_area" id="choose_area">
                                        <option value="">All areas</option>
                                        <option value="Western US">Western US</option>
                                        <option value="Middle US">Middle US</option>
                                        <option value="Eastern US">Eastern US</option>
                                    </select>
                                </div>
                                <div class="select-wrapper">
                                <?php
                                
                                $categories = get_categories('taxonomy=states');
                                
                                $select = "<select name='cat' id='cat' class='postform  choose_country'>n";
                                $select.= "<option value='-1'>Select State</option>n";
                                
                                foreach($categories as $category){
                                    if($category->count > 0){
                                        $select.= "<option value='".$category->slug."'>".$category->name."</option>";
                                    }
                                }
                                
                                $select.= "</select>";
                                
                                echo $select;
                                ?>
                                
                                <script type="text/javascript"><!--
                                    var dropdown = document.getElementById("cat");
                                    function onCatChange() {
                                        if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
                                            location.href = "<?php echo home_url();?>/state/"+dropdown.options[dropdown.selectedIndex].value+"/";
                                        }
                                    }
                                    dropdown.onchange = onCatChange;
                                --></script>   
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.all-areas__top -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <div class="list-areas-display">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <?php if( have_rows('areas_list_landing') ): ?>
                            <?php while( have_rows('areas_list_landing') ): the_row(); ?>

                                <h3><?php the_sub_field('area_title'); ?></h3>
                                <div class="country-wrapper">

                                    <?php if( have_rows('countries') ): ?>
                                        <?php while( have_rows('countries') ): the_row(); ?>

                                            <div class="country-box">
                                                <h4><a href="#"><?php the_sub_field('country_name'); ?></a></h4>
                                                <ul>
                                                    <?php if( have_rows('list_of_cities') ): ?>
                                                        <?php while( have_rows('list_of_cities') ): the_row(); ?>
                                                            <li><a href="<?php the_sub_field('link_to_city'); ?>"><?php the_sub_field('label'); ?></a></li>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <!-- /.country-box -->

                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                </div>
                                <!-- /.country-wrapper -->

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.list areas display -->
    </section>    

    <?php include(TEMPLATEPATH . '/inc/bottomcta-inc.php'); ?>  

<?php get_footer(); ?>