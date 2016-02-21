<div class="widget-slider-gallery row">
<div class="col-sm-6 col-md-6">
<div class="widget-richtext">
<?php
	the_sub_field('richtext');
?>
</div><!-- widget-richtext -->
</div>
<div class="col-sm-6 col-md-6">
<?php
	$image_ids = get_sub_field('gallery', false);
	$shortcode = '[gallery-slider ids="' . implode(',', $image_ids) . '"]';
	echo do_shortcode( $shortcode );
?>
</div>
</div><!-- widget-slider-gallery -->
