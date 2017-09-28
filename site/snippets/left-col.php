<div class="left-col small-16 medium-5 columns">
	<p class="menu-btn">Menu</p>
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
	<!-- 	<a href="<?php //echo $pages->find('nouvelle-direction')->url()?>" title="<?php //echo $site->title()?>">
			<div class="carre-rose hide-for-small-only">		
			</div>
		</a> -->
		<div class="address hide-for-small-only">
			<?php echo $site->address()->kirbytext() ?>
		</div>
	</div>
</div>