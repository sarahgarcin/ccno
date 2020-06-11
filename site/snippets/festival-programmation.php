<div class="row col-wrapper col-md-10">
	<?php if($page->colonne1()->isNotEmpty()):?>
		<div class='col-1 col-xs-12 col-md-4'>
		<h4><?php echo $page->colonne1titre()->html()?></h4>
		<?php foreach($page->colonne1()->split(',') as $colonne1):?>
			<?php $colonne1 =  $page->find($colonne1);?>
			<?php if($colonne1->isVisible()):?>
			<a href="<?php echo $colonne1->url()?>" title="">
			<?php endif ?>
				<?php foreach($colonne1->dates()->toStructure() as $date):?>
					<p class="element">
						<!-- heure -->
						<span>
							<?php if($date->hours()->isNotEmpty()):?>
									<?php echo $date->hours()->html()?>
							<?php endif ?>
						</span>
						<!-- lieu -->
						<?php echo $date->place()->html()?>
						<br>
						<?php if($colonne1->isVisible()):?>
							<!-- type -->
							<?php echo $date->type()->html();?>
							<br>
							<!-- titre -->
							<?php echo $date->title()->html(); ?>
						<?php endif ?>
					</p>
				<?php endforeach;?>
			<?php if($colonne1->isVisible()):?>
			</a>
			<?php endif ?>
		<?php endforeach ?>
		</div>
	<?php endif; ?>
	<?php if($page->colonne2()->isNotEmpty()):?>
		<div class='col-2 col-xs-12 col-md-4'>
		<h4><?php echo $page->colonne2titre()->html()?></h4>
		<?php foreach($page->colonne2()->split(',') as $colonne2):?>
			<?php $colonne2 =  $page->find($colonne2);?>
			<?php if($colonne2->isVisible()):?>
				<a href="<?php echo $colonne2->url()?>" title="">
			<?php endif;?>
				<?php foreach($colonne2->dates()->toStructure() as $date):?>
					<p class="element">
						<!-- heure -->
						<span>
							<?php if($date->hours()->isNotEmpty()):?>
									<?php echo $date->hours()->html()?>
							<?php endif ?>
						</span>
						<!-- lieu -->
						<?php echo $date->place()->html()?>
						<br>
						<?php if($colonne2->isVisible()):?>
							<!-- type -->
							<?php echo $date->type()->html();?>
							<br>
							<!-- titre -->
							<?php echo $date->title()->html(); ?>
						<?php endif ?>
					</p>
				<?php endforeach;?>
			<?php if($colonne2->isVisible()):?>
			</a>
			<?php endif ?>
		<?php endforeach ?>
		</div>
	<?php endif; ?>
	<?php if($page->colonne3()->isNotEmpty()):?>
		<div class='col-3 col-xs-12 col-md-4'>
			<h4><?php echo $page->colonne3titre()->html()?></h4>
			<?php foreach($page->colonne3()->split(',') as $colonne3):?>
				<?php $colonne3 =  $page->find($colonne3);?>
				<?php if($colonne3->isVisible()):?>
					<a href="<?php echo $colonne3->url()?>" title="">
				<?php endif;?>
					<?php foreach($colonne3->dates()->toStructure() as $date):?>
						<p class="element">
							<!-- heure -->
							<span>
								<?php if($date->hours()->isNotEmpty()):?>
										<?php echo $date->hours()->html()?>
								<?php endif ?>
							</span>
							<!-- lieu -->
							<?php echo $date->place()->html()?>
							<br>
							<?php if($colonne3->isVisible()):?>
								<!-- type -->
								<?php echo $date->type()->html();?>
								<br>
								<!-- titre -->
								<?php echo $date->title()->html(); ?>
							<?php endif ?>
						</p>
					<?php endforeach;?>
				<?php if($colonne3->isVisible()):?>
				</a>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	<?php endif; ?>
</div>