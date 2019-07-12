<header class="module--menu menu-top">
<!-- 	<p class="close-menu-button orleans show-for-small-only">X</p>
	<p class="tablet-close-menu-button orleans show-for-medium-only">X</p> -->
	<div class="header-mobile small-18 show-for-small-only">
		<h1>
			<a href="<?php echo $site->url()?>" title="<?php echo $site->title()?>">
				<?php echo $site->shortcut()->html() ?>
			</a>
		</h1>
		<div class="menu-mobile-btn"><span>Menu</span></div>
	</div>
	<nav class="module--menu--mainNav medium-18">
		<?php $pagesLength = $pages->visible()->count();
		$halfPagesLength = intval($pagesLength/2);
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
			<ul class="menu-top-list menu-col-right small-18 medium-5 large-5 columns">
		    <?php foreach($pages->visible()->slice($halfPagesLength,$pagesLength) as $p): ?>
			    	<li class="<?= r($p->isOpen(), 'active') ?>">
			        <?php echo $p->title()->html() ?>
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
			<div class="newsletter small-18 medium-4 large-push-1 large-4 columns end">
<!-- 				<h5>Inscription newsletter</h5> -->
			<ul class="menu-top-list archives">
				<li>
					Archives
					<ul class="module--menu--submenu">
				  	<li>
				    	<a href="http://www.ccn-orleans.com/archives-2017-2018">
				      	2017-2018
				    	</a>
				  	</li>
					</ul>
				</li>
				<li class="open-newsletter-form">
					Recevoir la newsletter
					<!-- <a href="https://my.sendinblue.com/users/subscribe/js_id/2x7ls/id/5" title="" target="_blank">Recevoir la newsletter</a> -->
				</li>
			</ul>
			<?php //snippet('subscribe')?>
			<?php snippet('social');?>
		</div>
		</div>
	</nav>
</header>