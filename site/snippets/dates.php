<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
  $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>

<div class="notes-dates small-16 medium-16 large-5 large-push-2 xlarge-3 xlarge-push-2 end columns">
	<ul>
		<?php foreach($page->dates()->toStructure() as $dates):?>
			<li>
				<?php if($dates->link()->isNotEmpty()):?>
					<a href="<?php echo $dates->link()?>" title="<?php echo $dates->title()?>">
				<?php endif; ?>
					<h4>
						<?php if(strtotime($dates->from()) == strtotime($dates->to())):?>
							<?php echo $day[date("N", strtotime($dates->from()))];?>
							<?php echo date("j", strtotime($dates->from()));?>
							<?php echo $mois[date("n", strtotime($dates->from())) - 1];?>
						<?php else:?>
							<?php echo "du ".$day[date("N", strtotime($dates->from()))];?>
							<?php echo date("j", strtotime($dates->from()));?>
							<?php echo $mois[date("n", strtotime($dates->from())) - 1];?>
							<?php echo "au ".$day[date("N", strtotime($dates->to()))];?>
							<?php echo date("j", strtotime($dates->to()));?>
							<?php echo $mois[date("n", strtotime($dates->to())) - 1];?>
						<?php endif;?>
						<br>
						<?php echo $dates->hours()->html() ?>
					</h4>
					<h5><?php echo $dates->title()->html() ?></h5>
					<h6><?php echo $dates->place()->html() ?></h6>
					<h6><?php echo $dates->type()->html() ?></h6>
				<?php if($dates->link()->isNotEmpty()):?>
					</a>
				<?php endif; ?>

			</li>
		<?php endforeach ?>
	</ul>
	
	
</div>