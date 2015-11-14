<header class="banner">
	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-xs-offset-4 col-sm-4 col-sm-offset-0 col-md-3 col-lg-3 banner-logo-col">
				<a href="<?= esc_url(home_url('/')); ?>">
					<img src="<?php echo get_theme_mod('logo'); ?>" class="banner-logo">
				</a>
			</div>
			<div class="clearfix hidden-sm hidden-md hidden-lg"></div>
			<div class="col-sm-8 col-md-9 col-lg-9">
				<?php
					// ### Load background image ###
					// For every list of blog posts or the posts itself, take the image from the blog's home.
					if (is_archive() || is_home() || is_single() || is_404() || is_search()) {
						$background_image_post_id = get_option('page_for_posts');
						$background_image_post = get_post($background_image_post);
					} else {
						$background_image_post_id = $post->ID;
						$background_image_post = $post;
					}

					if ( has_post_thumbnail($background_image_post_id) ) { ?>
					<div>
						<div class="banner-thumbnail" style="background-image: url(<?php
							echo wp_get_attachment_image_src( get_post_thumbnail_id($background_image_post_id), 'medium' )[0];
						?>);"></div>
					</div>
				<?php } else { ?>
					<div class="background-image">Beitragsbild fehlt!
						<div></div>
					</div>
				<?php } ?>

				<?php get_template_part('templates/page', 'header'); ?>
			</div>
		</div><!-- row -->
	</div>
</header>