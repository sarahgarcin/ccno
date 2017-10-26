<?php snippet('header') ?>
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
		<nav class="menu-page xlarge-11">
			<ul>
				<?php foreach($page->children()->visible() as $child):?>
					<li>
						<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>">
							<?php echo $child->title()->html()?>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
		</nav>
		<div class="text icones-wrapper-text small-16 small-push-2 medium-16 medium-push-2 large-11 large-push-2 xlarge-8">
			<?php echo $page->text()->kirbytext() ?>
			<?php snippet('icones') ?>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

