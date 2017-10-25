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
	<main class="small-18 medium-14 columns">
		<h1><?= $page->title()->html() ?></h1>
		<h3 class="click---past-events">ce qui est passé</h3>
		<h3 class="title--next-events active">ce qui est à venir</h3>
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
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>