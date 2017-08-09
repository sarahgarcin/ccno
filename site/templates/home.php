
<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php snippet('icones') ?>

<main id="pjax-container" data-rubrique="home">
	<div>
			<h1><?= $page->title()->html() ?></h1>
			<?php echo $page->text()->kirbytext() ?>
	</div>
</main>


<?php snippet('footer') ?>

