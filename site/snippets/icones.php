<?php foreach($site->images()->shuffle()->limit(10) as $file):?>
		<div class="picto-wrapper">
			<img src="<?php echo $file->url() ?>" alt="">
		</div>
<?php endforeach?>