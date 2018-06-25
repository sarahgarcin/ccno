<header class="module--menu menu-top">
	<p class="close-menu-button orleans show-for-small-only">X</p>
	<p class="tablet-close-menu-button orleans show-for-medium-only">X</p>
	<nav class="module--menu--mainNav medium-13" <?php if(getRubriqueFromUri($page->uri()) == 'voulez-vous-danser'):?> style="background: <?php echo $site->index()->find('voulez-vous-danser')->color()?>" <?php endif;?>>
		<?php $pagesLength = $pages->visible()->count();
		$halfPagesLength = intval($pagesLength/2);
		?>
		<div class="row">
			<ul class="menu-top-list menu-col-left small-9 columns">
		    <?php foreach($pages->visible()->slice(0,$halfPagesLength) as $p): ?>
			    	<li class="<?= r($p->isOpen(), 'active') ?>">
			    		<?php if($p->hasChildren()):?>
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
			<ul class="menu-top-list menu-col-right small-9 columns">
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
		</div>
	</nav>
</header>