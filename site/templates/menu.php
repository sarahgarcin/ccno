<?php snippet('header') ?>


<div class ="row">

	<?php snippet('left-col') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		<?php snippet('menu') ?>
		<div class="main-content">
			<h1><?= $page->title()->html() ?></h1>
			<div class="text icones-wrapper-text small-18 medium-16 medium-push-2 large-11 large-push-2 xlarge-8">
				<?php snippet('icones') ?>
				<ul>
					<?php foreach($page->children()->visible() as $child):?>
						<li>
							<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>">
							<?php echo $child->title()?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

