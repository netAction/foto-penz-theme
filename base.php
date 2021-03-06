<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
	<?php get_template_part('templates/head'); ?>
	<body <?php body_class(); ?>>
		<!--[if lt IE 9]>
			<div class="alert alert-warning">
				<?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
			</div>
		<![endif]-->
		<?php
			do_action('get_header');
			get_template_part('templates/header');
		?>
		<div class="main-wrap container" role="document">
			<?php if (Setup\display_sidebar()) { ?>
			<div class="row">
				<div class="col-md-9">
				<?php } else { ?>
				<?php } ?>
					<main class="main">
						<?php include Wrapper\template_path(); ?>
					</main><!-- /.main -->
				</div>

				<?php if (Setup\display_sidebar()) { ?>
				<div class="col-md-3">
					<aside class="sidebar">
						<?php include Wrapper\sidebar_path(); ?>
					</aside><!-- /.sidebar -->
				</div>
			</div><!-- row -->
			<?php } ?>
		</div><!-- main-wrap -->
		<?php
			do_action('get_footer');
			get_template_part('templates/footer');
			wp_footer();
		?>
	</body>
</html>
