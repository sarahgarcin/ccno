<?php snippet('header') ?>
<?php snippet('en-cours') ?>
<?php snippet('menu') ?>


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
				<ul class="liste-module">
					<?php foreach($page->children()->visible() as $child):?>
						<li>
							<div class="liste-element row">
								<h2 class="small-6 columns"><?php echo $child->title()->html()?></h2>
								<div class="summary-liste small-14 columns">
									<?php echo $child->summary()->kirbytext()?>
								</div>
							</div>
							<div class="liste-text">
									<?php echo $child->text()->kirbytext() ?>
							</div>
						</li>
					<?php endforeach?>
				</ul>

		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

