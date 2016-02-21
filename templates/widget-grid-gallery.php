<div class="widget-grid-gallery">
<?php
	$image_ids = get_sub_field('gallery', false);
	$columns = get_sub_field('columns', false);
	$shortcode = '[gallery ids="' . implode(',', $image_ids) . '" columns="' . $columns . '" size="medium" link="file"]';
	echo do_shortcode( $shortcode );
	// echo $shortcode;
?>
</div><!-- widget-grid-gallery -->
