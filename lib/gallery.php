<?php

// https://github.com/roots/sage/blob/5b9786b8ceecfe717db55666efe5bcf0c9e1801c/lib/gallery.php
// Removed from roots/sage: https://github.com/roots/sage/commit/7066299690e28946b70a289350eb317e4f5ee747


namespace Roots\Sage\Gallery;

/**
 * Clean up gallery_shortcode()
 *
 * Re-create the [gallery] shortcode and use thumbnails styling from Bootstrap
 * The number of columns must be a factor of 12.
 *
 * @link http://getbootstrap.com/components/#thumbnails
 */
function gallery($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if (!empty($attr['ids'])) {
		if (empty($attr['orderby'])) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	$output = apply_filters('post_gallery', '', $attr);

	if ($output != '') {
		return $output;
	}

	if (isset($attr['orderby'])) {
		$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
		if (!$attr['orderby']) {
			unset($attr['orderby']);
		}
	}

	extract(shortcode_atts([
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => '',
		'icontag'    => '',
		'captiontag' => '',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	], $attr));

	$id = intval($id);
	$columns = (12 % $columns == 0) ? $columns : 3;
	if ($columns == 4) {
		// 4 Columns
		$grid = sprintf('col-xs-6 col-md-3 col', 12 / $columns);
	} else {
		$grid = sprintf('col-xs-%1$s col', 12 / $columns);
	}

	if ($order === 'RAND') {
		$orderby = 'none';
	}

	if (!empty($include)) {
		$_attachments = get_posts(['include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby]);

		$attachments = [];
		foreach ($_attachments as $key => $val) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif (!empty($exclude)) {
		$attachments = get_children(['post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby]);
	} else {
		$attachments = get_children(['post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby]);
	}

	if (empty($attachments)) {
		return '';
	}

	if (is_feed()) {
		$output = "\n";
		foreach ($attachments as $att_id => $attachment) {
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		}
		return $output;
	}

	$unique = (get_query_var('page')) ? $instance . '-p' . get_query_var('page') : $instance;
	$output = '<div class="grid-gallery grid-gallery-' . $id . '-' . $unique . '">'."\n";

	$i = 0;
	foreach ($attachments as $id => $attachment) {

		$output .= ($i % $columns == 0) ? '<div class="row">'."\n" : '';
		$output .= '<div class="' . $grid .'">'."\n";


		if ($attachment->linkurl) {
			// start link on image and all captions, title and so on
			$output .= '<a href="'. htmlspecialchars($attachment->linkurl) .'" class="grid-gallery-navlink">';
		} else if ($link == 'file') {
			// this time a link to the image file URL
			$output .= '<a href="'. htmlspecialchars($attachment->guid) .'" class="grid-gallery-navlink">';
		}

		$output .= '<div class="grid-gallery-image-wrapper">'."\n";

		$image = wp_get_attachment_image($id, $size, false, false);
		$output .= $image."\n";

		if (trim($attachment->post_title)) {
			$output .= '<div class="title"><span>' . wptexturize($attachment->post_title) . '</span></div>'."\n";
		}

		$output .= '</div>';

		if (trim($attachment->post_excerpt)) {
			$output .= '<div class="caption">'."\n" . wptexturize($attachment->post_excerpt) . '</div>'."\n";
		}

		if (($attachment->linkurl) || ($link == 'file')) {
			$output .= '<!-- end link --></a>'."\n";
		}


		$output .= '</div>'."\n";
		$i++;
		$output .= ($i % $columns == 0) ? '</div>'."\n" : '';
	}

	$output .= ($i % $columns != 0 ) ? '</div>'."\n" : '';
	$output .= '</div>';

	return $output;
}

remove_shortcode('gallery');
add_shortcode('gallery', __NAMESPACE__ . '\\gallery');
add_filter('use_default_gallery_style', '__return_null');
