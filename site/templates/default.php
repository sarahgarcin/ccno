<?php snippet('header') ?>
<?php snippet('icones') ?>
<?php snippet('menu') ?>

<main id="pjax-container">
  <meta data-rubrique="<?php
    echo $section = getRubriqueFromUri($page->uri());
  ?>">
	<div class="small-9 columns">
			<h1><?= $page->title()->html() ?></h1>
			<?php echo $page->text()->kirbytext() ?>
	</div>
</main>

<?php snippet('menu2') ?>

<?php snippet('footer') ?>

