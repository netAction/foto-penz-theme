<?php
	the_content();

	if ( ! post_password_required() ) {
		get_template_part('templates/flexible-content');
	}

//	wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']);
?>
