<?php snippet('header') ?>
<?php snippet('en-cours') ?>
<?php snippet('menu') ?>


<div class ="row">

	<?php snippet('left-col') ?>

	<main class="small-18 medium-13 columns" data-color="<?php echo $page->color()?>">
		<h1><?= $page->title()->html() ?></h1>
		<?php if($page->icone()->isNotEmpty()):?>
			<div class="icone">
				<img src="<?php echo $page->icone()->toFile()->url() ?>" alt="">
			</div>
		<?php endif ?>
		<div class="text small-16 small-push-2 medium-16 medium-push-2 large-11 large-push-2">
			<?php echo $page->text()->kirbytext() ?>
			<?php 
					// if($page->picto()->isNotEmpty()):
					// 	$filenames = $page->picto()->split(',');
					// 	if(count($filenames) < 2) $filenames = array_pad($filenames, 2, '');
					// 	$files = call_user_func_array(array($page->files(), 'find'), $filenames);

						// Use the file collection
						//foreach($files as $file)
						foreach($site->images()->shuffle()->limit(10) as $file)
						{?>
							<div class="picto-wrapper">
								<img src="<?php echo $file->url() ?>" alt="">
							</div>
						<?php }
					//endif;
				?>
		</div>
	</main>
	
</div>


<?php snippet('footer') ?>

