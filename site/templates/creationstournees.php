<?php snippet('header') ?>

<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];?>

<?php 
	$projetsMaud = $site->index()->find('centre-choregraphique-national-dorleans/maud-le-pladec')->children()->visible();

	$i = 0;
	$currentTime = date('Ymd');

	foreach($projetsMaud as $projet):
		$project = $site->page($projet);
		$url = $project->url();

		if($project->dates()->isNotEmpty()):
			foreach($project->dates()->toStructure() as $dates):
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


					$arrayMaud[$i]['datestart'] = date("Ymd", strtotime($from));
    			$arrayMaud[$i]['dateend'] = date("Ymd", strtotime($to));

					$arrayMaud[$i]['fromDay'] = $fromDay;
			    $arrayMaud[$i]['fromMonth'] = $fromMonth;
			    $arrayMaud[$i]['fromYear'] = $fromYear;
			    $arrayMaud[$i]['toDay'] = $toDay;
			    $arrayMaud[$i]['toMonth'] = $toMonth;
			    $arrayMaud[$i]['toYear'] = $toYear;
					$arrayMaud[$i]['titre'] = $dates->title();
					$arrayMaud[$i]['type'] = $dates->type();
					$arrayMaud[$i]['heures'] = $dates->hours();
					$arrayMaud[$i]['lieu'] = $dates->place();
			    $arrayMaud[$i]['url'] = $url;
			endforeach;
		endif;
	endforeach;

	usort($arrayMaud, function($a, $b) {
	  return  $b['datestart']-$a['datestart'];
	});

?>



<div class ="row">

	<?php snippet('left-col') ?>
	<?php snippet('menu') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		
		<div class="main-content">
			<h1 class="orleans">Créations</h1>
			<div class="creations list-with-images small-18 medium-16 large-14 xlarge-8">
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
			<div class="creations-text small-18 medium-16 large-12 xlarge-8">
				<?php echo $page->text()->kt()?>
			</div>

			<hr>

			<h1 class="orleans">Calendrier de tournée</h1>
			<?php $previousMonth = null;
				$previousYear = null;
				foreach($arrayMaud as $date):?>
				<?php 
					if($previousYear != $date['fromYear']):?>
				 		<h2><?php echo $date['fromYear'];?></h2>
				 	<?php endif;
					$previousYear = $date['fromYear'];
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
			    			<?php echo 'du '.$date['fromDay']." ".$date['fromMonth'].' au '.$date['toDay']." ".$date['toMonth'].", ".$date['heures']?>
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
			<?php endforeach;?>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>