<div class="widget-jumbobox">
	<?php if (get_sub_field('background-image')) {
		?><div class="jumbotron" style="background-image: url(<?php echo wp_get_attachment_image_src(get_sub_field('background-image', false), 'medium')[0]; ?>);"><?php
	} else {
		?><div class="jumbotron"><?php
	} ?>
		<div class="row">
			<div class="col-sm-7 col-md-6 col-lg-5">
				<div class="h1"><?php echo esc_html(get_sub_field('heading')); ?></div>
				<?php echo wpautop(esc_html(get_sub_field('text'))); ?>
				<?php if (get_sub_field('button-text')) { ?><div class="text-center">
					<br>
					<a href="<?php echo esc_url(get_sub_field('button-url')); ?>" class="btn btn-primary"><?php echo esc_html(get_sub_field('button-text')); ?></a>
				</div><?php } ?>
			</div>
		</div><!-- row -->
	</div>
</div><!-- widget-jumbobox -->
