<?php snippet('header') ?>


<div>
	<?php snippet('menu') ?>

	<main class="row">
		<?php snippet('left-col') ?>
		<div class="accueils_main col-xs-12 col-sm-11 col-sm-offset-1 col-md-9 col-md-offset-1">
			<div class="main-content">
				<h1 class="main-content_title orleans col-xs-12">
					<?= $page->title()->html() ?>
				</h1>
				<?php snippet('icone-page')?>
				<div class="text col-xs-12 col-md-7 col-md-offset-1">
					<?php echo $page->text()->kirbytext() ?>
				</div>
				<div class="list-with-images col-xs-12 col-md-9 col-md-offset-1">
						<ul class="accueils-module row">
							<?php foreach($page->children()->visible() as $child):?>
								<li class="col-sm-6 col-md-6">
									<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>">
										<h3><?php echo $child->personne()->html()?></h3>
										<h2><?php echo $child->title()->html()?></h2>
										<?php if($child->hasImages()):?>
											<div class="thumb-wrapper">
												<figure>
													<!-- <?//=$child->images()->last()->crop(500, 500);?> -->
													<img src="<?php echo $child->images()->last()->url()?>" alt="<?php echo $child->title()?>">
												</figure>
											</div>
										<?php endif ?>
									</a>
								</li>
							<?php endforeach?>
						</ul>
				</div>
			</div>
		</div>
	</main>

</div>

<?php snippet('footer') ?>

