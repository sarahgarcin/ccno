<nav class="breadcrumb" role="navigation">
  <ul>
    <?php foreach($page->parents() as $p): ?>
    <li>
      <a href="<?php echo $p->url() ?>">
        <?php echo html($p->title()) ?>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>