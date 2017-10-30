<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
  $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>


<div class ="row">

	<?php snippet('left-col') ?>
	<main class="small-18 medium-13 columns">
		<?php snippet('breadcrumb') ?>
		<h1><?= $page->title()->html() ?></h1>
		<?php snippet('icone-page')?>
		<div class="row">
			<div class="text icones-wrapper-text small-18 medium-16 medium-push-2 large-11 large-push-2 xlarge-8 columns">
				<div class="summary-liste small-18 medium-18 xlarge-18 columns end">
					<?php echo $page->summary()->kirbytext()?>
				</div>
				<ul>
					<?php foreach($page->dates()->toStructure() as $dates):?>
						<li>
							<h2>
								<?php echo $day[date("N", strtotime($dates->moment())) - 1];?>
								<?php echo date("j", strtotime($dates->moment()));?>
								<?php echo $mois[date("n", strtotime($dates->moment())) - 1];?>
								<?php echo $dates->title()->html() ?>
							</h2>
							<?php echo $dates->text()->kt() ?>
						</li>
					<?php endforeach ?>
				</ul>
				<?php snippet('icones') ?>
			</div>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

