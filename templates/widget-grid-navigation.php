<div class="widget-grid-navigation grid-gallery">
<div class="row">
<?php
	$columns = get_sub_field('columns');
	switch ($columns) {
		case 1: $grid = 'col-xs-12 col'; break;
		case 2: $grid = 'col-xs-6 col'; break;
		case 3: $grid = 'col-xs-4 col'; break;
		case 4: $grid = 'col-xs-6 col-md-3 col'; break;
		case 6: $grid = 'col-xs-4 col-md-2 col'; break;
		default: $grid = 'col-xs-4 col';
	}

	if( have_rows('navigation') ) {
	while ( have_rows('navigation') ) {
		the_row();
?>
	<div class="<?php echo $grid; ?>">
		<a href="<?php echo get_sub_field('url') ?>" class="grid-gallery-link grid-gallery-navlink">
			<div class="grid-gallery-image-wrapper">			
				<?php echo wp_get_attachment_image(get_sub_field('image'), 'thumbnail', false, false); ?>
				<div class="title"><span><?php echo esc_html(get_sub_field('text')); ?></span></div>
			</div>
		</a>
	</div>
<?php
	}
	}
 ?>
</div><!-- row -->
</div><!-- widget-grid-navigation -->
