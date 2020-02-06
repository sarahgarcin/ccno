<?php $mois = [l::get('janvier'), l::get('fevrier'), l::get('mars'), l::get('avril'), l::get('mai'), l::get('juin'), l::get('juillet'), l::get('aout'), l::get('septembre'), l::get('octobre'), l::get('novembre'), l::get('decembre')];
  $day = [l::get('lundi'),l::get('mardi'),l::get('mercredi'),l::get('jeudi'),l::get('vendredi'),l::get('samedi'),l::get('dimanche')];
?>

<div class="notes-dates col-xs-12 col-md-4">
	<?php if($page->billeterie()->isNotEmpty()):?>
		<div class="notes-dates_billeterie btn btn-rose">
			<a href="<?php echo $page->billeterie()->text()?>" title="Réservation" target="_blank">Réservation
			</a>
		</div>
	<?php endif?>
	<ul>
		<?php foreach($page->dates()->toStructure() as $dates):?>
			<li>
				<?php if($dates->link()->isNotEmpty()):?>
					<a href="<?php echo $dates->link()?>" title="<?php echo $dates->title()?>">
				<?php endif; ?>
					<h6><?php echo $dates->type()->html() ?></h6>
					<h4>
						<?php if(strtotime($dates->from()) == strtotime($dates->to())):?>
							<?php echo $day[date("N", strtotime($dates->from())) - 1];?>
							<?php echo date("j", strtotime($dates->from()));?>
							<?php echo $mois[date("n", strtotime($dates->from())) - 1];?>
							<?php echo date("Y", strtotime($dates->from()));?>
						<?php else:?>
							<?php echo "du ".$day[date("N", strtotime($dates->from())) - 1];?>
							<?php echo date("j", strtotime($dates->from()));?>
							<?php echo $mois[date("n", strtotime($dates->from())) - 1];?><br>
							<?php echo "au ".$day[date("N", strtotime($dates->to())) - 1];?>
							<?php echo date("j", strtotime($dates->to()));?>
							<?php echo $mois[date("n", strtotime($dates->to())) - 1];?>
							<?php echo date("Y", strtotime($dates->from()));?>
						<?php endif;?>
						<br>
						<?php echo $dates->hours()->html() ?>
					</h4>
					<h6><?php echo $dates->place()->html() ?></h6>
					<h5><?php echo $dates->title()->html() ?></h5>
					
					
				<?php if($dates->link()->isNotEmpty()):?>
					</a>
				<?php endif; ?>

			</li>
		<?php endforeach ?>
	</ul>
	
	
</div>