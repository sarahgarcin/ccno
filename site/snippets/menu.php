<header class="module--menu menu-top">
	<h1 class="siteName">
		<a href="<?php echo $site->url()?>" title="<?php echo $site->name()?>">
			<?php echo $site->shortcut()->html()?>
		</a>
	</h1>
	<nav class="module--menu--mainNav">
		<ul id="menu-top-list">
	    <?php foreach($pages->visible() as $p): ?>
	    	<?php if($p->hasVisibleChildren()):?>
		    	<li class="<?= r($p->isOpen(), 'active') ?>">
		    			<a href="<?php echo $p->url()?>" title="<?php echo $p->title()?>">
		        		<?php echo $p->title()->html() ?>
		        	</a>
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
		    <?php else: ?>
		    	<li class="<?= r($p->isOpen(), 'active') ?>" data-position="<?php echo $p->num() ?>">
		       	<a href="<?php echo $p->url()?>" title="<?php echo $p->title()?>">
		       		<?php echo $p->title()->html() ?>
		       	</a>
		      </li>
		    <?php endif ?>
			<?php endforeach ?>
		</ul>
	</nav>
</header>