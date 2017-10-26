<nav class="submenu small-16 medium-11 xlarge-8">
	<ul>	
		<?php foreach($page->parent()->children()->visible() as $sub):?>
			<?php if($sub->template() != "menu" && $sub->template() != "agenda"):?>
				<li>
					<a <?php e($sub->isOpen(), ' class="active"') ?> href="<?php echo $sub->url()?>" title="<?php echo $sub->title()?>">
						<?php echo $sub->title()?>
					</a>
				</li>
			<?php endif ?>
		<?php endforeach?>
	</ul>
</nav>