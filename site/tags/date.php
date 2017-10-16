<?php

kirbytext::$tags['date'] = array(
	'attr' => array(
    'heure',
    'titre'
  ),
  'html' => function($tag) {
    $date = $tag->attr('date');
    $heure = $tag->attr('heure');
    $titre = $tag->attr('titre');

    return '<span class="note date">'.$date.'<br> '.$heure.'<br><span class="note-title">'.$titre.'</span></span>';

  }
);
