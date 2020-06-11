<?php snippet('header') ?>


<?php $mois = [l::get('janvier'), l::get('fevrier'), l::get('mars'), l::get('avril'), l::get('mai'), l::get('juin'), l::get('juillet'), l::get('aout'), l::get('septembre'), l::get('octobre'), l::get('novembre'), l::get('decembre')];
  $day = [l::get('lundi'),l::get('mardi'),l::get('mercredi'),l::get('jeudi'),l::get('vendredi'),l::get('samedi'),l::get('dimanche')];
?>


<div>
	<?php snippet('menu') ?>

	<main class="row bulle">
		<?php snippet('left-col') ?>
		<div class="bulle_main col-xs-12 col-sm-11 col-sm-offset-1 col-md-9 col-md-offset-1">
			<div class="main-content">
				<?php if($page->imagefond()->isNotEmpty()):?>
					<div class="background-image">
						<?php $imageback = $page->imagefond()->toFile();?>
						<img src="<?php echo $imageback->url()?>" alt="<?php echo $page->title()?>">
					</div>
				<?php endif;?>
					<h1 class="main-content_title col-xs-12"><?= $page->title()->html() ?></h1>
					<?php snippet('icone-page')?>
					<h2 class="subtitle"><?= $page->subtitle()->html() ?></h2>
					<div class="text col-xs-12 col-md-11 col-md-offset-1">
						<?= $page->infos()->kt() ?>
						<?php snippet('festival-programmation') ?>
						<?php if($page->text()->isNotEmpty()):?>
							<div class='edito'>
								<h1>Edito</h1>
								<?php echo $page->text()->kt()?>
							</div>
						<?php endif ?>
						<?php if($page->actus()->isNotEmpty()):?>
							<div class='actus'>
								<h1>Actualités</h1>
								<br>
								<?php echo $page->actus()->kt()?>
							</div>
						<?php endif ?>
						<div class="archives-gallerie">
							<?php 
							function findJGMchildren($children){
								foreach($children as $child):
									if($child->intendedTemplate() == 'jgm'){
										return true;
									}
								endforeach; 
							}?>
							<?php if (findJGMchildren($page->children())):?>
								<h1>Anciennes éditions</h1>
							
								<ul class="row">
								<?php foreach($page->children()->filterBy('intendedTemplate', 'bulle') as $child):?>
									<li class="small-4">
										<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>">
											<figure>
											<?php $affiche = $child->affiche()->toFile();?>
												<img src="<?php echo $affiche->url()?>" alt="<?php echo $child->title()?>">
												<figcaption><?php echo $child->title()->html()?></figcaption>
												
											</figure>
										</a>
									</li>	
									
								<?php endforeach ?>
								</ul>
								<?php endif; ?>
						</div>
					</div>
			</div>
		</div>
	</main>
</div>

<?php snippet('footer') ?>


