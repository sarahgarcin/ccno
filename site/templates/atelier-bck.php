<?php snippet('header') ?>

<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
  $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
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




<div>
	<?php snippet('menu') ?>

	<main class="row">
		<?php snippet('left-col') ?>
		<div class="atelier_main col-xs-12 col-sm-11 col-sm-offset-1 col-md-9 col-md-offset-1">
			<div class="main-content">
				<div class="arrow-back">
				<a href="" onclick="window.history.go(-1); return false;" title="<?php echo $page->parent()->title()?>">
					<
				</a>
			</div>
			<h1 class="main-content_title col-xs-12"><?= $page->title()->html() ?></h1>
			<?php snippet('icone-page')?>
			<div class="row">
				<div class="text col-xs-12 col-md-7 col-md-offset-1">
					<?php if($page->billeterie()->isNotEmpty()):?>
						<div class="btn btn-rose">
							<a href="<?php echo $page->billeterie()->text()?>" title="Réservation" target="_blank">Réservation
							</a>
						</div>
					<?php endif?>
					<div class="summary-liste">
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
				</div>
			</div>
			</div>
		</div>
	</main>
</div>




<?php snippet('footer') ?>

