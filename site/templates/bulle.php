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
				<?php if($page->parent()->intendedTemplate() == 'bulle'):?>
					<div class="arrow-back">
						<a href="" onclick="window.history.go(-1); return false;" title="<?php echo $page->parent()->title()?>">
							<
						</a>
					</div>
				<?php endif; ?>
					<h1 class="main-content_title col-xs-12"><?= $page->title()->html() ?></h1>
					<?php snippet('icone-page')?>
					<h2 class="subtitle"><?= $page->subtitle()->html() ?></h2>
					<div class="text col-xs-12 col-md-11 col-md-offset-1">
						<?= $page->infos()->kt() ?>
						<?php snippet('festival-programmation') ?>
						<div class="artistes list-with-images col-md-10">
							<ul class="row">
								<?php foreach($page->children()->visible() as $child):?>
									<?php if($child->intendedTemplate() != 'jgm'):?>
										<li class="col-xs-6 col-sm-6 col-md-4">
											<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>">
												<div class="title-wrapper">
													<?php echo $child->title()->html()?>
												</div>
												<?php if($child->hasImages()):?>
													<div class="thumb-wrapper">
														<figure>
															<?= $child->images()->first()->crop(500, 500);?>
														</figure>
														
													</div>
												<?php endif ?>
											</a>
										</li>
									<?php endif; ?>
								<?php endforeach ?>
							</ul>
						</div>
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
						<div class="archives-gallerie col-md-10">
							<?php 
							function findJGMchildren($children){
								foreach($children as $child):
									if($child->intendedTemplate() == 'bulle'){
										return true;
									}
								endforeach; 
							}?>
							<?php if (findJGMchildren($page->children())):?>
								<h1>Anciennes éditions</h1>
							
								<ul class="row">
								<?php foreach($page->children()->filterBy('intendedTemplate', 'bulle') as $child):?>
									<li class="col-xs-6 col-md-3">
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


