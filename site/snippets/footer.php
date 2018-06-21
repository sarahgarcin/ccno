	<div class="address show-for-small-only">
    <ul>
      <?php foreach($site->socialnetworks()->toStructure() as $social): ?>
        <li>
          <a href="<?php echo $social->link() ?>" title="<?php echo $social->title() ?>" target="_blank">
            <?php echo $social->title()->html() ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>

		<?php echo $site->address()->kirbytext() ?>
	</div>

  <?= js('assets/js/plugins.js') ?>
  <?= js('bower_components/jquery-pjax/jquery.pjax.js')?>
  <?= js('assets/js/main.js') ?>

  <?php snippet('piwik') ?>

</body>
</html>
