<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php $mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];?>

<?php 
	$projets = $site->index()->filterBy('template', 'default');

	$i = 0;
	$currentTime = date('Ymd');

	foreach($projets as $projet):
		$project = $site->page($projet);
		$url = $project->url();

		if($project->dates()->isNotEmpty()):
			foreach($project->dates()->toStructure() as $dates):
				if($dates->agenda() != 'non'):
					$i++;
					$dateFormat = date("d-m-Y", strtotime($dates->moment()));
					$Day =  date("j", strtotime($dateFormat));
					$Month = $mois[date("n", strtotime($dateFormat)) - 1];
					$Year = date("Y", strtotime($dateFormat));

					$array[$i]['date'] = date("Ymd", strtotime($dates->moment()));
					$array[$i]['jour'] = $Day;
					$array[$i]['mois'] = $Month;
					$array[$i]['an'] = $Year;
					$array[$i]['titre'] = $dates->title();
					$array[$i]['type'] = $dates->type();
					$array[$i]['heures'] = $dates->hours();
					$array[$i]['lieu'] = $dates->place();
			    $array[$i]['url'] = $url;
			    
			    $projectTime = date("Ymd", strtotime($dateFormat));
			    
			    $arrayPast[$i]['date'] = date("Ymd", strtotime($dates->moment()));
					$arrayPast[$i]['jour'] = $Day;
					$arrayPast[$i]['mois'] = $Month;
					$arrayPast[$i]['an'] = $Year;
					$arrayPast[$i]['titre'] = $dates->title();
					$arrayPast[$i]['type'] = $dates->type();
					$arrayPast[$i]['heures'] = $dates->hours();
					$arrayPast[$i]['lieu'] = $dates->place();
			    $arrayPast[$i]['url'] = $url;
			    
			    if($currentTime < $projectTime){
						unset($arrayPast[$i]);
					}

					if($currentTime > $projectTime){
						unset($array[$i]);
					}
				endif;
			endforeach;
		endif;
	endforeach;

	usort($array, function($a, $b) {
	  return $a['date'] - $b['date'];
	});

	usort($arrayPast, function($a, $b) {
	  return $a['date'] - $b['date'];
	});

?>

<div class ="row">
	<?php snippet('left-col') ?>
	<main class="small-18 medium-14 columns">
		<h1><?= $page->title()->html() ?></h1>
		<div class="pastEvents">
			<h3 class="click---past-events">Évènements passés</h3>
			<div class="pastEvents-wrapper">
				<?php $previousMonthPast = null;
					foreach($arrayPast as $date):?>
					<?php 
						if($previousMonthPast != $date['mois']):?>
					 		<h2><?php echo $date['mois'];?> <?php echo $date['an'];?></h2>
					 	<?php endif;
						$previousMonthPast = $date['mois'];
					?>
					<table>
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
				    <td>
				    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
				    		<?php echo $date['jour']." ".$date['mois'].", ".$date['heures']?>
				    	</a>
				    <td>
				    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
				    		<?php echo $date['lieu']?>
				    	</a>
				    </td>
				    <td>
				    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
				    		<?php echo $date['titre']?>
				    	</a>
				    <td>
				  </tr>
			</table>
				<?php endforeach ?>
			</div>
			<h3 class="title--next-events">Évènements à venir</h3>
		</div>

		<?php $previousMonth = null;
			foreach($array as $date):?>
			<?php 
				if($previousMonth != $date['mois']):?>
			 		<h2><?php echo $date['mois'];?> <?php echo $date['an'];?></h2>
			 	<?php endif;
				$previousMonth = $date['mois'];
			?>
			<table>
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
				    <td>
				    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
				    		<?php echo $date['jour']." ".$date['mois'].", ".$date['heures']?>
				    	</a>
				    <td>
				    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
				    		<?php echo $date['lieu']?>
				    	</a>
				    </td>
				    <td>
				    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
				    		<?php echo $date['titre']?>
				    	</a>
				    <td>
				  </tr>
			</table>
		<?php endforeach ?>
	</main>
	
</div>


<?php snippet('footer') ?>