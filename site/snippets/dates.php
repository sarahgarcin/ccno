<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
  $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>

<div class="notes-dates small-16 medium-16 large-5 large-push-2 xlarge-3 xlarge-push-2 end columns">
	<?php if($page->billeterie()->isNotEmpty()):?>
		<a href="<?php echo $page->billeterie()->text()?>" title="Réservation" target="_blank">
			<div class="bouton-billeterie">
				Réservation
			</div>
		</a>
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