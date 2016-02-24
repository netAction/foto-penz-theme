<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


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

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/assets/img/apple-touch-icon-114x114-precomposed.png" />
	<?php wp_head(); ?>
</head>
