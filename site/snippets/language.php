<nav class="languages">
  <ul>
    <?php foreach($site->languages() as $language): ?>
    <li<?php e($site->language() == $language, ' class="active"') ?>>
      <a href="<?= $page->url($language->code()) ?>" hreflang="<?php echo $language->code() ?>">
        <?= html($language->code()) ?>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>