<div class="container header-footer-widgets hidden-xs">
	<?php dynamic_sidebar('sidebar-header'); ?>
</div>

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
					// http://wordpress.stackexchange.com/questions/149164/featured-image-inherited-from-parent-page
					function inherited_featured_image( $page = NULL ) {
						if ( is_numeric( $page ) ) {
							$page = get_post( $page );
						} elseif( is_null( $page ) ) {
							$page = isset( $GLOBALS['post'] ) ? $GLOBALS['post'] : NULL;
						}
						if ( ! $page instanceof WP_Post ) return false;
						// if we are here we have a valid post object to check,
						// get the ancestors
						$ancestors = get_ancestors( $page->ID, $page->post_type );
						if ( empty( $ancestors ) ) return false;
						// ancestors found, let's check if there are featured images for them
						global $wpdb;
						$metas = $wpdb->get_results(
							"SELECT post_id, meta_value
							FROM {$wpdb->postmeta}
							WHERE meta_key = '_thumbnail_id'
							AND post_id IN (" . implode( ',', $ancestors ) . ");"
						);
						if ( empty( $metas ) ) return false;
						// extract only post ids from meta values
						$post_ids = array_map( 'intval', wp_list_pluck( $metas, 'post_id' ) ); 
						// compare each ancestor and if return meta value for nearest ancestor 
						foreach ( $ancestors as $ancestor ) {
							if ( ( $i = array_search( $ancestor, $post_ids, TRUE ) ) !== FALSE ) {
								//return $post_ids;
								return $metas[$i]->post_id;
							}
						}
						return false;
					}

					// Search for a page that has a thumbnail image. Try this page first, then all parents, then home page.
					if (is_single() && has_post_thumbnail( get_option('page_for_posts' )) ) {
						// Blog-Artikel nehmen Artikelbild von Blog-Übersicht und nicht ihr eigenes
						$background_image_post_id = get_option('page_for_posts');
					} else if ( has_post_thumbnail( get_queried_object_id() ) ) {
						$background_image_post_id = get_queried_object_id();
					} else {
						$background_image_post_id = inherited_featured_image();

						if (!$background_image_post_id) {
							$background_image_post_id = get_option('page_on_front');
						}
					}

					if ( $background_image_post_id && has_post_thumbnail($background_image_post_id) ) { ?>
					<div>
						<div class="banner-thumbnail" style="background-image: url(<?php
							echo wp_get_attachment_image_src( get_post_thumbnail_id($background_image_post_id), 'medium' )[0];
						?>);"></div>
					</div>
				<?php } else { ?>
					<div><div class="banner-thumbnail">
						Beitragsbild fehlt!
					</div></div>
				<?php } ?>

				<?php get_template_part('templates/page', 'header'); ?>
			</div>
		</div><!-- row -->

		<?php Roots\Sage\Breadcrumb\nav_breadcrumb(); ?>
	</div>
</header>