<header role="banner" class="row">
	<div class="mobile-menu show-for-small-only">
		<div class="mobile-menu_logo">
			<h1>
				<a href="<?php echo $site->url()?>" title="<?php echo $site->title()?>">
					<?php echo $site->shortcut()->html() ?>
				</a>
			</h1>
		</div>
		<div class="mobile-menu_btn"><span>Menu</span></div>
	</div>
	<div class="desktop-menu hide-for-small-only col-md-3">
		<div class="desktop-menu_logo">
			<h1>
				<a href="<?php echo $site->url()?>" title="<?php echo $site->title()?>">
					<?php echo $site->logo()->html() ?>
				</a>
			</h1>
		</div>
	</div>
	<div class="nav col-md-9 row">
		<nav class="main-nav col-md-11">
			<ul class="main-nav_first-level">
				<?php foreach($pages->visible() as $p): ?>
					<li class="<?php if($p->uri()=='jeunes-gens-modernes'):echo 'jgm'; if(flottant($site->flottant())=='jgm'): echo ' flottant';endif; endif;?> <?php if($p->uri()=='ouverture-de-saison'):echo 'bulle'; if(flottant($site->flottant())=='bulle'): echo ' flottant';endif; endif;?> <?= r($p->isOpen(), 'active') ?>">
		    		<?php if($p->hasChildren() && $p->intendedTemplate() != 'bulle'):?>
		        	<?php echo $p->title()->html() ?>
		        	<ul class="main-nav_submenu">
								<?php foreach($p->children()->visible() as $child): ?>
							  	<li>
							    	<a class="<?= r($child->isOpen(), 'active') ?>" href="<?php echo $child->url() ?>">
							      	<?php echo $child->title()->html() ?>
							    	</a>
							  	</li>
							  <?php endforeach ?>
							</ul>
		        <?php else: ?>
		        	<a href="<?php echo $p->url()?>" title="<?php echo $p->title()?>">
		        		<?php echo $p->title()->html() ?>
		        	</a>
		        <?php endif;?>
		      </li>
				<?php endforeach; ?>
				<li>
					Archives
					<ul class="main-nav_submenu">
				  	<li>
				    	<a href="http://www.ccn-orleans.com/archives-2017-2018">2017-2018</a>
				  	</li>
				  	<li>
				  		<a href="http://www.ccn-orleans.com/archives-2018-2019" title="">2018-2019</a>
				  	</li>
					</ul>
				</li>
			</ul>
		</nav>
		<nav class="desktop-second-nav hide-for-small-only col-md-1">
			<?php snippet('language') ?> 
			<?php snippet('social');?>
		</nav>
		<nav class="second-nav show-for-small-only">
			<?php snippet('language') ?>
			<?php snippet('social');?>
			<div class="second-nav_billetterie btn btn-rose">
				<a href="https://ccn-orleans-reservations.mapado.com/" title="Billetterie" target="_blank">Réservations</a>
			</div>
			<div class="second-nav_newsletter">
				<ul>
					<li class="open-newsletter-form btn btn-blanc">Recevoir la newsletter</li>
				</ul>
			</div>							
			<div class="second-nav_address">
				<?php echo $site->address()->kirbytext() ?>
			</div>
		</nav>
	</div>
</header>

<?php function flottant($field){
	foreach ($field->split() as $category):
  	return $category;
  endforeach;
}


