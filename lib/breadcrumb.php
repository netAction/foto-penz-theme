<?php

namespace Roots\Sage\Breadcrumb;


// Copypaste from http://blog.kulturbanause.de/2011/08/wordpress-breadcrumb-navigation-ohne-plugin/

function nav_breadcrumb() {


function get_category_parents_listelements( $id, $visited = array() ) {
	// Dies ist eine Abwandlung vom Original get_category_parents aus Wordpress 4.3.
	$link = true;
	$chain = '';
	$parent = get_term( $id, 'category' );
	if ( is_wp_error( $parent ) )
		return $parent;

	$name = $parent->name;

	if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
		$visited[] = $parent->parent;
		$chain .= get_category_parents_listelements( $parent->parent, $visited );
	}

	$chain .= '<li><a href="' . esc_url( get_category_link( $parent->term_id ) ) . '">'.$name.'</a></li>';
	return $chain;
}



	$home = 'Startseite'; 
	$before = '<li>'; 
	$after = '</li>'."\n"; 

		if ( !is_front_page() || is_paged() ) {

		echo '<ol class="breadcrumb">'."\n";

		global $post;
		$homeLink = get_bloginfo('url');
		echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>'."\n";

		if ( is_category()) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents_listelements($parentCat));
			echo $before . single_cat_title('', false) . $after;
		} elseif ( is_day() ) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>'."\n";
			echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>'."\n";
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>'."\n";
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
			$post_type = get_post_type_object(get_post_type());
			$slug = $post_type->rewrite;
			echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>'."\n";
			echo $before . get_the_title() . $after;
			} else {
			//$cat = get_the_category(); $cat = $cat[0];
			//echo get_category_parents_listelements($cat);
			echo $before . '<a href="'. get_permalink( get_option( 'page_for_posts' ) ) .'">Aktuelles</a>' . $after;
			echo $before . get_the_title() . $after;
			}
		} elseif ( is_home() ) {
			echo $before . 'Aktuelles' . $after;
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents_listelements($cat);
			echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>'."\n";
			echo $before . get_the_title() . $after;
			
		} elseif ( is_page() && !$post->post_parent ) {
		echo $before . get_the_title() . $after;
		
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>'."\n";
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ';
			echo $before . get_the_title() . $after;
			
		} elseif ( is_search() ) {
			echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;
		
		} elseif ( is_tag() ) {
			echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;

		} elseif ( is_tag() ) {
			echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;

		} elseif ( is_404() ) {
			echo $before . 'Fehler 404' . $after;
		}
		
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo ': ' . __('Seite') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
		
		echo '</ol>'."\n";
		
	} 
}
