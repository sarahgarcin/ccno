<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
  $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>

<div class ="row">

	<?php snippet('left-col') ?>
	<main class="small-18 medium-13 columns">
		<?php snippet('breadcrumb') ?>
		<h1><?= $page->title()->html() ?></h1>
		<?php snippet('icone-page')?>
		<div class="text icones-wrapper-text small-18 medium-16 medium-push-2 large-16 large-push-2 xlarge-10 columns">
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
								<div class="small-18 large-13 columns">
										<?php echo $child->text()->kirbytext() ?>
			
										<div class="biography small-12 medium-8">
											<?php echo $child->bio()->kirbytext()?>
										</div>
								</div>
								<?php if($child->dates()->isNotEmpty()):?>
									<div class="notes-dates small-16 medium-16 large-5 columns end">
										<ul>
											<?php foreach($child->dates()->toStructure() as $dates):?>
												<li>
													<?php if($dates->link()->isNotEmpty()):?>
														<a href="<?php echo $dates->link()?>" title="<?php echo $dates->title()?>">
													<?php endif; ?>
														<h4>
															<?php if(strtotime($dates->from()) == strtotime($dates->to())):?>
																<?php echo $day[date("N", strtotime($dates->from()))- 1];?>
																<?php echo date("j", strtotime($dates->from()));?>
																<?php echo $mois[date("n", strtotime($dates->from())) - 1];?>
															<?php else:?>
																<?php echo "du ".$day[date("N", strtotime($dates->from()))- 1];?>
																<?php echo date("j", strtotime($dates->from()));?>
																<?php echo $mois[date("n", strtotime($dates->from())) - 1];?>
																<?php echo "au ".$day[date("N", strtotime($dates->to())) - 1];?>
																<?php echo date("j", strtotime($dates->to()));?>
																<?php echo $mois[date("n", strtotime($dates->to())) - 1];?>
															<?php endif;?>
															<br>
															<?php echo $dates->hours()->html() ?>
														</h4>
														<h5><?php echo $dates->title()->html() ?></h5>
														<h6><?php echo $dates->type()->html() ?></h6>
														<h6><?php echo $dates->place()->html() ?></h6>
													<?php if($dates->link()->isNotEmpty()):?>
														</a>
													<?php endif; ?>

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

