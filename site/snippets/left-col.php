<div class="left-col small-16 medium-5 columns">
	<p class="menu-btn">Menu</p>
	<h1>
		<a href="<?php echo $site->url()?>" title="<?php echo $site->title()?>">
			<?php echo $site->logo()->html() ?>
		</a>
	</h1>
<!-- 	<a href="<?php //echo $pages->find('nouvelle-direction')->url()?>" title="<?php //echo $site->title()?>">
		<div class="carre-rose hide-for-small-only">		
		</div>
	</a> -->
	<div class="address hide-for-small-only">
		<?php echo $site->address()->kirbytext() ?>
	</div>
</div>