<?php
/* 
*/
get_header(); ?>

    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h1><?php   // Get terms for post
                        $terms = get_the_terms( $post->ID , 'states' );
                        // Loop over each item since it's an array
                        if ( $terms != null ){
                        foreach( $terms as $term ) {
                        $term_link = get_term_link( $term, 'states' );
                        // Print the name and URL
                        echo '<a href="' . $term_link . '">' . $term->name . '</a>';
                        // Get rid of the other data stored in the object, since it's not needed
                        unset($term); } } ?></h1>
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

    <section class="all-areas">
        
        <div class="list-areas-display">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
    

                           <div class="country-wrapper">

                                <div class="country-box">
                                <h4><?php   // Get terms for post
                            $terms = get_the_terms( $post->ID , 'states' );
                            // Loop over each item since it's an array
                            if ( $terms != null ){
                            foreach( $terms as $term ) {
                            $term_link = get_term_link( $term, 'states' );
                            // Print the name and URL
                            echo '<a href="' . $term_link . '">' . $term->name . '</a>';
                            // Get rid of the other data stored in the object, since it's not needed
                            unset($term); } } ?></h4>
                                    <ul>

                                        <?php while ( have_posts() ) : the_post(); ?>
                                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                         <?php endwhile; // end of the loop. ?> 	    
                    
                                    </ul>
                                </div>
                                <!-- /.country-box -->
                            </div>
                            <!-- /.country-wrapper -->                    

                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.list areas display -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="intro">
                        <br><br>
                        <h2>Where can you find us</h2>  
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

    </section>   

<?php get_footer(); ?>