<?php snippet('header') ?>
<?php snippet('en-cours') ?>
<?php snippet('menu') ?>


<div class ="row">

	<?php snippet('left-col') ?>
	<main class="small-18 medium-13 columns">
		<?php snippet('breadcrumb') ?>
		<h1><?= $page->title()->html() ?></h1>
		<div class="icones-wrapper-text">
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
	</main>
	
</div>


<?php snippet('footer') ?>

