<?php snippet('header') ?>

<?php $mois = [l::get('janvier'), l::get('fevrier'), l::get('mars'), l::get('avril'), l::get('mai'), l::get('juin'), l::get('juillet'), l::get('aout'), l::get('septembre'), l::get('octobre'), l::get('novembre'), l::get('decembre')];
  $day = [l::get('lundi'),l::get('mardi'),l::get('mercredi'),l::get('jeudi'),l::get('vendredi'),l::get('samedi'),l::get('dimanche')];
?>


<div>
	<?php snippet('menu') ?>

	<main class="row">
		<?php snippet('left-col') ?>
		<div class="default_main col-xs-12 col-sm-11 col-sm-offset-1 col-md-9 col-md-offset-1">
			<div class="main-content">
				<?php if($page->parent()->intendedTemplate() == "maud" || $page->intendedTemplate() == "theme" || $page->intendedTemplate() == "accueil" || $page->parent()->intendedTemplate() == 'jgm'):?>
					<div class="arrow-back">
						<a href="" onclick="window.history.go(-1); return false;" title="<?php echo $page->parent()->title()?>">
							<
						</a>
					</div>
				<?php endif ?>
			<h1 class="main-content_title col-xs-12">
				<?= $page->title()->html() ?>	
			</h1>
			<?php snippet('icone-page')?>
			<div class="row">
				<div class="text col-xs-12 col-md-7 col-md-offset-1">
					<?php echo $page->text()->kirbytext() ?>
					<?php if($page->bio()->isNotEmpty()):?>
						<div class="biography">
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
		</div>

	</main>

</div>
	
</div>


<?php snippet('footer') ?>

