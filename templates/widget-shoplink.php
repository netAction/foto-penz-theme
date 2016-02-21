<div class="widget-shoplink">
	<?php if (get_theme_mod('shop-background-image')) {
		?><div class="jumbotron" style="background-image: url(<?php echo get_theme_mod('shop-background-image'); ?>);"><?php
	} else {
		?><div class="jumbotron"><?php
	} ?>

		<div class="h1"><?php echo esc_html(get_sub_field('heading')); ?></div>
		<?php echo wpautop(esc_html(get_sub_field('text'))); ?>
		<a href="<?php echo esc_url(get_sub_field('button-url')); ?>" class="btn btn-default pull-right"><?php echo esc_html(get_sub_field('button-text')); ?></a>
		<div class="clearfix"></div>

	</div>
</div><!-- widget-shoplink -->
