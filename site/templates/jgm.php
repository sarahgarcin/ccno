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
			<h1 class="small-9 medium-7 large-7">
				<?= $page->title()->html() ?>	
			</h1>
			<h2 class="subtitle"><?= $page->subtitle()->html() ?></h2>
			<p><?= $page->infos()->kt() ?>	</p>
			<?php snippet('icone-page')?>
			<div class="row col-wrapper">
				<div class='col-1 large-5 columns'>
					<h4>jeudi 31 janvier</h4>
					<?php foreach($page->colonne1()->split(',') as $col1):?>
						<?php $col1 =  $page->find($col1);?>
						<?php if($col1->isVisible()):?>
						<a href="<?php echo $col1->url()?>" title="">
						<?php endif ?>
							<?php foreach($col1->dates()->toStructure() as $date):?>
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
									<?php if($col1->isVisible()):?>
										<!-- type -->
										<?php echo $date->type()->html();?>
										<br>
										<!-- titre -->
										<?php echo $date->title()->html(); ?>
									<?php endif ?>
								</p>
							<?php endforeach;?>
						<?php if($col1->isVisible()):?>
						</a>
						<?php endif ?>
					<?php endforeach ?>
				</div>
				<div class='col-2 large-5 columns'>
					<h4>vendredi 1er février</h4>
					<?php foreach($page->colonne2()->split(',') as $col2):?>
						<?php $col2 =  $page->find($col2);?>
						<?php if($col2->isVisible()):?>
							<a href="<?php echo $col2->url()?>" title="">
						<?php endif;?>
							<?php foreach($col2->dates()->toStructure() as $date):?>
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
									<?php if($col2->isVisible()):?>
										<!-- type -->
										<?php echo $date->type()->html();?>
										<br>
										<!-- titre -->
										<?php echo $date->title()->html(); ?>
									<?php endif ?>
								</p>
							<?php endforeach;?>
						<?php if($col2->isVisible()):?>
						</a>
						<?php endif ?>
					<?php endforeach ?>
				</div>
				<div class='col-3 large-5 columns'>
					<h4>samedi 2 février</h4>
					<?php foreach($page->colonne3()->split(',') as $col3):?>
						<?php $col3 =  $page->find($col3);?>
						<?php if($col3->isVisible()):?>
							<a href="<?php echo $col3->url()?>" title="">
						<?php endif;?>
							<?php foreach($col3->dates()->toStructure() as $date):?>
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
									<?php if($col3->isVisible()):?>
										<!-- type -->
										<?php echo $date->type()->html();?>
										<br>
										<!-- titre -->
										<?php echo $date->title()->html(); ?>
									<?php endif ?>
								</p>
							<?php endforeach;?>
						<?php if($col3->isVisible()):?>
						</a>
						<?php endif ?>
					<?php endforeach ?>
				</div>
			</div>
			<?php if($page->text()->isNotEmpty()):?>
				<div class='edito'>
					<h2>Edito</h2>
					<?php echo $page->text()->kt()?>
				</div>
			<?php endif ?>
		
		</div>
	</main>

</div>


<?php snippet('footer') ?>


