<?php snippet('header') ?>

<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];?>

<?php 
	$projets = $site->index()->filterBy('template',  'in', ['default', 'atelier']);

	$i = 0;
	$currentTime = date('Ymd');


	foreach($projets as $projet):
		$project = $site->page($projet);
		$url = $project->url();

		if($project->dates()->isNotEmpty()):
			foreach($project->dates()->toStructure() as $dates):
				if($dates->agenda() != 'non'):
					$i++;
					$from = $dates->from();
					$to = $dates->to();
					$newDateFrom = date("d-m-Y", strtotime($from));
					$newDateTo = date("d-m-Y", strtotime($to));
					$fromDay =  date("j", strtotime($from));
					$fromMonth = $mois[date("n", strtotime($from)) - 1];
					$fromYear = date("Y", strtotime($from));
					$toDay = date("j", strtotime($to));
					$toMonth = $mois[date("n", strtotime($to)) - 1];
					$toYear = date("Y", strtotime($to));
					// GET TAGS
					// spectacles, à orléans, tournée Maud Le Pladec, cours/ateliers/stages
					$tags = array();
					if($dates->type() == 'Spectacle'){
						$tags[] ='spectacle';
					}
					if($dates->place() == "CCNO" || $dates->place() == "Théâtre d'Orléans"){
						$tags[] ='inorleans';
					}

					if($dates->type() == 'Tournée' || $project->parent()->template() == "maud"){
						$tags[] ='maud';
					}

					if($project->parent()->template() == "ateliers"){
						$tags[] ='cours';
					}


					$array[$i]['datestart'] = date("Ymd", strtotime($from));
    			$array[$i]['dateend'] = date("Ymd", strtotime($to));

					$array[$i]['fromDay'] = $fromDay;
			    $array[$i]['fromMonth'] = $fromMonth;
			    $array[$i]['fromYear'] = $fromYear;
			    $array[$i]['toDay'] = $toDay;
			    $array[$i]['toMonth'] = $toMonth;
			    $array[$i]['toYear'] = $toYear;
					$array[$i]['titre'] = $dates->title();
					$array[$i]['type'] = $dates->type();
					$array[$i]['heures'] = $dates->hours();
					$array[$i]['lieu'] = $dates->place();
			    $array[$i]['url'] = $url;
			    $array[$i]['tags'] = $tags;
			    
			    
			    
			    $arrayPast[$i]['datestart'] = date("Ymd", strtotime($from));
    			$arrayPast[$i]['dateend'] = date("Ymd", strtotime($to));

					$arrayPast[$i]['fromDay'] = $fromDay;
			    $arrayPast[$i]['fromMonth'] = $fromMonth;
			    $arrayPast[$i]['fromYear'] = $fromYear;
			    $arrayPast[$i]['toDay'] = $toDay;
			    $arrayPast[$i]['toMonth'] = $toMonth;
			    $arrayPast[$i]['toYear'] = $toYear;
					$arrayPast[$i]['titre'] = $dates->title();
					$arrayPast[$i]['type'] = $dates->type();
					$arrayPast[$i]['heures'] = $dates->hours();
					$arrayPast[$i]['lieu'] = $dates->place();
			    $arrayPast[$i]['url'] = $url;
			    $arrayPast[$i]['tags'] = $tags;

			    $projectTime = date("Ymd", strtotime($from));
	    		$projectTimeEnd = date("Ymd", strtotime($to));
					
					if($currentTime > $projectTime && $currentTime > $projectTimeEnd){
						unset($array[$i]);
					}

					if($currentTime < $projectTime && $currentTime < $projectTimeEnd){
						unset($arrayPast[$i]);;
					}
			    
			 
				endif;
			endforeach;
		endif;
	endforeach;

	usort($array, function($a, $b) {
	  return $a['datestart'] - $b['datestart'];
	});

	usort($arrayPast, function($a, $b) {
	  return $a['datestart'] - $b['datestart'];
	});

?>



<div class ="row">
	<?php snippet('left-col') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		<?php snippet('menu') ?>
		<div class="main-content">
			<h1><?= $page->title()->html() ?></h1>

			<?php if($page->uri() == "calendrier"):?>	
				<div class="themes row">
					<?php foreach($site->index()->find('themes')->children()->visible() as $theme):?>
						<div class="theme-module small-10 medium-6 large-4 columns end">
							<?php $thumb = $theme->thumb()->toFile(); ?>
							<a href="<?php echo $theme->url()?>" title="<?php echo $theme->title()?>">
								<?php echo thumb($thumb, array('width' =>400, 'height' =>400, 'crop'=>true));?>
								<h5><?php echo $theme->title()?></h5>
							</a>
						</div>
					<?php endforeach ?>
				</div>
			<?php endif; ?>
			<?php if($page->uri() == "creations-et-tournees"):?>
				<div class="creations small-18 medium-16 large-14 xlarge-8">
					<ul>
						<?php foreach($site->index()->find('centre-choregraphique-national-dorleans/maud-le-pladec')->children()->visible() as $child):?>
							<li>
								<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>">
								<?php echo $child->title()->html()?>
								</a>
								<?php if($child->hasImages()):?>
									<div class="thumb-wrapper">
										<img src="<?php echo $child->images()->first()->url()?>" alt="<?php echo $child->title()?>">
									</div>
								<?php endif ?>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			<?php endif?>

			<hr>

			<h3 class="title--next-events active">ce qui est à venir</h3>
			<h3 class="click---past-events">ce qui est passé</h3>
			<?php if($page->uri() == "calendrier"):?>
				<div class="tags">
					<span>Trier par:</span>
					<ul>
						<li class="all active">tout</li>
						<li class="spectacle">spectacles</li>
						<li class="inorleans">à orléans</li>
						<!-- <li class="maud">tournée Maud Le Pladec</li> -->
						<li class="cours">cours/ateliers/stages</li>
					</ul>
				</div>
			<?php endif?>
			<div class="pastEvents">
				<div class="pastEvents-wrapper">
					<?php $previousMonthPast = null;
						foreach($arrayPast as $date):?>
						<?php 
							if($previousMonthPast != $date['fromMonth']):?>
						 		<h2><?php echo $date['fromMonth'];?> <?php echo $date['fromYear'];?></h2>
						 	<?php endif;
							$previousMonthPast = $date['fromMonth'];
						?>
						<?php //if($page->uri() == "creations-et-tournees" && str::slug($date['type']) == 'tournee'):?>
						
						<table class="<?php 
						foreach($date['tags'] as $tag){
							echo $tag. " ";
						}?><?php echo str::slug($date['type'])?>">
						<colgroup>
							<col span="1" style="width: 20%;">
				      <col span="1" style="width: 25%;">
				      <col span="1" style="width: 15%;">
				      <col span="1" style="width: 40%;">
				    </colgroup>
					  <tr>
					    <td>
					    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
					    		<?php echo $date['type']?>
					    	</a>
					    </td>
					    <td>
					    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
					    		<?php if($date["datestart"] == $date["dateend"]):?>
					    			<?php echo $date['fromDay']." ".$date['fromMonth'].", ".$date['heures']?>
					    		<?php else:?>
					    			<?php echo 'Du '.$date['fromDay']." ".$date['fromMonth'].' Au '.$date['toDay']." ".$date['toMonth'].", ".$date['heures']?>
					    		<?php endif;?>
					    	</a>
					    </td>
					    <td>
					    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
					    		<?php echo $date['lieu']?>
					    	</a>
					    </td>
					    <td>
					    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
					    		<?php echo $date['titre']?>
					    	</a>
					    </td>
					  </tr>
				</table>
				<?php //endif ?>
					<?php endforeach ?>
				</div>
			</div>
			<div class="nextEvents">
				<?php $previousMonth = null;
					foreach($array as $date):?>
					<?php 
						if($previousMonth != $date['fromMonth']):?>
					 		<h2><?php echo $date['fromMonth'];?> <?php echo $date['fromYear'];?></h2>
					 	<?php endif;
						$previousMonth = $date['fromMonth'];
					?>
					<table class="<?php 
						foreach($date['tags'] as $tag){
							echo $tag. " ";
						}?>">
							<colgroup>
								<col span="1" style="width: 20%;">
					      <col span="1" style="width: 25%;">
					      <col span="1" style="width: 15%;">
					      <col span="1" style="width: 40%;">
					    </colgroup>
						  <tr>
						    <td>
						    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
						    		<?php echo $date['type']?>
						    	</a>
						    </td>
						    <td>
						    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
						    		<?php if($date["datestart"] == $date["dateend"]):?>
						    			<?php echo $date['fromDay']." ".$date['fromMonth']." ".$date['heures']?>
						    		<?php else:?>
						    			<?php echo 'du '.$date['fromDay']." ".$date['fromMonth'].' au '.$date['toDay']." ".$date['toMonth']." ".$date['heures']?>
						    		<?php endif;?>
						    	</a>
						    </td>
						    <td>
						    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
						    		<?php echo $date['lieu']?>
						    	</a>
						    </td>
						    <td>
						    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
						    		<?php echo $date['titre']?>
						    	</a>
						    </td>
						  </tr>
					</table>
				<?php endforeach ?>
				<div class="small-18 medium-16">
					<?php echo $page->text()->kt()?>
				</div>
			</div>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>