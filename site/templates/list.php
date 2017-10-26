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
		<div class="text icones-wrapper-text small-18 medium-16 large-16 xlarge-10">
			<?php echo $page->text()->kirbytext() ?>
				<ul class="liste-module">
					<?php foreach($page->children()->visible() as $child):?>
						<?php if($page->children()->visible()->count() == 1):?>
							<li class="active">
								<div class="liste-element row">
									<h2 class="small-18 medium-4 xlarge-6 columns end"><?php echo $child->title()->html()?></h2>
									<div class="summary-liste small-18 medium-10 xlarge-12 columns end">
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
															<?php echo $day[date("N", strtotime($dates->moment()))];?>
															<?php echo date("j", strtotime($dates->moment()));?>
															<?php echo $mois[date("n", strtotime($dates->moment())) - 1];?>
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
									<h2 class="small-18 medium-4 xlarge-6 columns end"><?php echo $child->title()->html()?></h2>
									<div class="summary-liste small-18 medium-10 xlarge-12 columns end">
										<?php echo $child->summary()->kirbytext()?>
									</div>
								</div>
								<div class="liste-text row">
									<div class="small-18 medium-13 medium-push-2 xlarge-12 columns end">
										<?php if($child->dates()->isNotEmpty() && $child->display() != "text"):?>
											<ul>
												<?php foreach($child->dates()->toStructure() as $dates):?>
													<li>
														<h2>
															<?php echo $day[date("N", strtotime($dates->moment()))];?>
															<?php echo date("j", strtotime($dates->moment()));?>
															<?php echo $mois[date("n", strtotime($dates->moment())) - 1];?>
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
	</main>
	
</div>


<?php snippet('footer') ?>

