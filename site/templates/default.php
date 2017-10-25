<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php $mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
  $day = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
?>


<div class ="row">

	<?php snippet('left-col') ?>
	<main class="small-18 medium-13 columns">
		<?php snippet('breadcrumb') ?>
		<h1><?= $page->title()->html() ?></h1>
		<?php if($page->icone()->isNotEmpty()):?>
			<div class="icone">
				<img src="<?php echo $page->icone()->toFile()->url() ?>" alt="">
			</div>
		<?php endif ?>
		<div class="row">
			<div class="text icones-wrapper-text small-18 medium-16 medium-push-2 large-11 large-push-2 columns">
				<?php echo $page->text()->kirbytext() ?>
				<?php if($page->bio()->isNotEmpty()):?>
					<div class="biography small-8">
						<?php echo $page->bio()->kirbytext()?>
					</div>
				<?php endif?>
				<?php snippet('icones') ?>
			</div>
			<?php if($page->parent()->template() != "list"):?>
				<?php if($page->dates()->isNotEmpty()):
					snippet('dates');
				endif?>
			<?php endif?>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

