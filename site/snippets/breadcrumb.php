<div class="module--navigation-in-page">
	<nav class="breadcrumb small-18 xlarge-12" role="navigation">
	  <ul>
	    <?php foreach($page->parents()->flip() as $p): ?>
	    <li>
	      <a href="<?php echo $p->url() ?>">
	        <?php echo html($p->title()) ?>
	      </a>
	    </li>
	    <?php endforeach ?>
	  </ul>
	</nav>
	<?php snippet('submenu')?>
</div>
