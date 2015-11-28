<?php use Roots\Sage\Titles; ?>

<?php if (Titles\title()) { ?>
<div class="page-header">
	<h2><span><?= Titles\title(); ?></span></h2>
</div>
<?php } ?>
