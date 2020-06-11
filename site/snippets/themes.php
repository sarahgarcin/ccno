<?php if($site->index()->find('themes')->hasVisibleChildren()):?>
	<div class="themes list-with-images col-md-10">
		<ul class="row">
			<?php foreach($site->index()->find('themes')->children()->visible() as $theme):?>
				<li class="col-xs-6 col-sm-6 col-md-4">
					<a href="<?php echo $theme->url()?>" title="<?php echo $theme->title()?>">
						<div class="title-wrapper">
							<?php echo $theme->title()->html()?>
						</div>
						<?php if($theme->hasImages()):?>
							<div class="thumb-wrapper">
								<figure>
									<?= $theme->images()->first()->crop(500, 500);?>
								</figure>
							</div>
						<?php endif ?>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
		<hr>
	</div>
<?php endif;?>

