<?php snippet('header') ?>
<?php snippet('en-cours') ?>
<?php snippet('menu') ?>
<?php $mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];?>
<?php 
	$projets = $site->index()->filterBy('template', 'default');
	$actuToDisplay="";
	foreach($projets as $projet):
		$project = $site->page($projet);
		$url = $project->url();

		if($project->dates()->isNotEmpty()):
			foreach($project->dates()->toStructure() as $dates):
				if($dates->actus() == "oui"):
					$actuToDisplay = $project;
				endif;
			endforeach;
		endif;
	endforeach;

?>


<div class ="row">

	<?php snippet('left-col') ?>

	<main class="small-18 medium-13 columns">
		<div class="image-icono">
			<?php foreach($site->images()->shuffle()->limit(20) as $icone): ?>
				<div class="icone-wrapper">
					<img src="<?php echo $icone->url()?>" alt="Picto">
				</div>
			<?php endforeach ?>
		</div>
		<div class="actu">
				<a href="<?php echo $actuToDisplay->url()?>" title="<?php echo $actuToDisplay->title() ?>">
					<div class="actu-title" >
						<?php foreach($actuToDisplay->dates()->toStructure() as $dates):?>
							<?php if($dates->actus() == "oui"):?>
									<h1><?php echo $actuToDisplay->title()->html() ?></h1>
									<?php if($actuToDisplay->personne()->isNotEmpty()):?>
										<h2><?php echo $actuToDisplay->personne()->html() ?></h2>
									<?php endif ?>
									<h3><?php echo $dates->title()->html() ?></h3>
							<?php endif;?>
						<?php endforeach; ?>
					</div>
								<div class="actu-date">
					<?php foreach($actuToDisplay->dates()->toStructure() as $dates):?>
						<?php if($dates->actus() == "oui"):?>
								<p><?php echo date("d", strtotime($dates->moment()));?> 
								<?php echo $mois[date("n", strtotime($dates->moment())) - 1];?>
								<br>
								<?php echo $dates->hours()->html() ?>
								</p>
							</div>
						<?php endif;?>
					<?php endforeach; ?>
	
				</a>
				<p class="link"><a href="<?php echo $actuToDisplay->url()?>" title="<?php echo $actuToDisplay->title()?>">+ d’infos</a></p>
		</div>

	</main>

</div>


<?php snippet('footer') ?>

