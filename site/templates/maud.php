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
					<div class="creations list-with-images col-md-10">
						<h1>Créations</h1>
						<ul class="row">
							<?php foreach($page->children()->visible() as $child):?>
								<li class="col-sm-6">
									<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>">
										<?php echo $child->title()->html()?>
										<?php if($child->hasImages()):?>
											<div class="thumb-wrapper">
												<figure>
													<!-- <?//= $child->images()->first()->crop(500, 500);?> -->
													<img src="<?php echo $child->images()->first()->url()?>" alt="<?php echo $child->title()?>">
												</figure>
												
											</div>
										<?php endif ?>
									</a>
								</li>
							<?php endforeach ?>
						</ul>
					</div>
					<div class="text col-md-8">
						<h1>Biographie</h1>
						<?php echo $page->text()->kirbytext() ?>
					</div>
				</div>
			</div>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

