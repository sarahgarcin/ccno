
<?php snippet('header') ?>
<?php snippet('menu') ?>

<main id="pjax-container">

    <h1>
      <?= $page->title()->html() ?>
    </h1>

  <?php echo $page->text()->kirbytext() ?>

</main>


<?php snippet('footer') ?>
