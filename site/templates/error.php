<?php snippet('header') ?>

<div>
	<?php snippet('menu') ?>

	<main class="row">
		<?php snippet('left-col') ?>
		<div class="default_main col-xs-12 col-sm-11 col-sm-offset-1 col-md-9 col-md-offset-1">
			<div class="main-content">
			<h2><?php echo $page->text()->html() ?></h2>
			<div class="image-wrapper col-xs-12 col-md-8">
				<img src="<?php echo $page->images()->first()->url()?>" alt="<?php echo $page->image()->first()->filename()?>">
			</div>

			<audio autoplay>
			  <source src="<?php echo $page->audio()->first()->url()?>" type="<?php echo $page->audio()->first()->mime() ?>">
			  Your browser does not support the audio element.
			</audio>
		</div>
		
	</main>
</div>


<?php snippet('footer') ?>