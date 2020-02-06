<?php snippet('header') ?>

<?php $mois = [l::get('janvier'), l::get('fevrier'), l::get('mars'), l::get('avril'), l::get('mai'), l::get('juin'), l::get('juillet'), l::get('aout'), l::get('septembre'), l::get('octobre'), l::get('novembre'), l::get('decembre')];
  $day = [l::get('lundi'),l::get('mardi'),l::get('mercredi'),l::get('jeudi'),l::get('vendredi'),l::get('samedi'),l::get('dimanche')];
?>


<div class ="row">
	<?php snippet('left-col') ?>
	<?php snippet('menu') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		<div class="main-content">
			<h1 class="small-9 medium-7 large-7 orleans">
				<?= $page->title()->html() ?></h1>
			<?php snippet('icone-page')?>
			<div class="row">
				<div class="creations list-with-images small-18 medium-16 medium-push-2 large-14 large-push-2 xlarge-8">
					<h1><?= l::get('creations') ?></h1>
					<ul>
						<?php foreach($page->children()->visible() as $child):?>
							<li>
								<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>">
								<?php echo $child->title()->html()?>
								</a>
								<?php if($child->hasImages()):?>
									<div class="thumb-wrapper">
										<img src="<?php echo $child->images()->first()->url()?>" alt="<?php echo $child->title()?>">
									</div>
								<?php endif ?>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				
			</div>
				<div class="text icones-wrapper-text small-18 medium-16 medium-push-2 large-11 large-push-2 xlarge-8 columns">
					<h1><?= l::get('biographie') ?></h1>
					<?php echo $page->text()->kirbytext() ?>
					<?php snippet('icones') ?>
				</div>
				<?php if($page->dates()->isNotEmpty()):
					snippet('dates');
				endif?>
			</div>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

