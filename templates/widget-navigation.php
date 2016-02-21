<div class="widget-navigation">
<?php
	if( have_rows('navigation') ) {
	while ( have_rows('navigation') ) {
		the_row();
?>
		<a href="<?php echo esc_url(get_sub_field('url')); ?>" class="btn btn-primary">
			<?php echo esc_html(get_sub_field('text')); ?>
		</a>
<?php
	}
	}
 ?>
</div><!-- widget-navigation -->
