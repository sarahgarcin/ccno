<?php snippet('header') ?>
<?php snippet('en-cours') ?>
<?php snippet('menu') ?>

<?php 
	$publishMonth = array(null,
	'janvier',
  'février',
  'mars',
  'avril',
  'mai',
  'juin',
  'juillet',
  'août',
  'septembre',
  'octobre',
  'novembre',
  'décembre');

  $publishDay = array(null,
	'lundi',
  'mardi',
  'mercredi',
  'jeudi',
  'vendredi',
  'samedi',
  'dimanche');

?>



<div class ="row">

	<?php snippet('left-col') ?>
	<main class="small-18 medium-13 columns">
		<?php snippet('breadcrumb') ?>
		<h1><?= $page->title()->html() ?></h1>
		<?php if($page->icone()->isNotEmpty()):?>
			<div class="icone">
				<img src="<?php echo $page->icone()->toFile()->url() ?>" alt="">
			</div>
		<?php endif ?>
		<div class="text icones-wrapper-text small-16 small-push-2 medium-16 medium-push-2 large-11 large-push-2">
			<?php echo $page->text()->kirbytext() ?>
			<?php snippet('icones') ?>
				<ul class="accueils-module">
					<?php foreach($page->children()->visible() as $child):?>
						<li>
							<div class="accueils-element row">
								<h2><?php echo $child->title()->html()?></h2>
								<h3><?php echo $child->personne()->html()?></h3>
							</div>
							<div class="accueils-text">
									<?php echo $child->text()->kirbytext() ?>
									<div class="events">
										<ul>
											<?php foreach($child->dates()->toStructure() as $date):?>
												<div class="accueils-date">
													<span class="date-event"> 
														<?php echo $publishDay[date("N", strtotime($date->moment()))]?>
														<?php echo date("d", strtotime($date->moment()))?>
														<?php echo $publishMonth[date("m", strtotime($date->moment()))]?>
														<?php echo date("Y", strtotime($date->moment()))?><br>
														<?php echo $date->hours()->html()?>
													</span>
													<span class="titre-event"><?php echo $date->title()->html()?></span>
												</div>
											<?php endforeach ?>
										</ul>
									</div>
									<div class="biography small-10">
										<?php echo $child->bio()->kirbytext()?>
									</div>
							</div>
						</li>
					<?php endforeach?>
				</ul>

		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

