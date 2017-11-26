<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
	 $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>
<?php 
	$projets = $site->index()->filterBy('template', 'in', ['default', 'atelier']);
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

	<main class="small-18 medium-13 medium-push-5 xlarge-push-4 xlarge-13 end columns">
		<div class="image-icono">
			<?php foreach($site->images()->shuffle()->limit(20) as $icone): ?>
			<!-- 	<div class="icone-wrapper">
					<img src="<?php //echo $icone->url()?>" alt="Picto">
				</div> -->
			<?php endforeach ?>
		</div>
		<div class="actu">
				<a href="<?php echo $actuToDisplay->url()?>" title="<?php echo $actuToDisplay->title() ?>">
					<div class="actu-title" >
						<?php foreach($actuToDisplay->dates()->toStructure() as $dates):?>
							<?php if($dates->actus() == "oui"):?>
									<?php if($actuToDisplay->personne()->isNotEmpty()):?>
										<h2><?php echo $actuToDisplay->personne()->html() ?></h2>
									<?php endif ?>
									<h1><?php echo $actuToDisplay->title()->html() ?></h1>
									
									<h3><?php //echo $dates->title()->html() ?></h3>
							<?php endif;?>
						<?php endforeach; ?>
						<?php //echo $actuToDisplay->text()->kt()?>
					</div>
					<div class="actu-date">
					<?php foreach($actuToDisplay->dates()->toStructure() as $dates):?>
							<?php if($dates->actus() == "oui"):?>
								<p>
								<?php if(strtotime($dates->from()) == strtotime($dates->to())):?>
									<?php echo $day[date("N", strtotime($dates->from())) - 1];?>
									<?php echo date("j", strtotime($dates->from()));?>
									<?php echo $mois[date("n", strtotime($dates->from())) - 1];?>
								<?php else:?>
									<?php echo "du ".$day[date("N", strtotime($dates->from())) - 1];?>
									<?php echo date("j", strtotime($dates->from()));?>
									<?php echo $mois[date("n", strtotime($dates->from())) - 1];?>
									<br>
									<?php echo "au ".$day[date("N", strtotime($dates->to())) - 1];?>
									<?php echo date("j", strtotime($dates->to()));?>
									<?php echo $mois[date("n", strtotime($dates->to())) - 1];?>
								<?php endif;?>
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

