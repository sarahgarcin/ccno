<?php snippet('header') ?>
<?php $mois = [l::get('janvier'), l::get('fevrier'), l::get('mars'), l::get('avril'), l::get('mai'), l::get('juin'), l::get('juillet'), l::get('aout'), l::get('septembre'), l::get('octobre'), l::get('novembre'), l::get('decembre')];
  $day = [l::get('lundi'),l::get('mardi'),l::get('mercredi'),l::get('jeudi'),l::get('vendredi'),l::get('samedi'),l::get('dimanche')];
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
				<h1 class="small-9 medium-7 large-7 orleans"><?= $page->title()->html() ?></h1>
				<?php snippet('icone-page')?>
				<div class="text icones-wrapper-text small-18 medium-16 large-16 xlarge-10">
					<?php echo $page->text()->kirbytext() ?>
						<ul class="liste-module">
							<?php foreach($page->children()->visible() as $child):?>
								<?php if($page->children()->visible()->count() == 1):?>
									<li class="active">
										<div class="liste-element row">
											<h2 class="small-18 medium-6 xlarge-7 columns end"><?php echo $child->title()->html()?></h2>
											<div class="summary-liste small-18 medium-12 large-10 xlarge-11 columns end">
												<?php echo $child->summary()->kirbytext()?>
											</div>
										</div>
										<div class="liste-text">
											<div class="small-18 medium-13 medium-push-2 xlarge-12 columns end">
												<?php if($child->dates()->isNotEmpty() && $child->display() != "text"):?>
													<ul>
														<?php foreach($child->dates()->toStructure() as $dates):?>
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
																	<?php echo $dates->title()->html() ?>
																</h2>
																<?php echo $dates->text()->kt() ?>
															</li>
														<?php endforeach ?>
													</ul>
												<?php else: ?>
													<?php echo $child->text()->kt()?>
												<?php endif ?>
											</div>
										</div>
									</li>
								<?php else: ?>
									<li>
										<div class="liste-element row">
											<h2 class="small-18 medium-6 xlarge-7 columns end"><?php echo $child->title()->html()?></h2>
											<div class="summary-liste small-18 medium-12 large-10 xlarge-11 columns end">
												<?php echo $child->summary()->kirbytext()?>
											</div>
										</div>
										<div class="liste-text row">
											<div class="small-18 medium-18 medium-push-2 large-13 large-push-2 xlarge-12 columns end">
												<?php if($child->dates()->isNotEmpty() && $child->display() != "text"):?>
													<ul>
														<?php foreach($child->dates()->toStructure() as $dates):?>
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
																	<?php echo $dates->title()->html() ?>
																</h2>
																<?php echo $dates->text()->kt() ?>
															</li>
														<?php endforeach ?>
													</ul>
												<?php else: ?>
													<?php echo $child->text()->kt()?>
												<?php endif ?>
											</div>
					
										</div>
									</li>
								<?php endif?>
							<?php endforeach?>
						</ul>
						<?php snippet('icones') ?>
				</div>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

