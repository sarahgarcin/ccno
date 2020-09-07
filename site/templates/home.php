<?php snippet('header') ?>
<?php snippet('alertpopup') ?>

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
	<?php snippet('menu') ?>
	<?php if($cover = $page->homeImage()->toFile()):?>
		<div class="big-image-wrapper image-wrapper">
			<img src="<?php echo $cover->url()?>" alt="CCNO">
		</div> 
	<?php endif;?>

	<main class="row">
		<?php snippet('left-col') ?>
		<div class="home_main_colonnes col-sm-11 col-sm-offset-1 col-md-9 col-md-offset-1 row">		
			<div class='col-1 col-sm-6 col-md-4'>
				<?php echo createColumns($page->namecol1()->html(), $project1, $url1, $col1);?>
			</div>
			<div class='col-2 col-sm-6 col-md-4'>
				<?php echo createColumns($page->namecol2()->html(), $project2, $url2, $col2);?>
			</div>
			<div class='col-3 col-sm-6 col-md-4'>
				<?php echo createColumns($page->namecol3()->html(), $project3, $url3, $col3);?>
			</div>
		</div>

	</main>

</div>


<?php snippet('footer') ?>


<?php function createColumns($colname, $project, $url, $col){
	$mois = [l::get('janvier'), l::get('fevrier'), l::get('mars'), l::get('avril'), l::get('mai'), l::get('juin'), l::get('juillet'), l::get('aout'), l::get('septembre'), l::get('octobre'), l::get('novembre'), l::get('decembre')];
  $day = [l::get('lundi'),l::get('mardi'),l::get('mercredi'),l::get('jeudi'),l::get('vendredi'),l::get('samedi'),l::get('dimanche')];


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
	$cover = $col->cover()->toFile();
	$colonnehtml = $colonnehtml . '<a href="' . $url . '" title="">';
	if($col->cover()->isNotEmpty()){
		$colonnehtml = $colonnehtml . 
				'<div class="cover-wrapper image-wrapper-rose">
					<figure>
						'. $cover->crop(500, 350).'
					</figure>
				</div>';
	}
	// <h3>'.$col->type()->html().'</h3>
	// <figure>
	// 	<img src="'.$cover->url().'" title="'.$col->title().'">
	// </figure>
	$colonnehtml = $colonnehtml . '
			<div class="title-wrapper">
				<h1>'.$col->title()->html().'</h1>
				<h2>'.$col->personne()->html().'</h2> 
			</div>';
	$colonnehtml = $colonnehtml . '<div class="dates-info-wrapper"><p>';
	if(strtotime($col->from()) == strtotime($col->to())){
		$colonnehtml = $colonnehtml . $day[date("N", strtotime($col->from())) - 1]. " " . date("d", strtotime($col->from())) . " " . $mois[date("n", strtotime($col->from())) - 1] . " " . date("Y", strtotime($col->from()));
	}
	else{
	$colonnehtml = $colonnehtml . ' '.l::get('du').' '.$day[date("N", strtotime($col->from())) - 1]. " " . date("d", strtotime($col->from())) . " " . $mois[date("n", strtotime($col->from())) - 1] . '</br>'.l::get('au').' ' . $day[date("N", strtotime($col->to())) - 1]. " " . date("d", strtotime($col->to())) . " " . $mois[date("n", strtotime($col->to())) - 1]. " " . date("Y", strtotime($col->to()));
	}
	if($col->hours()->isNotEmpty()){
		$colonnehtml = $colonnehtml . '</br>' . $col->hours()->html();
	}
	$colonnehtml = $colonnehtml . '</br>' . $col->place()->html();
	$colonnehtml = $colonnehtml . '</p></div>';
	$colonnehtml = $colonnehtml . '</a>';
	
	return $colonnehtml;


}?>






