<?php
/**
 * General functions
 */

/**
 * Conditionally add body classes to the site structure
 *
 * @param $classes Already-applied body classes
 *
 * @return array
 */
function toscd_body_classes( $classes ) {
	global $post;

	if ( is_front_page() ) {
		$classes[] = 'custom-landing';
	}

	// Add page slug to body class (ex: "page-about")
	if ( isset( $post ) ) {
		$classes[] =  $post->post_type . '-' . $post->post_name;
	}

	return $classes;
}
add_action( 'body_class', 'toscd_body_classes' );