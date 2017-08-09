<?php foreach($site->images()->shuffle()->limit(9) as $icone): ?>
	<div class="icone-wrapper">
		<img src="<?php echo $icone->url()?>" alt="<?php echo $icone->filename()?>">
	</div>
<?php endforeach;?>