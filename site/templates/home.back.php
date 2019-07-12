<?php snippet('header') ?>


<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
	 $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>
<?php 
	$projets = $site->index()->filterBy('template', 'in', ['default', 'atelier', 'accueil', 'maud']);
	$col1 = "";
	$col2 = "";
	$col3 = "";
	$url1;
	$url2;
	$url3;
	foreach($projets as $projet):
		$project = $site->page($projet);
		$url = $project->url();
		foreach($project->dates()->toStructure() as $date):
			if($date->home()->isNotEmpty()):
				if($date->home() == "col1"):
					$project1 = $project;
					$col1 = $date;
					$url1 = $url;
				elseif($date->home() == "col2"):
					$project2 = $project;
					$col2 = $date;
					$url2 = $url;
				else:
					$project3 = $project;
					$col3 = $date;
					$url3 = $url;
				endif;
				endif;
		endforeach;
	endforeach;

?>


<div class ="row">

	<?php snippet('left-col') ?>
	<?php snippet('menu') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		
		<div class="big-image-wrapper image-wrapper">
				<img src="<?php echo $page->homeImage()->toFile()->url()?>" alt="CCNO">
		</div>	
		<div class='row col-wrapper main-content'>
			<div class='col-1 large-6 columns'>
				<h4><?php echo $page->namecol1()->html()?></h4>
				<?php if($project1->icone()->isNotEmpty()):?>
					<?php 
					$icone = $project1->icone()->toFile();
					if($icone->isPortrait()):?>
						<div class="icone portrait">
							<img src="<?php echo $icone->url() ?>" alt="">
						</div>
					<?php elseif($icone->isSquare()):?>
						<div class="icone square">
							<img src="<?php echo $icone->url() ?>" alt="">
						</div>
					<?php else:?>
						<div class="icone landscape">
							<img src="<?php echo $icone->url() ?>" alt="">
						</div>
					<?php endif; ?>
				<?php endif ?>
				<a href="<?php echo $url1 ?>" title="">
					<div class="title-wrapper">
						<h3><?php echo $col1->type()->html();?></h3>
						<h1><?php echo $col1->title()->html(); ?></h1>
						<?php if($col1->personne()->isNotEmpty()):?>
							<h2><?php echo $col1->personne()->html();?></h2>
						<?php endif; ?>
					</div>
					<div class="dates-info-wrapper">
						<p><?php 
							if(strtotime($col1->from()) == strtotime($col1->to())):
								echo $day[date("N", strtotime($col1->from())) - 1]. " " . date("d", strtotime($col1->from())) . " " . $mois[date("n", strtotime($col1->from())) - 1] . " " . date("Y", strtotime($col1->from()));
							else: 
								echo 'du '.$day[date("N", strtotime($col1->from())) - 1]. " " . date("d", strtotime($col1->from())) . " " . $mois[date("n", strtotime($col1->from())) - 1] . "</br>au " . $day[date("N", strtotime($col1->to())) - 1]. " " . date("d", strtotime($col1->to())) . " " . $mois[date("n", strtotime($col1->to())) - 1]. " " . date("Y", strtotime($col1->to()));
							endif;?>
							</br>
							 
							<?php if($col1->hours()->isNotEmpty()):?>
								<?php echo $col1->hours()->html()?></br>
							<?php endif ?>
							<?php echo $col1->place()->html()?>
						</p>
					</div>
				</a>
			</div>
			<div class='col-2 large-6 columns'>
				<h4><?php echo $page->namecol2()->html()?></h4>
				<?php if($project2->icone()->isNotEmpty()):?>
					<?php 
					$icone = $project2->icone()->toFile();
					if($icone->isPortrait()):?>
						<div class="icone portrait">
							<img src="<?php echo $icone->url() ?>" alt="">
						</div>
					<?php elseif($icone->isSquare()):?>
						<div class="icone square">
							<img src="<?php echo $icone->url() ?>" alt="">
						</div>
					<?php else:?>
						<div class="icone landscape">
							<img src="<?php echo $icone->url() ?>" alt="">
						</div>
					<?php endif; ?>
				<?php endif ?>
				<a href="<?php echo $url2 ?>" title="">
					<div class="title-wrapper">
						<h3><?php echo $col2->type()->html();?></h3>
						<h1><?php echo $col2->title()->html(); ?></h1>
						<?php if($col2->personne()->isNotEmpty()):?>
							<h2><?php echo $col2->personne()->html();?></h2>
						<?php endif; ?>
					</div>
					<div class="dates-info-wrapper">
						<p><?php 
							if(strtotime($col2->from()) == strtotime($col2->to())):
								echo $day[date("N", strtotime($col2->from())) - 1]. " " . date("d", strtotime($col2->from())) . " " . $mois[date("n", strtotime($col2->from())) - 1] . " " . date("Y", strtotime($col2->from()));
							else: 
								echo 'du '.$day[date("N", strtotime($col2->from())) - 1]. " " . date("d", strtotime($col2->from())) . " " . $mois[date("n", strtotime($col2->from())) - 1] . "</br>au " . $day[date("N", strtotime($col2->to())) - 1]. " " . date("d", strtotime($col2->to())) . " " . $mois[date("n", strtotime($col2->to())) - 1]. " " . date("Y", strtotime($col2->to()));
							endif;?>
							</br>
							<?php if($col2->hours()->isNotEmpty()):?>
								<?php echo $col2->hours()->html()?></br>
							<?php endif ?>
							<?php echo $col2->place()->html()?>
						</p>
					</div>
				</a>
			</div>
			<div class='col-3 large-6 columns end'>
				<h4><?php echo $page->namecol3()->html()?></h4>
				<?php if($project3->icone()->isNotEmpty()):?>
					<?php 
					$icone = $project3->icone()->toFile();
					if($icone->isPortrait()):?>
						<div class="icone portrait">
							<img src="<?php echo $icone->url() ?>" alt="">
						</div>
					<?php elseif($icone->isSquare()):?>
						<div class="icone square">
							<img src="<?php echo $icone->url() ?>" alt="">
						</div>
					<?php else:?>
						<div class="icone landscape">
							<img src="<?php echo $icone->url() ?>" alt="">
						</div>
					<?php endif; ?>
				<?php endif ?>
				<a href="<?php echo $url3 ?>" title="">
					<div class="title-wrapper">
						<h3><?php echo $col3->type()->html();?></h3>
						<h1><?php echo $col3->title()->html(); ?></h1>
						<?php if($col3->personne()->isNotEmpty()):?>
							<h2><?php echo $col3->personne()->html();?></h2>
						<?php endif; ?>
					</div>
					<div class="dates-info-wrapper">
						<p><?php 
							if(strtotime($col3->from()) == strtotime($col3->to())):
								echo $day[date("N", strtotime($col3->from())) - 1]. " " . date("d", strtotime($col3->from())) . " " . $mois[date("n", strtotime($col3->from())) - 1] . " " . date("Y", strtotime($col3->from()));
							else: 
								echo 'du '.$day[date("N", strtotime($col3->from())) - 1]. " " . date("d", strtotime($col3->from())) . " " . $mois[date("n", strtotime($col3->from())) - 1] . "</br>au " . $day[date("N", strtotime($col3->to())) - 1]. " " . date("d", strtotime($col3->to())) . " " . $mois[date("n", strtotime($col3->to())) - 1]. " " . date("Y", strtotime($col3->to()));
							endif;?>
							</br>
							 
							<?php if($col3->hours()->isNotEmpty()):?>
								<?php echo $col3->hours()->html()?></br>
							<?php endif ?>
							<?php echo $col3->place()->html()?>
						</p>
					</div>
				</a>
			</div>
		</div>	

	</main>

</div>


<?php snippet('footer') ?>


