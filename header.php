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
	<?php if( get_field('head_code_snippet', 'options') ): ?>
		<?php the_field('head_code_snippet', 'options'); ?>
	<?php endif; ?>	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<?php if( get_field('body_code_snippet', 'options') ): ?>
		<?php the_field('body_code_snippet', 'options'); ?>
	<?php endif; ?>

	<?php if ( is_singular( 'cities' ) ) { ?>
        <?php include(TEMPLATEPATH . '/inc/city-schema.php'); ?>
    <?php } elseif (is_page_template('page-templates/reviews-template.php')) { ?>
        <?php include(TEMPLATEPATH . '/inc/reviews-schema.php'); ?>
	<?php } else { ?>
        <?php if( get_field('general_rich_snippet', 'options') ): ?>
            <?php the_field('general_rich_snippet', 'options'); ?>
        <?php endif; ?>    
	<?php } ?>	

<div class="wraper">

	<div class="menu-overlay"></div>
	<div class="main-menu-sidebar visible-xs visible-sm visible-md">

		<header>
			<a href="javascript:;" class="close-menu-btn"><img src="<?php bloginfo('template_directory'); ?>/img/ico/close-x.svg" alt=""></a>
		</header>
		<!-- // header  -->


		<nav id="sidebar-menu-wrapper">
			<div id="menu-mob">    
				<ul class="nav-links">
					<?php
					wp_nav_menu( array(
						'menu'              => 'mobile',
						'theme_location'    => 'mobile',
						'depth'             => 2,
						'container'         => false,
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => false,
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'items_wrap' => '%3$s',
						'walker'            => new wp_bootstrap_navwalkermobile())
					);
					?>  
				</ul>
			</div>
			<!-- // menu  -->

			<div class="mob-socials">
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

		</nav> 
		<!-- // sidebar menu wrapper  -->

	</div>
	<!-- // main menu sidebar  -->	

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

			<div id="mobile-menu--btn" class="d-lg-none">
				<a href="javascript:;">
					<span></span>
					<span></span>
					<span></span>
					<div class="clearfix"></div>
				</a>
			</div>
			<!-- // mobile  -->				

		</div>
		<!-- /.container -->
	</nav>
	<!-- /#navigation -->