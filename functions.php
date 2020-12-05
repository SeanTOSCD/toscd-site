<?php
/**
 * Theme functions
 */

define( 'TOSCD_SITE_VERSION', '1.0.0' );

define( 'TOSCD_ROOT', dirname(__FILE__) );
define( 'TOSCD_INCLUDES', TOSCD_ROOT . '/includes/' );
define( 'TOSCD_TEMPLATE_URI', trailingslashit( get_template_directory_uri() ) );
define( 'TOSCD_STYLESHEET_URI', trailingslashit( get_stylesheet_directory_uri() ) );

define( 'TOSCD_ASSETS', TOSCD_STYLESHEET_URI . 'includes/assets/' );
define( 'TOSCD_IMAGES', TOSCD_STYLESHEET_URI . 'includes/assets/images/' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function toscd_theme_setup() {

	// Specialized functions
	include( TOSCD_INCLUDES . 'general.php' );
}
add_action( 'after_setup_theme', 'toscd_theme_setup' );

/**
 * Inherit styles from parent theme and register additional assets
 */
function toscd_styles_scripts() {

	// With SCRIPT_DEBUG set to true, prepare to load unminified resources
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Resource dependencies
	$parent_css = 'parent-style';
	$child_css  = 'child-style';

	$style_dependencies = array( $parent_css );

	// Enqueue parent theme stylesheet
	wp_enqueue_style( $parent_css, TOSCD_TEMPLATE_URI . 'style.css' );

	// Register child theme stylesheet for later use
	wp_register_style( $child_css, TOSCD_STYLESHEET_URI . 'style.css', $style_dependencies, TOSCD_SITE_VERSION );

	// Enqueue child styles last so it easily overrides other styles
	wp_enqueue_style( $child_css );
}
add_action( 'wp_enqueue_scripts', 'toscd_styles_scripts' );