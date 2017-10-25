<?php

kirbytext::$tags['note'] = array(
	'attr' => array(
    'note',
    'link'
  ),
  'html' => function($tag) {
    $note = $tag->attr('note');
    $link = $tag->attr('link');

    if(empty($link)):
    	return '<span class="note">'.$note.'</span>';
    else:
    	return '<span class="note"><a href="'.$link.'" title="'.$note.'">'.$note.'</a></span>';
  	endif;
  }
);
