<?php snippet('header') ?>

<?php $mois = [l::get('janvier'), l::get('fevrier'), l::get('mars'), l::get('avril'), l::get('mai'), l::get('juin'), l::get('juillet'), l::get('aout'), l::get('septembre'), l::get('octobre'), l::get('novembre'), l::get('decembre')];
  $day = [l::get('lundi'),l::get('mardi'),l::get('mercredi'),l::get('jeudi'),l::get('vendredi'),l::get('samedi'),l::get('dimanche')];
?>

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

<div>
	<?php snippet('menu') ?>

	<main class="row">
		<?php snippet('left-col') ?>
		<div class="creationstournees_main col-xs-12 col-sm-10 col-sm-offset-1 col-md-9 col-md-offset-1">
			<div class="main-content">
				<?php snippet('icone-page')?>
				<h1 class="main-content_title orleans col-xs-12">
					<?= l::get('creations') ?>
				</h1>
				<div class="col-xs-12">
					<div class="creations list-with-images col-md-10">
						<ul class="row">
							<?php foreach($projetsMaud as $child):?>
								<li class="col-xs-6 col-sm-6 col-md-4">
									<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>">
										<div class="title-wrapper">
											<?php echo $child->title()->html()?>
										</div>
										<?php if($child->hasImages()):?>
											<div class="thumb-wrapper">
												<figure>
													<?= $child->images()->first()->crop(500, 500);?>
												</figure>
											</div>
										<?php endif ?>
									</a>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
					<div class="creations-text">
						<?php echo $page->text()->kt()?>
					</div>
				</div>
				<h1 class="main-content_title orleans col-xs-12">
					<?= l::get('calendriertournee') ?>
				</h1>
				<div class="calendriertournee_agenda col-xs-12">
					<?php 
					$previousMonth = null;
					$previousYear = null;
					foreach($arrayMaud as $date):?>
						<?php if($previousYear != $date['fromYear']):?>
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
						    			<?php echo $date['fromDay']." ".$date['fromMonth']." ".$date['heures']?>
						    		<?php else:?>
						    			<?php echo l::get('du').' '.$date['fromDay']." ".$date['fromMonth'].' '.l::get('au').' '.$date['toDay']." ".$date['toMonth']." ".$date['heures']?>
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
			</div>
		</div>
	</main>
</div>

<?php snippet('footer') ?>