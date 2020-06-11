<?php snippet('header') ?>

<div>
	<?php snippet('menu') ?>

	<main class="row">
		<?php snippet('left-col') ?>
		<div class="maud_main col-xs-12 col-sm-10 col-sm-offset-1 col-md-9 col-md-offset-1">
			<div class="main-content">
				<h1 class="main-content_title orleans col-xs-12">
					<?= $page->title()->html() ?>	
				</h1>
				<?php snippet('icone-page')?>
				<div class="col-xs-12 col-md-offset-1">
					<div class="text col-md-8">
						<h1><?= l::get('biographie') ?></h1>
						<?php echo $page->text()->kirbytext() ?>
					</div>
					<div class="creations list-with-images col-md-10">
						<h1><?= l::get('creations') ?></h1>
						<ul class="row">
							<?php foreach($page->children()->visible() as $child):?>
								<li class="col-xs-6 col-sm-6 col-md-4">
									<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>">
										<div class="title-wrapper">
											<?php echo $child->title()->html()?>
										</div>
										<?php if($child->hasImages()):?>
											<div class="thumb-wrapper">
												<figure>
													<?= $child->images()->first()->crop(500, 500);?>
												</figure>
												
											</div>
										<?php endif ?>
									</a>
								</li>
							<?php endforeach ?>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

