<?php snippet('header') ?>
<?php snippet('en-cours') ?>
<?php snippet('menu') ?>


<div class ="row">

	<?php snippet('left-col') ?>

	<main class="small-18 medium-13 columns" data-color="<?php echo $page->color()?>">
		<h1><?= $page->title()->html() ?></h1>
		<?php if($page->icone()->isNotEmpty()):?>
			<div class="icone">
				<img src="<?php echo $page->icone()->toFile()->url() ?>" alt="">
			</div>
		<?php endif ?>
		<div class="text icones-wrapper-text small-16 small-push-2 medium-16 medium-push-2 large-11 large-push-2">
			<?php echo $page->text()->kirbytext() ?>
			<?php snippet('icones') ?>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

