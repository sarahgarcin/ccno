<?php snippet('header') ?>
<?php snippet('en-cours') ?>
<?php snippet('menu') ?>
<div class ="row">

	<?php snippet('left-col') ?>
	<?php $actu = $pages->find('actualites')->children()->first() ?>
	<main class="small-18 medium-13 columns" data-color="<?php echo $actu->color()?>">
		<div class="image-icono">
			<?php foreach($site->images()->shuffle()->limit(20) as $icone): ?>
				<div class="icone-wrapper">
					<img src="<?php echo $icone->url()?>" alt="Picto">
				</div>
			<?php endforeach ?>
		</div>
		<div class="actu">
				<a href="<?php echo $actu->url()?>" title="<?php echo $actu->title() ?>">
					<div class="actu-title" >
						<p><?php echo $actu->title()->html() ?></p>
					</div>
					<div class="actu-date">
						<p><?php echo $actu->infos()->html() ?></p>
					</div>
				</a>
				<p class="link"><a href="<?php echo $actu->url()?>" title="<?php echo $actu->title()?>">+ d’infos</a></p>
		</div>

	</main>

</div>


<?php snippet('footer') ?>

