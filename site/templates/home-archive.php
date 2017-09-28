<?php snippet('header') ?>
<?php snippet('en-cours') ?>
<div class ="row">

	<?php snippet('left-col') ?>

	<main class="small-18 medium-13 columns">
		<div class="image-icono">
			<img src="<?php echo $page->back()->toFile()->url()?>" alt="Orléans">
		</div>
		<div class="icone-new">
			<img src="<?php echo $page->icone()->toFile()->url()?>" alt="Nouvelle direction">
		</div>
		
			<div class="actu">
			<a href="<?php echo $pages->find('nouvelle-direction')->url()?>" title="<?php echo $pages->find('nouvelle-direction')->title()?>">
				<div class="actu-title">
					<p>Maud<br> 	
					Le Pladec :<br>
					Nouvelle Direction
					</p>
				</div>
				<div class="actu-date">
					<p>29 et 30<br>  
					septembre 2017<br> 
					</p>
				</div>
			</a>
			<p class="link"><a href="<?php echo $pages->find('nouvelle-direction')->url()?>" title="<?php echo $pages->find('nouvelle-direction')->title()?>">+ d’infos</a></p>
		</div>

	</main>

</div>


<?php snippet('footer') ?>

