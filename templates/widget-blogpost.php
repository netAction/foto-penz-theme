<div class="widget-blogpost">
	<?php if ( has_post_thumbnail() ) { ?>
	<article>
		<div class="widget-blogpost-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
		<header>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php get_template_part('templates/entry-meta'); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>
	<?php } else { ?>
	<article>
		<header>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php get_template_part('templates/entry-meta'); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</article>
	<?php } ?>
</div><!-- widget-blogpost -->
