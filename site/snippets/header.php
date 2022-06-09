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
  <?php echo css('bower_components/flexboxgrid/dist/flexboxgrid.css') ?>
  <?php echo css('assets/css/main.css') ?>


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
  <?php if($image = $site->index()->find('home')->homeImage()->toFile()):?>
    <meta property="og:image" content="<?php echo $image->url() ?>">
  <?php endif;?>
  <meta property="og:type" content="website">

  <meta name="twitter:title" content="<?php echo $site->title()->html() ?>">
  <meta name="twitter:description" content="<?php echo $site->description()->html() ?>">
  <meta name="twitter:url" content="<?php echo $site->url() ?>">
  <?php if($image = $site->index()->find('home')->homeImage()->toFile()):?>
    <meta name="twitter:image" content="<?php echo $image->url() ?>">
  <?php endif;?>
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:creator" content="<?php echo $site->author()->html() ?>">

  <meta name="apple-mobile-web-app-capable" content="yes">


  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#00aba9">
  <meta name="theme-color" content="#ffffff">

  <!-- Matomo -->
 <!--  <script type="text/javascript">
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//www.ccn-orleans.com/analytics/";
      _paq.push(['setTrackerUrl', u+'matomo.php']);
      _paq.push(['setSiteId', '1']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.type='text/javascript'; g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
  </script> -->
  <!-- End Matomo Code -->


</head>
<body
   data-login="<?php e($site->user(),'true', 'false') ?>"
   data-template="<?php echo $page->template() ?>"
   data-intended-template="<?php echo $page->intendedTemplate() ?>"
    data-parent-template="<?php echo $page->parent()->template() ?>"
    <?php $section = getRubriqueFromUri($page->uri());?>
    data-rubrique="<?= $section ?>"
    data-count = "<?= $pages->visible()->count()?>"
    

    <?php if($section == 'voulez-vous-danser'):?>
      style="background: <?php echo $site->index()->find('voulez-vous-danser')->color()?>"
    <?php endif;?>
    <?php if($page->template() == 'jgm'):?>
      style="background: <?php echo $page->backcolor()?>"
    <?php endif;?>
    <?php if($page->parent()->intendedTemplate() == 'jgm'):?>
      style="background: <?php echo $page->parent()->backcolor()?>"
    <?php endif;?>
    
  >

  <?php snippet('popupnewsletter') ?>


