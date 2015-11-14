<footer>
	<div class="container footer-navigations">
		<nav class="footer-nav nav-primary-thirdlevel">
			<?php
			if (has_nav_menu('primary_navigation')) :
				wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'depth' => 3]);
			endif;
			?>
		</nav>

		<nav class="footer-nav nav-primary-secondlevel">
			<?php
			if (has_nav_menu('primary_navigation')) :
				wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'depth' => 2]);
			endif;
			?>
		</nav>

		<nav class="footer-nav nav-primary">
			<?php
			if (has_nav_menu('primary_navigation')) :
				wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'depth' => 1]);
			endif;
			?>
		</nav>

	</div>

	<div class="container header-footer-widgets hidden-sm hidden-md hidden-lg">
		<?php dynamic_sidebar('sidebar-header'); ?>
	</div>

	<div class="container header-footer-widgets">
		<?php dynamic_sidebar('sidebar-footer'); ?>
	</div>
</footer>
