<?php if($site->socialnetworks()->isNotEmpty()): ?>
	<div class="socialnetwork">
		<ul>
		<?php foreach($site->socialnetworks()->toStructure() as $socialnetwork): ?>
			<li>
				<a href="<?php echo $socialnetwork->link() ?>" itemprop="url">
					<i class="fa <?php echo $socialnetwork->title()->html() ?>" aria-hidden="true"></i>
		    </a>
			</li>
		<?php endforeach ?>
		</ul>
	</div>
<?php endif ?>