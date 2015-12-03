<?php

namespace Roots\Sage\BootstrapShortcodes;



function fix_paragraphs($content) {
	// http://sww.nz/solution-to-wordpress-adding-br-and-p-tags-around-shortcodes/
	$content = do_shortcode( shortcode_unautop( $content ) );
	$content = wpautop(trim($content));

	return $content;
}

// ### GRID


// [bs-clearfix]
function clearfix( $atts, $content = null ) {
	return "<div class=\"clearfix\"></div>";
}


// [bs-container][/container]
function container( $atts, $content = null ) {

	return "<div class=\"container\">" . fix_paragraphs($content) . "</div>";
}



// [bs-row][/bs-row]
function row( $atts, $content = null ) {

	return "<div class=\"row\">" . fix_paragraphs($content) . "</div>";
}

// [bs-col xs="3"][/bs-col]
function col( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'xs' => false,
		'sm' => false,
		'md' => false,
		'lg' => false,
		'xs-offset' => false,
		'sm-offset' => false,
		'md-offset' => false,
		'lg-offset' => false,
	), $atts );

	$class='';
	if ($a['xs']) $class .= ' col-xs-'.$a['xs'];
	if ($a['xs-offset']) $class .= ' col-xs-offset-'.$a['xs-offset'];
	if ($a['sm']) $class .= ' col-sm-'.$a['sm'];
	if ($a['sm-offset']) $class .= ' col-sm-offset-'.$a['sm-offset'];
	if ($a['md']) $class .= ' col-md-'.$a['md'];
	if ($a['md-offset']) $class .= ' col-md-offset-'.$a['md-offset'];
	if ($a['lg']) $class .= ' col-lg-'.$a['lg'];
	if ($a['lg-offset']) $class .= ' col-lg-offset-'.$a['lg-offset'];
	$class = trim($class);

	return "<div class=\"".$class."\">" . fix_paragraphs($content) . "</div>";
}



// [bs-jumbotron background="/wp-content/uploads/background.jpg"][/bs-jumbotron]
function jumbotron( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'background' => '',
	), $atts );

	return "<div class=\"jumbotron\"". ($a['background'] ? " style=\"background-image: url(". $a['background'] .");\"" : "") .">" . fix_paragraphs($content) . "</div>";
}



// [shoplink url="http://aktionsgutscheine.myobis.com" linktext="Jetzt buchen"]Hier ist der Shop![/shoplink] 
function shoplink( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'url' => '#',
		'linktext' => 'Shop',
	), $atts );

	return "<div class=\"jumbotron shoplink\" style=\"background-image: url(". get_theme_mod('shop-background-image') .");\""  .">" .
	fix_paragraphs($content) .
	"<a href=\"". htmlspecialchars($a['url']) ."\" class=\"btn btn-default pull-right\">". htmlspecialchars($a['linktext']) ."</a>" .
	"<div class=\"clearfix\"></div>" .
	"</div>";
}


function register_shortcodes() {
	add_shortcode( 'bs-clearfix', __NAMESPACE__ . '\\clearfix' );
	add_shortcode( 'bs-container', __NAMESPACE__ . '\\container' );
	add_shortcode( 'bs-row', __NAMESPACE__ . '\\row' );
	add_shortcode( 'bs-col', __NAMESPACE__ . '\\col' );
	add_shortcode( 'bs-jumbotron', __NAMESPACE__ . '\\jumbotron' );
	add_shortcode( 'shoplink', __NAMESPACE__ . '\\shoplink' );



	// Ugly hack to get rid of broken P elements
	// http://sww.nz/solution-to-wordpress-adding-br-and-p-tags-around-shortcodes/
//	remove_filter( 'the_content', 'wpautop' );
//	add_filter( 'the_content', '\wpautop' , 12);
}

add_action( 'init', __NAMESPACE__ . '\\register_shortcodes');

