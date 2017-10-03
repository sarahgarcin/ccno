<section class="event">
  <h2><?= $data->dateEv()->html() ?></h2>
  <h3><?= $data->hour()->html() ?></h3>
  <h3><?= $data->place()->html() ?></h3>
  <h4><?= $data->title()->html() ?></h4>
  <?= $data->text()->kt() ?>
</section>