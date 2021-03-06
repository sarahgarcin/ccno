<nav class="second-nav col-md-2 hide-for-small-only">
	<div class="second-nav_billetterie btn btn-rose">
		<a href="https://ccn-orleans-reservations.mapado.com/" title="Billetterie" target="_blank">Réservations</a>
	</div>
	<div class="second-nav_newsletter">
		<ul>
			<li class="open-newsletter-form btn btn-blanc">Recevoir la newsletter</li>
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
</nav>
