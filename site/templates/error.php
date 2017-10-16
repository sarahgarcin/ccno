<?php snippet('header') ?>

<main class="error-page small-6 small-push-6">
	<div class="image-wrapper small-18">
		<img src="<?php echo $page->images()->first()->url()?>" alt="<?php echo $page->image()->first()->filename()?>">
	</div>

	<audio autoplay>
	  <source src="<?php echo $page->audio()->first()->url()?>" type="<?php echo $page->audio()->first()->mime() ?>">
	  Your browser does not support the audio element.
	</audio>
	<?php snippet('icones') ?>
	
</main>


<?php snippet('footer') ?>