<footer class="content-info">
	<div class="container">


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


		<?php dynamic_sidebar('sidebar-footer'); ?>
	</div>
</footer>
