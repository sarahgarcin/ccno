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
	<div class="desktop-menu hide-for-small-only col-md-2">
		<div class="desktop-menu_logo">
			<h1>
				<a href="<?php echo $site->url()?>" title="<?php echo $site->title()?>">
					<?php echo $site->logo()->html() ?>
				</a>
			</h1>
		</div>
	</div>
	<div class="nav col-md-10 row">
		<nav class="main-nav col-md-11">
			<ul class="main-nav_first-level">
				<?php foreach($pages->visible() as $p): ?>
					<li class="<?php if($p->uri()=='jeunes-gens-modernes'):echo 'jgm'; if(flottant($site->flottant())=='jgm'): echo ' flottant';endif; endif;?> <?php if($p->uri()=='ouverture-de-saison'):echo 'bulle'; if(flottant($site->flottant())=='bulle'): echo ' flottant';endif; endif;?> <?= r($p->isOpen(), 'active') ?>">
		    		<?php if($p->hasChildren() && $p->intendedTemplate() != 'bulle' && $p->intendedTemplate() != 'jgm'):?>
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
				  	<li>
				  		<a href="http://www.ccn-orleans.com/archives-2019-2020" title="">2019-2020</a>
				  	</li>
				  	<li>
				  		<a href="http://www.ccn-orleans.com/archives-2020-2021" title="">2020-2021</a>
				  	</li>
					</ul>
				</li>
			</ul>
		</nav>
		<nav class="desktop-second-nav hide-for-small-only col-md-1">
			<?php snippet('language') ?> 
			<?php snippet('social');?>
			<div class="fonds-doc">
				<a href="https://ccn-orleans.com/fonds-doc/" itemprop="url" target="_blank" title="Le fonds documentaire du CCNO">
					Fonds doc
		    </a>
			</div>
		</nav>
		<nav class="second-nav show-for-small-only">
			<?php snippet('language') ?>
			<?php snippet('social');?>
			<div class="fonds-doc">
				<a href="" itemprop="url">
					Fonds doc
		    </a>
			</div>
			<div class="second-nav_billetterie btn btn-rose">
				<a href="https://ccn-orleans-reservations.mapado.com/" title="Billetterie" target="_blank"><?= l::get('reservations') ?></a>
			</div>
			<div class="second-nav_newsletter">
				<ul>
					<li class="open-newsletter-form btn btn-blanc"><a class="link-not-active">Newsletter</a></li>
				</ul>
			</div>							
			<div class="second-nav_address">
				<?php echo $site->address()->kirbytext() ?>
			</div>
			<div class="mentions-legales">
				<?php $mentions = $site->index()->find('mentions-legales')?>
				<a href="<?= $mentions->url()?>" title="<?= $mentions->title()?>">
					<?php echo $mentions->title()?>
				</a>
			</div>
		</nav>
	</div>
</header>

<?php function flottant($field){
	foreach ($field->split() as $category):
  	return $category;
  endforeach;
}


