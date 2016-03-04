<div class="widget-richtext">
<?php if (get_sub_field('full-width')) { ?>
<?php
	the_sub_field('richtext');
?>
<?php } else { /* schmal zentriert */ ?>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<?php
				the_sub_field('richtext');
			?>
		</div>
	</div>
<?php } ?>
</div><!-- widget-richtext -->
