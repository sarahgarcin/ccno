<?php $mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
  $day = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
?>

<div class="notes-dates small-16 medium-16 large-5 columns">
	<ul>
		<?php foreach($page->dates()->toStructure() as $dates):?>
			<li>
				<h4>
					<?php echo $day[date("N", strtotime($dates->moment()))];?>
					<?php echo date("d", strtotime($dates->moment()));?>
					<?php echo $mois[date("n", strtotime($dates->moment())) - 1];?>
					<br>
					<?php echo $dates->hours()->html() ?>
				</h4>
				<h5><?php echo $dates->title()->html() ?></h5>

			</li>
		<?php endforeach ?>
	</ul>
	
	
</div>