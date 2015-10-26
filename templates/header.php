<header class="banner">
	<div class="container">
		<div class="header-titleimage">

			<?php if (get_theme_mod('header_image_xs')) { ?>
				<img src="<?php echo get_theme_mod('header_image_xs'); ?>" class="image visible-xs">
			<?php } ?>
			<?php if (get_theme_mod('header_image_sm')) { ?>
				<img src="<?php echo get_theme_mod('header_image_sm'); ?>" class="image visible-sm">
			<?php } ?>
			<?php if (get_theme_mod('header_image_md')) { ?>
				<img src="<?php echo get_theme_mod('header_image_md'); ?>" class="image visible-md">
			<?php } ?>
			<?php if (get_theme_mod('header_image_lg')) { ?>
				<img src="<?php echo get_theme_mod('header_image_lg'); ?>" class="image visible-lg">
			<?php } ?>

			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

	</div>



		<nav class="navbar navbar-default nav-primary">
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<?php
				if (has_nav_menu('primary_navigation')) :
					wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav', 'depth' => 1]);
				endif;
				?>

			</div><!-- /.navbar-collapse -->
		</nav>


		<nav class="nav-primary">
		</nav>
	</div>
</header>