<div class="widget-blogexcerpt">
	<h2>Blog</h2>

	<?php
		$recentPosts = new WP_Query();
		$recentPosts->query('showposts=3');

		while ($recentPosts->have_posts()) : $recentPosts->the_post();

		get_template_part('templates/widget-blogpost', 'small');

		endwhile;
		wp_reset_postdata();
	?>
</div><!-- widget-blogexcerpt -->
