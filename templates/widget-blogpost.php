<div class="widget-blogpost">
<?php
	if(is_single()) {
		if(has_post_thumbnail()) {
			$img_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0];
		} else {
			$img_src = get_theme_mod('logo');
		}
?>
	<meta property="og:title" content="<?php echo the_title(); ?>"/>
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="<?php echo the_permalink(); ?>"/>
	<meta property="og:site_name" content="Foto-Studio Penz"/>
	<meta property="og:image" content="<?php echo $img_src; ?>"/>
<?php } ?>
	<?php if ( has_post_thumbnail() ) { ?>
	<article>
		<div class="widget-blogpost-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<header>
			<h3 class="entry-title"><?php the_title(); ?></h3>
			<?php get_template_part('templates/entry-meta'); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>
	<?php } else { ?>
	<article>
		<header>
			<h3 class="entry-title"><?php the_title(); ?></h3>
			<?php get_template_part('templates/entry-meta'); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>
	<?php } ?>
</div><!-- widget-blogpost -->
