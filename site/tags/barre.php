<?php

kirbytext::$tags['barre'] = array(
	'attr' => array(
    'barre',
  ),
  'html' => function($tag) {
    $barre = $tag->attr('barre');

    return '<span class="barre">'.$barre.'</span>';
  }
);
