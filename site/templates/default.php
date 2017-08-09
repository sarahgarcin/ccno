<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php snippet('icones') ?>


<main id="pjax-container">
  <meta data-rubrique="<?php
    echo $section = getRubriqueFromUri($page->uri());
  ?>">
	<div>
			<h1><?= $page->title()->html() ?></h1>
			<?php echo $page->text()->kirbytext() ?>
	</div>
</main>

<?php snippet('footer') ?>

