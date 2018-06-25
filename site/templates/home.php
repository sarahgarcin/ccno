<?php snippet('header') ?>

<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
	 $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>
<?php 
	// $projets = $site->index()->filterBy('template', 'in', ['default', 'atelier']);
	// $actuToDisplay="";
	// foreach($projets as $projet):
	// 	$project = $site->page($projet);
	// 	$url = $project->url();

	// 	if($project->dates()->isNotEmpty()):
	// 		foreach($project->dates()->toStructure() as $dates):
	// 			if($dates->actus() == "oui"):
	// 				$actuToDisplay = $project;
	// 			endif;
	// 		endforeach;
	// 	endif;
	// endforeach;

?>


<div class ="row">

	<?php snippet('left-col') ?>

	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		<?php snippet('menu') ?>
		<div class="big-image-wrapper image-wrapper">
				<img src="<?php echo $page->homeImage()->toFile()->url()?>" alt="CCNO">
		</div>	
		<div class='row col-wrapper main-content'>
			<div class='col-1 large-6 columns'>
				<?php 
				$col1page = $page->col1();
				$col1uid = $site->index()->filterBy('uid', $col1page);?>
				<a href="<?php echo $pages->find($col1uid)->url()?>" title="<?php echo $pages->find($col1uid)->title()?>">
					<div class="title-wrapper">
						<h3><?php echo $pages->find($col1uid)->parent()->title()->html();?></h3>
						<h1><?php echo $pages->find($col1uid)->title()->html(); ?></h1>
						<h3><?php echo $pages->find($col1uid)->personne()->html();?> </h3>
					</div>
					<div class="text-wrapper">
						 <?php echo str::excerpt($pages->find($col1uid)->text()->kirbytext(), 500, false); ?>
					</div>
				</a>
			</div>
			<div class='col-2 large-6 columns'>
			<?php 
				$col2page = $page->col2();
				$col2uid = $site->index()->filterBy('uid', $col2page);?>
				<a href="<?php echo $pages->find($col2uid)->url()?>" title="<?php echo $pages->find($col1uid)->title()?>">
					<div class="title-wrapper">
						<h3><?php echo $pages->find($col2uid)->parent()->title()->html();?></h3>
						<h1><?php echo $pages->find($col2uid)->title()->html(); ?></h1>
						<h3><?php echo $pages->find($col2uid)->personne()->html();?> </h3>
					</div>
					<div class="text-wrapper">
						 <?php echo str::excerpt($pages->find($col2uid)->text()->kirbytext(), 500, false); ?>
					</div>
				</a>
			</div>
			<div class='col-3 large-6 columns end'>
			<?php 
				$col3page = $page->col3();
				$col3uid = $site->index()->filterBy('uid', $col3page);?>
				<a href="<?php echo $pages->find($col2uid)->url()?>" title="<?php echo $pages->find($col1uid)->title()?>">
					<div class="title-wrapper">
						<h3><?php echo $pages->find($col3uid)->parent()->title()->html();?></h3>
						<h1><?php echo $pages->find($col3uid)->title()->html(); ?></h1>
						<h3><?php echo $pages->find($col3uid)->personne()->html();?> </h3>
					</div>
					<div class="text-wrapper">
						 <?php echo str::excerpt($pages->find($col3uid)->text()->kirbytext(), 500, false); ?>
					</div>
				</a>
			</div>
		</div>	

	</main>

</div>


<?php snippet('footer') ?>

