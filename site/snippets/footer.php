	<div class="address show-for-small-only">
		<?php echo $site->address()->kirbytext() ?>
	</div>

  <!-- scripts -->
  <?php if ( c::get('environment') == 'local' ) : ?>

  <?= js('assets/js/plugins.js') ?>
  <?= js('bower_components/jquery-pjax/jquery.pjax.js')?>
  <?= js('assets/js/main.js') ?>

  <?php else: ?>

  <?= js('assets/production/all.min.js') ?>

  <?php endif ?>

</body>
</html>
