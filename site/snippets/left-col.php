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
		<div class="newsletter">
			<h5>Inscription newsletter</h5>
			<?php snippet('subscribe')?>
		</div>
	<!-- 	<a href="<?php //echo $pages->find('nouvelle-direction')->url()?>" title="<?php //echo $site->title()?>">
			<div class="carre-rose hide-for-small-only">		
			</div>
		</a> -->
		<div class="address hide-for-small-only">
			<ul>
				<?php foreach($site->socialnetworks()->toStructure() as $social): ?>
					<li>
						<a href="<?php echo $social->link() ?>" title="<?php echo $social->title() ?>" target="_blank">
							<?php echo $social->title()->html() ?>
						</a>
					</li>
				<?php endforeach ?>
			</ul>
			<br>
			<?php echo $site->address()->kirbytext() ?>
		</div>
	</div>
</div>