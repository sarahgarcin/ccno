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
		<nav>
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
		<div class="text small-16 small-push-2 medium-16 medium-push-2 large-11 large-push-2">
			<?php echo $page->text()->kirbytext() ?>
			<?php 
					foreach($site->images()->shuffle()->limit(10) as $file)
					{?>
						<div class="picto-wrapper">
							<img src="<?php echo $file->url() ?>" alt="">
						</div>
					<?php }
				?>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

