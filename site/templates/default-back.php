<?php snippet('header') ?>

<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
  $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>




<div class ="row">

	<?php snippet('left-col') ?>
	<?php snippet('menu') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		
		<div class="main-content">
			<?php if($page->parent()->intendedTemplate() == "maud" || $page->intendedTemplate() == "theme" || $page->intendedTemplate() == "accueil"):?>
				<div class="arrow-back">
					<a href="" onclick="window.history.go(-1); return false;" title="<?php echo $page->parent()->title()?>">
						<
					</a>
				</div>
			<?php endif ?>
			<h1 class="small-9 medium-7 large-7">
				<?= $page->title()->html() ?>	
			</h1>
			<?php snippet('icone-page')?>
			<div class="row">
				<div class="text icones-wrapper-text small-18 medium-16 medium-push-2 large-11 large-push-2 xlarge-8 columns">
					<?php echo $page->text()->kirbytext() ?>
					<?php if($page->bio()->isNotEmpty()):?>
						<div class="biography small-8">
							<?php echo $page->bio()->kirbytext()?>
						</div>
					<?php endif?>
				</div>
				<?php if($page->parent()->template() != "list"):?>
					<?php if($page->dates()->isNotEmpty()):
						snippet('dates');
					endif?>
				<?php endif?>
			</div>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

