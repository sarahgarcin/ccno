<?php snippet('header') ?>

<?php $mois = ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'];
  $day = ['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];
?>

<div class ="row">

	<?php snippet('left-col') ?>
	<?php snippet('menu') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		
		<div class="main-content">
			<h1><?= $page->parent()->title()->html() ?></h1>
			<?php if($page->icone()->isNotEmpty()):?>
				<?php 
				$icone = $page->parent()->icone()->toFile();
				if($icone->isPortrait()):?>
					<div class="icone portrait">
						<img src="<?php echo $icone->url() ?>" alt="">
					</div>
				<?php elseif($icone->isSquare()):?>
					<div class="icone square">
						<img src="<?php echo $icone->url() ?>" alt="">
					</div>
				<?php else:?>
					<div class="icone landscape">
						<img src="<?php echo $icone->url() ?>" alt="">
					</div>
				<?php endif; ?>
			<?php endif ?>
			<div class="row">
				<div class="text icones-wrapper-text small-18 medium-16 medium-push-2 large-11 large-push-2 xlarge-8 columns">
					<div class="summary-liste small-18 medium-18 xlarge-18">
						<?php echo $page->parent()->text()->kirbytext()?>
					</div>
					<h2>
					<?php if(strtotime($page->from()) == strtotime($page->to())):?>
							<?php echo $day[date("N", strtotime($page->from())) - 1];?>
							<?php echo date("j", strtotime($page->from()));?>
							<?php echo $mois[date("n", strtotime($page->from())) - 1];?>
						<?php else:?>
							<?php echo "du ".$day[date("N", strtotime($page->from())) - 1];?>
							<?php echo date("j", strtotime($page->from()));?>
							<?php echo $mois[date("n", strtotime($page->from())) - 1];?>
							<?php echo "au ".$day[date("N", strtotime($page->to())) - 1];?>
							<?php echo date("j", strtotime($page->to()));?>
							<?php echo $mois[date("n", strtotime($page->to())) - 1];?>
						<?php endif;?>
						<?php echo $page->title()->html() ?>
					</h2>
					<?php echo $page->text()->kt() ?>
				</div>
			</div>
		</div>
	</main>
	
</div>

<?php snippet('footer') ?>