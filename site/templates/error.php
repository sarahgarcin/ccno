<?php snippet('header') ?>
<?php snippet('menu') ?>

<div class ="row">

	<?php snippet('left-col') ?>
	<main class="error-page small-18 medium-6 medium-push-7 large-6 large-push-7 end columns">
		<h2><?php echo $page->text()->html() ?></h2>
		<div class="image-wrapper small-18">
			<img src="<?php echo $page->images()->first()->url()?>" alt="<?php echo $page->image()->first()->filename()?>">
		</div>

		<audio autoplay>
		  <source src="<?php echo $page->audio()->first()->url()?>" type="<?php echo $page->audio()->first()->mime() ?>">
		  Your browser does not support the audio element.
		</audio>
		<?php //snippet('icones') ?>
		
	</main>
</div>


<?php snippet('footer') ?>