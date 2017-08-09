<header class="module--menu">
	<nav class="module--menu--mainNav">
		<ul>
	    <?php foreach($pages->visible() as $p): ?>
	    	<li data-rubrique="<?= $p->slug() ?>" class="<?= r($p->isOpen(), 'is--active') ?>">
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
		</ul>
	</nav>
</header>