<header class="module--menu menu-top">
	<p class="close-menu-button orleans show-for-small-only">X</p>
	<p class="tablet-close-menu-button orleans show-for-medium-only">X</p>
	<h1 class="siteName hide-for-small-only">
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
		    	<li class="<?= r($p->isOpen(), 'active') ?>">
		       	<a href="<?php echo $p->url()?>" title="<?php echo $p->title()?>">
		       		<?php echo $p->title()->html() ?>
		       	</a>
		       	<?php if($p->template() == 'agenda'):?>
		      		<ul class="module--menu--submenu">
		      			<li>
					      	<a class="agenda-past" href="<?php echo $p->url().'?events=past' ?>">
					        	Ce qui est passé
					      	</a>
				      	</li>
				      	<li>
					      	<a class="agenda-next" href="<?php echo $p->url().'?events=next' ?>">
					        	Ce qui est à venir
					      	</a>
				      	</li>
		      		</ul>
		      	<?php endif; ?>
		      </li>
		    <?php endif ?>
			<?php endforeach ?>
		</ul>
	</nav>
</header>