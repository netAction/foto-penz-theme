<?php while (have_posts()) : the_post(); ?>

	<?php get_template_part('templates/widget-blogpost'); ?>
	<?php comments_template('/templates/comments.php'); ?>

<?php endwhile; ?>
