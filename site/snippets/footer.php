	<div class="address mobile-address">
		<?php echo $site->address()->kirbytext() ?>
	</div>

  <?= js('assets/js/plugins.js') ?>
  <?= js('bower_components/jquery-pjax/jquery.pjax.js')?>
  <?= js('assets/js/main.js') ?>

  <?php snippet('piwik') ?>

</body>
</html>
