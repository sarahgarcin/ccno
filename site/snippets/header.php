<!DOCTYPE html>
<html lang="<?php echo $site->language() ?>">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
  <meta name="author" content="<?php echo $site->author()->html() ?>">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>

  <?php echo css('bower_components/slick-carousel/slick/slick.css') ?>
  <?php if ( c::get('environment') == 'local' ) : ?>

  <?php echo css('assets/css/main.css') ?>

  <?php else: ?>

  <?php echo css('assets/production/main.min.css') ?>

  <?php endif ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn’t work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <meta property="og:site_name" content="<?php echo $site->ogsite_name()->html() ?>">
  <meta property="og:title" content="<?php echo $site->title()->html() ?>">
  <meta property="og:description" content="<?php echo $site->description()->html() ?>">
  <meta property="og:url" content="<?php echo $site->url() ?>">
  <meta property="og:image" content="<?php echo $site->ogimage()->html() ?>">
  <meta property="og:type" content="website">

  <meta name="twitter:title" content="<?php echo $site->title()->html() ?>">
  <meta name="twitter:description" content="<?php echo $site->description()->html() ?>">
  <meta name="twitter:url" content="<?php echo $site->url() ?>">
  <meta name="twitter:image" content="<?php echo $site->ogimage()->html() ?>">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:creator" content="<?php echo $site->author()->html() ?>">

  <meta name="apple-mobile-web-app-capable" content="yes">

  <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
  <meta name="apple-mobile-web-app-title" content="CCNO">
  <meta name="application-name" content="CCNO">
  <meta name="theme-color" content="#ffffff">

</head>
<body
   data-login="<?php e($site->user(),'true', 'false') ?>"
   data-template="<?php echo $page->template() ?>"
   data-intended-template="<?php echo $page->intendedTemplate() ?>"
    data-parent-template="<?php echo $page->parent()->template() ?>"
    <?php
      //if(!$page->isHomePage()):
        $section = getRubriqueFromUri($page->uri());
      //?>
        data-rubrique="<?= $section ?>"
        data-count = "<?= $pages->visible()->count()?>"
  >

