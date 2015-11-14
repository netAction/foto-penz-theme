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
	update_option( 'thumbnail_size_w', 854 );
	update_option( 'thumbnail_size_h', 480 );
	update_option( 'thumbnail_crop', 1 );

	update_option( 'medium_size_w', 854 );
	update_option( 'medium_size_h', 480 );
	update_option( 'medium_crop', 0 );

	update_option( 'large_size_w', 1920 );
	update_option( 'large_size_h', 1080 );
	update_option( 'large_crop', 0 );
}







// ### Setup header images for all screen sizes
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





// ### Extra-Feld bei Medien für URL, zu der die Datei in der Galerie linkt
function add_attachment_url_field( $form_fields, $post ) {
	$field_value = get_post_meta( $post->ID, 'linkurl', true );
	$form_fields['linkurl'] = array(
		'value' => $field_value ? $field_value : '',
		'label' => 'Ziel-URL',
	);
	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', __NAMESPACE__ .'\\add_attachment_url_field', 10, 2 );

function save_attachment_url($post, $attachment) {
	if( isset( $attachment['linkurl'] ) ) {
		update_post_meta( $post['ID'], 'linkurl', esc_url( $attachment['linkurl'] ) );
	}

	return $post;
}
add_filter('attachment_fields_to_save', __NAMESPACE__ .'\\save_attachment_url', 10, 2);


