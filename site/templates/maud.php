<?php snippet('header') ?>
<?php snippet('en-cours') ?>
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
			<div class="text icones-wrapper-text small-16 small-push-2 medium-16 medium-push-2 large-11 large-push-2 columns">
				<?php echo $page->text()->kirbytext() ?>
				<?php snippet('icones') ?>
			</div>
			<?php if($page->dates()->isNotEmpty()):
				snippet('dates');
			endif?>
		</div>
		<div class="creations large-14 large-push-2">
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
			</div>
			
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

