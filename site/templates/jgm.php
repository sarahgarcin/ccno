<?php snippet('header') ?>


<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
	 $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>

<div class ="row">

	<?php snippet('left-col') ?>
	<?php snippet('menu') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		<div class="main-content">
			<?php if($page->imagefond()->isNotEmpty()):?>
				<div class="background-image">
					<?php $imageback = $page->imagefond()->toFile();?>
					<img src="<?php echo $imageback->url()?>" alt="<?php echo $page->title()?>">
				</div>
			<?php endif;?>
			<?php //snippet('player') ?>
			<?php if($page->parent()->intendedTemplate() == 'jgm'):?>
				<div class="arrow-back">
					<a href="" onclick="window.history.go(-1); return false;" title="<?php echo $page->parent()->title()?>">
						<
					</a>
				</div>
			<?php endif; ?>
			<div class="jgm-entete">
				<h1 class="small-9 medium-7 large-7">
					<?= $page->title()->html() ?>	
				</h1>
				<h2 class="subtitle"><?= $page->subtitle()->html() ?></h2>
				<p><?= $page->infos()->kt() ?></p>
			</div>
			<?php snippet('icone-page')?>
			<div class="row col-wrapper">
				<?php if($page->colonne1()->isNotEmpty()):?>
					<div class='col-1 large-5 columns'>
					<h4><?php echo $page->colonne1titre()->html()?></h4>
					<?php foreach($page->colonne1()->split(',') as $colonne1):?>
						<?php $colonne1 =  $page->find($colonne1);?>
						<?php if($colonne1->isVisible()):?>
						<a href="<?php echo $colonne1->url()?>" title="">
						<?php endif ?>
							<?php foreach($colonne1->dates()->toStructure() as $date):?>
								<p class="element">
									<!-- heure -->
									<span>
										<?php if($date->hours()->isNotEmpty()):?>
												<?php echo $date->hours()->html()?>
										<?php endif ?>
									</span>
									<!-- lieu -->
									<?php echo $date->place()->html()?>
									<br>
									<?php if($colonne1->isVisible()):?>
										<!-- type -->
										<?php echo $date->type()->html();?>
										<br>
										<!-- titre -->
										<?php echo $date->title()->html(); ?>
									<?php endif ?>
								</p>
							<?php endforeach;?>
						<?php if($colonne1->isVisible()):?>
						</a>
						<?php endif ?>
					<?php endforeach ?>
					</div>
				<?php endif; ?>
				<?php if($page->colonne2()->isNotEmpty()):?>
					<div class='col-2 large-5 columns'>
					<h4><?php echo $page->colonne2titre()->html()?></h4>
					<?php foreach($page->colonne2()->split(',') as $colonne2):?>
						<?php $colonne2 =  $page->find($colonne2);?>
						<?php if($colonne2->isVisible()):?>
							<a href="<?php echo $colonne2->url()?>" title="">
						<?php endif;?>
							<?php foreach($colonne2->dates()->toStructure() as $date):?>
								<p class="element">
									<!-- heure -->
									<span>
										<?php if($date->hours()->isNotEmpty()):?>
												<?php echo $date->hours()->html()?>
										<?php endif ?>
									</span>
									<!-- lieu -->
									<?php echo $date->place()->html()?>
									<br>
									<?php if($colonne2->isVisible()):?>
										<!-- type -->
										<?php echo $date->type()->html();?>
										<br>
										<!-- titre -->
										<?php echo $date->title()->html(); ?>
									<?php endif ?>
								</p>
							<?php endforeach;?>
						<?php if($colonne2->isVisible()):?>
						</a>
						<?php endif ?>
					<?php endforeach ?>
					</div>
				<?php endif; ?>
				<?php if($page->colonne3()->isNotEmpty()):?>
					<div class='col-3 large-5 columns'>
						<h4><?php echo $page->colonne3titre()->html()?></h4>
						<?php foreach($page->colonne3()->split(',') as $colonne3):?>
							<?php $colonne3 =  $page->find($colonne3);?>
							<?php if($colonne3->isVisible()):?>
								<a href="<?php echo $colonne3->url()?>" title="">
							<?php endif;?>
								<?php foreach($colonne3->dates()->toStructure() as $date):?>
									<p class="element">
										<!-- heure -->
										<span>
											<?php if($date->hours()->isNotEmpty()):?>
													<?php echo $date->hours()->html()?>
											<?php endif ?>
										</span>
										<!-- lieu -->
										<?php echo $date->place()->html()?>
										<br>
										<?php if($colonne3->isVisible()):?>
											<!-- type -->
											<?php echo $date->type()->html();?>
											<br>
											<!-- titre -->
											<?php echo $date->title()->html(); ?>
										<?php endif ?>
									</p>
								<?php endforeach;?>
							<?php if($colonne3->isVisible()):?>
							</a>
							<?php endif ?>
						<?php endforeach ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if($page->text()->isNotEmpty()):?>
				<div class='edito'>
					<h1>Edito</h1>
					<br>
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
					<?php foreach($page->children()->filterBy('intendedTemplate', 'jgm') as $child):?>
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
	</main>

</div>

<?= js('assets/js/player.js') ?>
<?php snippet('footer') ?>


