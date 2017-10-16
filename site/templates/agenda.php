<?php snippet('header') ?>
<?php snippet('en-cours') ?>
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
				$i++;
				$dateFormat = date("d-m-Y", strtotime($dates->moment()));
				$Day =  date("d", strtotime($dateFormat));
				$Month = $mois[date("n", strtotime($dateFormat)) - 1];
				$Year = date("Y", strtotime($dateFormat));

				$array[$i]['date'] = date("Ymd", strtotime($dates->moment()));
				$array[$i]['jour'] = $Day;
				$array[$i]['mois'] = $Month;
				$array[$i]['an'] = $Year;
				$array[$i]['titre'] = $dates->title();
				$array[$i]['heures'] = $dates->hours();
				$array[$i]['lieu'] = $dates->place();
		    $array[$i]['url'] = $url;
		    
		    $projectTime = date("Ymd", strtotime($dateFormat));

				if($currentTime > $projectTime){
					unset($array[$i]);
				}
			endforeach;
		endif;
	endforeach;

	usort($array, function($a, $b) {
	  return $a['date'] - $b['date'];
	});

?>

<div class ="row">
	<?php snippet('left-col') ?>
	<main class="small-18 medium-13 columns">
		<?php //snippet('breadcrumb') ?>
		<h1><?= $page->title()->html() ?></h1>
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
			       <col span="1" style="width: 50%;">
			       <col span="1" style="width: 30%;">
			       <col span="1" style="width: 20%;">
			    </colgroup>
				  <tr>
				    <td>
				    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
				    		<?php echo $date['titre']?></td>
				    	</a>
				    <td>
				    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
				    		<?php echo $date['jour']." ".$date['mois'].", ".$date['heures']?></td>
				    	</a>
				    <td>
				    	<a href="<?php echo $date['url']?>" title="<?php echo $date['titre']?>">
				    		<?php echo $date['lieu']?>
				    	</a>
				    </td>
				  </tr>
			</table>
		<?php endforeach ?>
	</main>
	
</div>


<?php snippet('footer') ?>