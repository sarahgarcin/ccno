<?php snippet('header') ?>


<div>
	<?php snippet('menu') ?>

	<main class="row">
		<?php snippet('left-col') ?>
		<div class="ateliers_main col-xs-12 col-sm-11 col-sm-offset-1 col-md-9 col-md-offset-1">
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
							<li class="col-md-6">
									<a href="<?php echo $child->url()?>" title="<?php echo $child->title()?>"">
										<h3><?php echo $child->type()->html()?></h3>
										<h2><?php echo $child->title()->html()?></h2>
										<?php if($child->hasImages()):?>
											<div class="thumb-wrapper">
												<figure>
													<!-- <img src="<?php //echo $child->images()->first()->url()?>" alt="<?php //echo $child->title()?>"> -->
													<?=$child->images()->first()->crop(500, 300);?>
												</figure>
											</div>
										<?php else:?>
											<div class="carre-rose"></div>
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

