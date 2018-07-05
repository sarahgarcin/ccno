<div class="left-col small-18 medium-4 columns">
	<!-- <div class="menu-btn hide-for-small-only"><span>Menu</span></div> -->
	<div class="header-mobile small-18 show-for-small-only">
		<div class="menu-mobile-btn"><span>Menu</span></div>
		<h1 class="mobile-title">
			<a href="<?php echo $site->url()?>" title="<?php echo $site->title()?>">
				<?php echo $site->shortcut()->html() ?>
			</a>
		</h1>
	</div>

	<div class="hide-on-scoll">
		<h1>
			<a href="<?php echo $site->url()?>" title="<?php echo $site->title()?>">
				<?php echo $site->logo()->html() ?>
			</a>
		</h1>
		<?php if($site->pdf()->isNotEmpty()):?>
			<div class="pdf">
				<ul>
					<?php foreach($site->pdf()->toStructure() as $pdf): ?>
						<li>
							<a href="<?php echo $pdf->link()->toFile()->url() ?>" title="<?php echo $pdf->title() ?>" target="_blank">
								<?php echo $pdf->title()->html() ?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
		<?php endif ?>

		<div class="address hide-for-small-only">
			<?php echo $site->address()->kirbytext() ?>
		</div>
	</div>
</div>