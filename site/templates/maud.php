<?php snippet('header') ?>

<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
  $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>


<div class ="row">
	<?php snippet('left-col') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		<?php snippet('menu') ?>
		<div class="main-content">
			<h1 class="small-18 medium-16 medium-push-2 large-14 large-push-2 xlarge-8">
				<?= $page->title()->html() ?></h1>
			<?php snippet('icone-page')?>
			<div class="row">
				<div class="creations small-18 medium-16 medium-push-2 large-14 large-push-2 xlarge-8">
					<h1>Créations</h1>
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
					<h1>Biographie</h1>
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

