<div class="widget-blogpost-small">
	<?php if ( has_post_thumbnail() ) { ?>
	<article>
		<header>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php get_template_part('templates/entry-meta'); ?>
		</header>

		<div class="row"><div class="col-sm-5">
			<div class="widget-blogexcerpt-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
		</div><div class="col-sm-7">
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
		</div></div>
	</article>
	<?php } else { ?>
	<article>
		<header>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php get_template_part('templates/entry-meta'); ?>
		</header>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	</article>
	<?php } ?>
</div><!-- widget-blogpost-small -->
