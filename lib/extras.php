<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
	// Add page slug if it doesn't exist
	if (is_single() || is_page() && !is_front_page()) {
		if (!in_array(basename(get_permalink()), $classes)) {
			$classes[] = basename(get_permalink());
		}
	}

	// Add class if sidebar is active
	if (Setup\display_sidebar()) {
		$classes[] = 'sidebar-primary';
	}

	return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
	return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');



// ### Setup image sizes ###
if (is_admin()) {
	// This overwrites everything you enter in /wp-admin/options-media.php
	update_option( 'thumbnail_size_w', 900 );
	update_option( 'thumbnail_size_h', 600 );
	update_option( 'thumbnail_crop', 1 );

	update_option( 'medium_size_w', 900 );
	update_option( 'medium_size_h', 600 );
	update_option( 'medium_crop', 0 );

	update_option( 'large_size_w', 1500 );
	update_option( 'large_size_h', 1000 );
	update_option( 'large_crop', 0 );
}







// ### Setup Logo image
function theme_customize_logo( $wp_customize ) {

	$wp_customize->add_section( 'theme_header_images' , array(
		'title'      => 'Logo',
		'description' => 'Seitenverhältnis 2:3 beachten.',
		'priority'   => 30,
	) );

	$wp_customize->add_setting( 'logo' , array() );

	$wp_customize->add_control( new \WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label'    => 'Logo',
		'section'  => 'theme_header_images',
		'settings' => 'logo',
	)));

}
add_action( 'customize_register',  __NAMESPACE__ .'\\theme_customize_logo' );


// ### Setup Shop link background image
function theme_customize_shop_link_background( $wp_customize ) {

	$wp_customize->add_section( 'theme_shop_background' , array(
		'title'      => 'Shop-Links',
		'description' => 'Shortcode: [shoplink url="http://aktionsgutscheine.myobis.com" linktext="Jetzt buchen"]Hier ist der Shop![/shoplink]',
		'priority'   => 30,
	) );

	$wp_customize->add_setting( 'shop-background-image' , array() );

	$wp_customize->add_control( new \WP_Customize_Image_Control($wp_customize, 'shop-background-image', array(
		'label'    => 'Hintergrund-Bild',
		'section'  => 'theme_shop_background',
		'settings' => 'shop-background-image',
	)));

}
add_action( 'customize_register',  __NAMESPACE__ .'\\theme_customize_shop_link_background' );
