<div class="widget-flexgrid-gallery">
<div class="widget-flexgrid-gallery-xsdetect hidden-sm hidden-md hidden-lg"></div>
<?php

// check if the repeater field has rows of data
if( have_rows('images') ) {
	while ( have_rows('images') ) {
		the_row();

?>
		<a href="<?php echo get_sub_field('image')['sizes']['large'] ?>"
			data-clear="<?php echo get_sub_field('clear') ?>"
			data-aspect="<?php echo (get_sub_field('image')['sizes']['medium-width'] / get_sub_field('image')['sizes']['medium-height']) ?>">
			<img src="<?php echo get_sub_field('image')['sizes']['medium'] ?>">
		</a>
<?php
		if (get_sub_field('clear') == 'xs') {
?>
		<div class="clearfix hidden-sm hidden-md hidden-lg"></div>
<?php
		}
		if (get_sub_field('clear') == 'always') {
?>
		<div class="clearfix"></div>
<?php
		}
	}
}
?>
<div class="clearfix"></div>
</div><!-- widget-flexgrid-gallery -->
