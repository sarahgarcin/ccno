<header class="module--menu menu-bottom">
	<nav class="module--menu--mainNav nav">
		<ul id="menu-bottom-list">
			<?php $position = $page->parent()->num();
						$count = $pages->visible()->count();
						$last = $count - $position;
			?>
			<?php if(!$page->isHomePage()):?>
		    <?php foreach($pages->visible()->flip()->limit($last)->flip() as $p): ?>
		    	<li data-rubrique="<?= $p->slug() ?>" class="<?= r($p->isOpen(), 'is--active') ?>" data-position="<?php echo $p->num() ?>">
		        	<?php echo $p->title()->html() ?>
		      	<ul class="module--menu--submenu">
		      		<?php foreach($p->children()->visible() as $child): ?>
				      	<li>
					      	<a data-rubrique="<?= $child->slug() ?>" class="<?= r($child->isOpen(), ' is--active') ?>" href="<?php echo $child->url() ?>">
					        	<?php echo $child->title()->html() ?>
					      	</a>
				      	</li>
				      <?php endforeach ?>
		      	</ul>
		      </li>
				<?php endforeach ?>
			<?php endif; ?>
		</ul>
	</nav>
</header>