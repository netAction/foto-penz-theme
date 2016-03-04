<div class="widget-slider-gallery">
<?php if (get_sub_field('position') == 'center') { ?>
	<div class="widget-richtext">
	<?php
		the_sub_field('richtext');
	?>
	</div><!-- widget-richtext -->
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="widget-slider-gallery-gallery">
			<?php
				$images = get_sub_field('gallery');
				foreach ($images as $image) { ?>
			<a href="<?php echo $image['sizes']['medium_large'] ?>">
				<img src="<?php echo $image['sizes']['micro-thumb'] ?>">
			</a>
				<?php }
			?>
			</div>
		</div>
	</div>
<?php } else { /* right */ ?>
	<div class="row">
		<div class="col-sm-4">
			<div class="widget-richtext">
			<?php
				the_sub_field('richtext');
			?>
			</div><!-- widget-richtext -->
		</div>
		<div class="col-sm-8">
			<div class="widget-slider-gallery-gallery">
			<?php
				$images = get_sub_field('gallery');
				foreach ($images as $image) { ?>
			<a href="<?php echo $image['sizes']['medium_large'] ?>">
				<img src="<?php echo $image['sizes']['micro-thumb'] ?>">
			</a>
				<?php }
			?>
			</div>
		</div>
	</div>
<?php } ?>
</div><!-- widget-slider-gallery -->
