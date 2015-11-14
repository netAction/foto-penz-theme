<!--
<nav class="nav-primary-secondlevel">
	<?php
	if (has_nav_menu('primary_navigation')) :
		wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'depth' => 2]);
	endif;
	?>
</nav>
-->

<?php dynamic_sidebar('sidebar-primary'); ?>
