
<nav class="nav-primary-secondlevel">
	<?php
	if (has_nav_menu('primary_navigation')) :
		wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'depth' => 2]);
	endif;
	?>
</nav>


<?php // Is blog? https://gist.github.com/wesbos/1189639 ?>
<?php global $post; if ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( get_post_type($post) == 'post') ) { ?>
<?php dynamic_sidebar('sidebar-blog'); ?>
<?php } else { ?>
<?php dynamic_sidebar('sidebar-primary'); ?>
<?php } ?>
