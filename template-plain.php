<!-- Template: template-plain.php --><?php
/**
 * Template Name: Schlicht
 */
?>

<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
