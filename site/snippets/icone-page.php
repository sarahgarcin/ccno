<?php if($page->icone()->isNotEmpty()):?>
	<?php 
	$icone = $page->icone()->toFile();
	if($icone->isPortrait()):?>
		<div class="icone portrait">
			<img src="<?php echo $icone->url() ?>" alt="">
		</div>
		<?php else:?>
			<div class="icone landscape">
				<img src="<?php echo $icone->url() ?>" alt="">
			</div>
		<?php endif; ?>
<?php endif ?>