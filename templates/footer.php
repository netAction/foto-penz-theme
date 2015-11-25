<footer>
	<div class="container footer-navigations">

		<?php if (has_nav_menu('primary_navigation')) { ?>
			<nav class="footer-nav">
				<?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'depth' => 2]); ?>
			</nav>
		<?php } ?>

	</div>

	<div class="container header-footer-widgets footer-widgets hidden-sm hidden-md hidden-lg">
		<?php dynamic_sidebar('sidebar-header'); ?>
	</div>

	<div class="container header-footer-widgets">
		<?php dynamic_sidebar('sidebar-footer'); ?>
	</div>
</footer>
