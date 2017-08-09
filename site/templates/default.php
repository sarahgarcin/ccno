<?php snippet('header') ?>
<?php snippet('menu') ?>

<main class="small-11">
	<h2><?= $page->title()->html()?></h2>
	<?= $page->text()->kirbytext()?>
</main>

<?php snippet('footer') ?>
