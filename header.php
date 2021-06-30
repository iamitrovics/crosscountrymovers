<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/png"  href="<?php echo get_template_directory_uri(); ?>/img/ico/favicon.png">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<meta name="ahrefs-site-verification" content="b6d355d34cf2473a151d4e7ec88ef43d1605fe1652e09c0e20b9c0f07a7e0e27">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123487231-2"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-123487231-2');
	</script>	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<div class="wraper">
	<div class="menu-overlay"></div>
	<div class="main-menu-sidebar visible-xs visible-sm visible-md">
		<nav class="main-menu-sidebar">
			<div id="menu">

				<ul>

     				<?php if( have_rows('menu_items_mobile', 'options') ): ?>
                        <?php while( have_rows('menu_items_mobile', 'options') ): the_row(); ?>
                           ;
                           
                        <?php if (get_sub_field('link_type') == 'Single Item') { ?>
                           <li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?> </a></li>
                        <?php } elseif (get_sub_field('link_type') == 'Dropdown') { ?>

                     
                           <li>
                        <a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?></a>
                        <ul>
                           <?php if( have_rows('dropdown_items') ): ?>
                              <?php while( have_rows('dropdown_items') ): the_row(); ?>
                                 <li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('label'); ?></a></li>
                              <?php endwhile; ?>
                           <?php endif; ?>
                        
                        </ul>
                     </li>               

            <?php } elseif (get_sub_field('link_type') == 'Dropdown Multilevel') { ?>
         
         <li>
            <a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?></a>
            <ul>

               <?php if( have_rows('multilevel_items') ): ?>
                  <?php while( have_rows('multilevel_items') ): the_row(); ?>


                        <?php if (get_sub_field('type_of_item') == 'Single Items') { ?>

                              <li><a href="<?php the_sub_field('item_link'); ?>"><?php the_sub_field('item_label_sub'); ?></a></li>

                        <?php } elseif (get_sub_field('type_of_item') == 'Dropdown Items') { ?>
                  
                              <li>
                                 <a href="<?php the_sub_field('item_link'); ?>"><?php the_sub_field('item_label_sub'); ?></a>
                                 <ul>
                                    <?php if( have_rows('dropdown_items_sub') ): ?>
                                       <?php while( have_rows('dropdown_items_sub') ): the_row(); ?>
                                           <li><a href="<?php the_sub_field('link_sub_sub'); ?>"><?php the_sub_field('label_sub_sub'); ?></a></li>
                                       <?php endwhile; ?>
                                    <?php endif; ?>
                                 </ul>
                              </li>

                        <?php } ?>      
                        <!-- // select of 3rd level    -->                  
                      
                  <?php endwhile; ?>
               <?php endif; ?>
            </ul>
            
         </li>
            <?php } ?>   

            <?php endwhile; ?>
         <?php endif; ?>


				</ul>
				
			</div>
		</nav>
		<!-- // nav  -->
	</div>
	<!-- // sidebar  -->
	<nav id="navigation">
		<div class="container">
			<div id="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php the_field('website_logo_general', 'options'); ?>" alt="<?php bloginfo('name'); ?>" class="logo-desk">
					<img src="<?php the_field('mobile_logo_general', 'options'); ?>" alt="<?php bloginfo('name'); ?>" class="logo-mob">
				</a>
			</div>
			<!-- /#logo -->
			<div id="menu">
				<ul>

					<?php if( have_rows('menu_items_header_main', 'options') ): ?>
						<?php while( have_rows('menu_items_header_main', 'options') ): the_row(); ?>
							<?php if (get_sub_field('link_type') == 'Single Item') { ?>
								<li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?></a></li>
							<?php } elseif (get_sub_field('link_type') == 'Dropdown') { ?>

								<li class="dropdown">
								<a class="dropdown-toggle" href="<?php the_sub_field('link_to_page'); ?>" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false"><?php the_sub_field('item_label'); ?></a>
								<ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">
								<?php if( have_rows('dropdown_items') ): ?>
									<?php while( have_rows('dropdown_items') ): the_row(); ?>
										<li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('label'); ?></a></li>
									<?php endwhile; ?>
								<?php endif; ?>
								</ul>
							</li>

							<?php } elseif (get_sub_field('link_type') == 'Dropdown Multilevel') { ?>

								<li class="dropdown">
								<a class="dropdown-toggle--re" href="<?php the_sub_field('link_to_page'); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php the_sub_field('item_label'); ?></a>
								<ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">                                 

								<?php if( have_rows('multilevel_items') ): ?>
								<?php while( have_rows('multilevel_items') ): the_row(); ?>

									<?php if (get_sub_field('type_of_item') == 'Single Items') { ?>
										<li><a href="<?php the_sub_field('item_link'); ?>"><?php the_sub_field('item_label_sub'); ?></a></li>
									<?php } elseif (get_sub_field('type_of_item') == 'Dropdown Items') { ?>
								
										<li class="dropdown">
											<a class="dropdown-toggle--re" href="<?php the_sub_field('item_link'); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php the_sub_field('item_label_sub'); ?></a>
											<ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">
											<?php if( have_rows('dropdown_items_sub') ): ?>
												<?php while( have_rows('dropdown_items_sub') ): the_row(); ?>
													<li><a href="<?php the_sub_field('link_sub_sub'); ?>"><?php the_sub_field('label_sub_sub'); ?></a></li>
												<?php endwhile; ?>
											<?php endif; ?>
											</ul>
										</li>     

									<?php } ?>      
									<!-- // select of 3rd level    -->
					
								<?php endwhile; ?>
								<?php endif; ?>

								</ul>
							</li>                                 

							<?php } ?>                                     
						<?php endwhile; ?>
					<?php endif; ?>				

				</ul>
			</div>
			<!-- /#navigation -->
			<div class="nav-cta">
				<a href="<?php the_field('button_link_top_cta', 'options'); ?>" class="btn-estimate"><?php the_field('button_label_top_cta', 'options'); ?></a>

					<?php 
					$values = get_field( 'phone_number_city_single' );
					if ( $values ) { ?>

						<a href="tel:<?php the_field('phone_number_city_single'); ?>" class="btn-call"><i class="fas fa-phone-alt"></i> <span><?php the_field('phone_number_city_single'); ?></span><span><?php the_field('phone_label_top_general', 'options'); ?></span></a>

					<?php 
					} else { ?>

						<a href="tel:<?php the_field('phone_number_top_general', 'options'); ?>" class="btn-call"><i class="fas fa-phone-alt"></i> <span><?php the_field('phone_number_top_general', 'options'); ?></span><span><?php the_field('phone_label_top_general', 'options'); ?></span></a>

					<?php } ?>
				
			</div>
			<!-- /.col-md-12 -->
			<div id="top__mobile">
				<a href="javascript:;" class="menu-btn">
				<span></span>
				<span></span>
				<span></span>
				</a>
			</div>
		</div>
		<!-- /.container -->
	</nav>
	<!-- /#navigation -->