<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php $mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
  $day = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
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
		<div class="text icones-wrapper-text small-16 small-push-2 medium-16 medium-push-2 large-16 large-push-2 columns">
			<div class="large-13">
				<?php echo $page->text()->kirbytext() ?>
			</div>
			<?php snippet('icones') ?>
				<ul class="accueils-module">
					<?php foreach($page->children()->visible() as $child):?>
						<li>
							<div class="accueils-element large-13">
								<h2><?php echo $child->title()->html()?></h2>
								<h3><?php echo $child->personne()->html()?></h3>
							</div>
							<div class="row accueils-text">
								<div class="large-13 columns">
										<?php echo $child->text()->kirbytext() ?>
			
										<div class="biography small-8">
											<?php echo $child->bio()->kirbytext()?>
										</div>
								</div>
								<?php if($child->dates()->isNotEmpty()):?>
									<div class="notes-dates small-16 medium-16 large-5 columns">
										<ul>
											<?php foreach($child->dates()->toStructure() as $dates):?>
												<li>
													<h4>
														<?php echo $day[date("N", strtotime($dates->moment()))];?>
														<?php echo date("j", strtotime($dates->moment()));?>
														<?php echo $mois[date("n", strtotime($dates->moment())) - 1];?>
														<br>
														<?php echo $dates->hours()->html() ?>
													</h4>
													<h5><?php echo $dates->title()->html() ?></h5>

												</li>
											<?php endforeach ?>
										</ul>
									</div>
								<?php endif ?>
							</div>
						</li>
					<?php endforeach?>
				</ul>

		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

