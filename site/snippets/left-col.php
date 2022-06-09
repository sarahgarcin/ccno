<nav class="second-nav col-md-2 hide-for-small-only">
	<div class="second-nav_billetterie btn btn-rose">
		<a href="https://ccn-orleans-reservations.mapado.com/" title="Billetterie" target="_blank"><?= l::get('reservations') ?></a>
	</div>
	<div class="second-nav_newsletter">
		<ul>
			<li class="btn btn-blanc"><a href="https://ccn-orleans-reservations.mapado.com/" title="Shop" target="_blank">Shop</a></li>
			<li class="btn btn-blanc"><a href="/fonds-doc/" title="Fonds doc" target="_blank">Fonds doc</a></li>
			<li class="open-newsletter-form btn btn-blanc"><a class="link-not-active">Newsletter</a></li>
			
		</ul>
	</div>
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
	<div class="second-nav_address">
		<?php echo $site->address()->kirbytext() ?>
	</div>
	<div class="mentions-legales">
		<?php $mentions = $site->index()->find('mentions-legales')?>
		<a href="<?= $mentions->url()?>" title="<?= $mentions->title()?>">
			<?php echo $mentions->title()?>
		</a>
		
	</div>
</nav>
