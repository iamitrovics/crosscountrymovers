<?php
/**
 * Custom image sizes
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// general
add_image_size('preview-image', 300, 200, TRUE);

// Homepage
add_image_size('header-image', 1920, 665, TRUE);
add_image_size('headermobile-image', 800, 460, TRUE);

// About
add_image_size('video-image', 1082, 675, TRUE);

// Blog
add_image_size('blog-image', 700, 330, TRUE);
add_image_size('blogheader-image', 1300, 500, TRUE);
add_image_size('fullwidth-image', 900, 9999, FALSE);

// Services
add_image_size('service-image', 950, 355, TRUE);
add_image_size('servicebig-image', 1000, 600, TRUE);