<div class="left-col small-18 medium-3 large-3 columns hide-for-small-only">
		<div class="address hide-for-small-only">
			<?php snippet('language') ?>
			<?php snippet('social');?>
			<a href="https://ccn-orleans-reservations.mapado.com/" title="Billetterie" target="_blank">
				<div class="bouton-billeterie">
					Réservations
				</div>
			</a>
			<div class="newsletter small-18">
				<ul class="menu-top-list archives">
					<li class="open-newsletter-form">
						Recevoir la newsletter
					</li>
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

			<?php echo $site->address()->kirbytext() ?>
			
		</div>
</div>