<header role="banner">
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
	<nav class="main-nav">
		
		
	</nav>
	<nav class="module--menu--mainNav medium-18">
		<?php $pagesLength = $pages->visible()->count();
		$halfPagesLength = intval($pagesLength/2.5);
		?>
		<div class="row">
			<div class="site-logo small-18 medium-5 large-4 columns hide-for-small-only">
				<h1>
					<a href="<?php echo $site->url()?>" title="<?php echo $site->title()?>">
						<?php echo $site->logo()->html() ?>
					</a>
				</h1>
			</div>
			<ul class="menu-top-list menu-col-left small-18 medium-4 large-4 columns">
		    <?php foreach($pages->visible()->slice(0,$halfPagesLength) as $p): ?>
			    	<li class="<?= r($p->isOpen(), 'active') ?>">
			    		<?php if($p->hasChildren()):?>
			        	<?php echo $p->title()->html() ?>
			        <?php else: ?>
			        	<a href="<?php echo $p->url()?>" title="<?php echo $p->title()?>">
			        		<?php echo $p->title()->html() ?>
			        	</a>
			        <?php endif;?>
			        <?php if($p->hasChildren()):?>
				        <ul class="module--menu--submenu">
									<?php foreach($p->children()->visible() as $child): ?>
								  	<li>
								    	<a class="<?= r($child->isOpen(), 'active') ?>" href="<?php echo $child->url() ?>">
								      	<?php echo $child->title()->html() ?>
								    	</a>
								  	</li>
								  <?php endforeach ?>
								</ul>
							<?php endif ?>
			      </li>
				<?php endforeach ?>
			</ul>
			<ul class="menu-top-list menu-col-middle small-18 medium-4 large-5 columns">
		    <?php foreach($pages->visible()->slice($halfPagesLength,$halfPagesLength) as $p): ?>
			    	<li class="<?= r($p->isOpen(), 'active') ?>">
			        <?php if($p->hasVisibleChildren()):?>
			        	<?php echo $p->title()->html() ?>
			        <?php else: ?>
			        	<a href="<?php echo $p->url()?>" title="<?php echo $p->title()?>">
			        		<?php echo $p->title()->html() ?>
			        	</a>
			        <?php endif;?>
			        <ul class="module--menu--submenu">
								<?php foreach($p->children()->visible() as $child): ?>
							  	<li>
							    	<a class="<?= r($child->isOpen(), 'active') ?>" href="<?php echo $child->url() ?>">
							      	<?php echo $child->title()->html() ?>
							    	</a>
							  	</li>
							  <?php endforeach ?>
							</ul>
			      </li>
				<?php endforeach ?>
			</ul>
			<ul class="menu-top-list menu-col-right small-18 medium-5 large-5 columns">
		    <?php foreach($pages->visible()->slice($halfPagesLength+3,$halfPagesLength) as $p): ?>
			    	<li class="<?php if($p->uri()=='jeunes-gens-modernes'):echo 'jgm'; if(flottant($site->flottant())=='jgm'): echo ' flottant';endif; endif;?> <?php if($p->uri()=='ouverture-de-saison'):echo 'bulle'; if(flottant($site->flottant())=='bulle'): echo ' flottant';endif; endif;?> <?= r($p->isOpen(), 'active') ?>">
			        <?php if($p->hasVisibleChildren() && $p->intendedTemplate() != 'bulle'):?>
			        	<?php echo $p->title()->html() ?>
			        <?php else: ?>
			        	<a href="<?php echo $p->url()?>" title="<?php echo $p->title()?>">
			        		<?php echo $p->title()->html() ?>
			        	</a>
			        <?php endif;?>
			        <?php if($p->hasChildren() && $p->intendedTemplate() != 'bulle'):?>
				        <ul class="module--menu--submenu">
									<?php foreach($p->children()->visible() as $child): ?>
								  	<li>
								    	<a class="<?= r($child->isOpen(), 'active') ?>" href="<?php echo $child->url() ?>">
								      	<?php echo $child->title()->html() ?>
								    	</a>
								  	</li>
								  <?php endforeach ?>
								</ul>
							<?php endif;?>
			      </li>
				<?php endforeach ?>
				<li>
					Archives
					<ul class="module--menu--submenu">
				  	<li>
				    	<a href="http://www.ccn-orleans.com/archives-2017-2018">
				      	2017-2018
				    	</a>
				  	</li>
				  	<li>
				  		<a href="http://www.ccn-orleans.com/archives-2018-2019" title="">2018-2019</a>
				  	</li>
					</ul>
				</li>
			</ul>

		</div>
		<div class="address show-for-small-only">
				<?php snippet('language') ?>
				<?php snippet('social');?>
				<div class="bouton-billeterie">
					<a href="https://ccn-orleans-reservations.mapado.com/" title="Billetterie" target="_blank">Réservations</a>
				</div>
				<div class="newsletter small-18">
					<ul>
						<li class="open-newsletter-form">
							Recevoir la newsletter
							<!-- <a href="https://my.sendinblue.com/users/subscribe/js_id/2x7ls/id/5" title="" target="_blank">Recevoir la newsletter</a> -->
						</li>
					</ul>
				</div>							

				<?php echo $site->address()->kirbytext() ?>
			
			</div>
	</nav>
</header>

<?php function flottant($field){
	foreach ($field->split() as $category):
  	return $category;
  endforeach;
}


