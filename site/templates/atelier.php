<?php snippet('header') ?>

<?php $mois = [l::get('janvier'), l::get('fevrier'), l::get('mars'), l::get('avril'), l::get('mai'), l::get('juin'), l::get('juillet'), l::get('aout'), l::get('septembre'), l::get('octobre'), l::get('novembre'), l::get('decembre')];
  $day = [l::get('lundi'),l::get('mardi'),l::get('mercredi'),l::get('jeudi'),l::get('vendredi'),l::get('samedi'),l::get('dimanche')];
?>

<?php	

	$nbateliers = 0;
	foreach($page->dates()->toStructure() as $dates):
		$nbateliers ++;
		try {

		  $newPage = $page->children()->create($page->uid().'-'.$nbateliers, 'dateatelier', array(
		    'title' => $dates->title(),
		    'type' => $dates->type(),
		    'personne' => $dates->personne(),
		    'from' => $dates->from(),
		   	'to' => $dates->to(),
		    'hours' => $dates->hours(),
		    'place' => $dates->place(),
		    'text' => $dates->text(),
		    'link' => $dates->link(),
		    'icone' => $page->icone(),
		  ));

		  //echo 'The new page has been created';

		} catch(Exception $e) {

		  //echo $e->getMessage();

		}

		try {

		$page->find($page->uid().'-'.$nbateliers)->update(array(
	  	'title' => $dates->title(),
	    'type' => $dates->type(),
	    'personne' => $dates->personne(),
	    'from' => $dates->from(),
	   	'to' => $dates->to(),
	    'hours' => $dates->hours(),
	    'place' => $dates->place(),
	    'text' => $dates->text(),
	    'link' => $dates->link(),
	    'icone' => $page->icone(),
	  ));

		  //echo 'The page has been updated';

		} catch(Exception $e) {

		  //echo $e->getMessage();

		}

	endforeach;
?>




<div class ="row">

	<?php snippet('left-col') ?>
	<?php snippet('menu') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		
		<div class="main-content">

			<div class="arrow-back">
				<a href="" onclick="window.history.go(-1); return false;" title="<?php echo $page->parent()->title()?>">
					<
				</a>
			</div>
			<h1><?= $page->title()->html() ?></h1>
			<?php snippet('icone-page')?>
			<div class="row">
				<div class="text icones-wrapper-text small-18 medium-16 medium-push-2 large-11 large-push-2 xlarge-8 columns">
				<a class="billet-link" href="<?php echo $page->billeterie()->text()?>" title="Billetterie" target="_blank">
					<div class="bouton-billeterie">
						<?= l::get('reservations') ?>
					</div>
				</a>
					<div class="summary-liste small-18 medium-18 xlarge-18">
						<?php echo $page->text()->kirbytext()?>
					</div>
					<?php if($page->displayDates() != 'non'):?>
						<ul>
							<?php foreach($page->dates()->toStructure() as $dates):?>
								<li>
									<h2>
									<?php if(strtotime($dates->from()) == strtotime($dates->to())):?>
											<?php echo $day[date("N", strtotime($dates->from())) - 1];?>
											<?php echo date("j", strtotime($dates->from()));?>
											<?php echo $mois[date("n", strtotime($dates->from())) - 1];?>
										<?php else:?>
											<?php echo "du ".$day[date("N", strtotime($dates->from())) - 1];?>
											<?php echo date("j", strtotime($dates->from()));?>
											<?php echo $mois[date("n", strtotime($dates->from())) - 1];?>
											<?php echo "au ".$day[date("N", strtotime($dates->to())) - 1];?>
											<?php echo date("j", strtotime($dates->to()));?>
											<?php echo $mois[date("n", strtotime($dates->to())) - 1];?>
										<?php endif;?>
										<?php if($page->displayTitle() != 'non'):?>
											<?php echo $dates->title()->html() ?>
										<?php endif; ?>
									</h2>
									<?php echo $dates->text()->kt() ?>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif; ?>
					<?php snippet('icones') ?>
				</div>
			</div>
		</div>
	</main>
	
</div>




<?php snippet('footer') ?>

