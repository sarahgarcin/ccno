<?php snippet('header') ?>

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


<div>
	<?php //snippet('left-col') ?>
	<?php snippet('menu') ?>
	<div class="big-image-wrapper image-wrapper">
		<img src="<?php echo $page->homeImage()->toFile()->url()?>" alt="CCNO">
	</div>

	<main class="row">
		<?php snippet('left-col') ?>
		<div class="home_main_colonnes col-md-9 col-md-offset-1 row">		
			<div class='col-1 col-md-4'>
				<?php echo createColumns($page->namecol1()->html(), $project1, $url1, $col1);?>
			</div>
			<div class='col-2 col-md-4'>
				<?php echo createColumns($page->namecol2()->html(), $project2, $url2, $col2);?>
			</div>
			<div class='col-3 col-md-4'>
				<?php echo createColumns($page->namecol3()->html(), $project3, $url3, $col3);?>
			</div>
		</div>

	</main>

</div>


<?php snippet('footer') ?>


<?php function createColumns($colname, $project, $url, $col){
	$mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
	$day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];


	$colonnehtml = '<h4>'. $colname .'</h4>';
	if($project->icone()->isNotEmpty()){
		$icone = $project->icone()->toFile();
		if($icone->isPortrait()){
			$colonnehtml = $colonnehtml . '
				<div class="icone portrait">
					<img src="'. $icone->url().'" alt="">
				</div>';
		}
		elseif($icone->isSquare()){
			$colonnehtml = $colonnehtml . '
				<div class="icone square">
					<img src="'. $icone->url().'" alt="">
				</div>';
		}
		else{
			$colonnehtml = $colonnehtml . '
				<div class="icone landscape">
					<img src="'. $icone->url().'" alt="">
				</div>';
		}					
	}
	$colonnehtml = $colonnehtml . '
		<a href="' . $url . '" title="">
			<div class="title-wrapper">
				<h3>'.$col->type()->html().'</h3>
				<h1>'.$col->title()->html().'</h1>
				<h2>'.$col->personne()->html().'</h2> 
			</div>';
	$colonnehtml = $colonnehtml . '<div class="dates-info-wrapper"><p>';
	if(strtotime($col->from()) == strtotime($col->to())){
		$colonnehtml = $colonnehtml . $day[date("N", strtotime($col->from())) - 1]. " " . date("d", strtotime($col->from())) . " " . $mois[date("n", strtotime($col->from())) - 1] . " " . date("Y", strtotime($col->from()));
	}
	else{
	$colonnehtml = $colonnehtml . 'du '.$day[date("N", strtotime($col->from())) - 1]. " " . date("d", strtotime($col->from())) . " " . $mois[date("n", strtotime($col->from())) - 1] . "</br>au " . $day[date("N", strtotime($col->to())) - 1]. " " . date("d", strtotime($col->to())) . " " . $mois[date("n", strtotime($col->to())) - 1]. " " . date("Y", strtotime($col->to()));
	}
	if($col->hours()->isNotEmpty()){
		$colonnehtml = $colonnehtml . '</br>' . $col->hours()->html();
	}
	$colonnehtml = $colonnehtml . '</br>' . $col->place()->html();
	$colonnehtml = $colonnehtml . '</p></div>';
	$colonnehtml = $colonnehtml . '</a>';
	
	return $colonnehtml;


}?>






