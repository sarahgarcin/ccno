<?php

kirbytext::$tags['note'] = array(
  'html' => function($tag) {
    $note = $tag->attr('note');

    return '<span class="note">'.$note.'</span>';

  }
);
