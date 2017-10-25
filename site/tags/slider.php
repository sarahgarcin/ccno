<?php

kirbytext::$tags['slider'] = array(
  'html' => function($tag) {

    // $html  = '<div class="slider js_slider">';
    // $html .= '<div class="frame js_frame">';
    $html = '<ul class="slider js_slides">';

    foreach($tag->page()->images()->filterBy('filename', '*=', $tag->attr('slider')) as $slide) {
      $html .= '<li class="slider-image">';
      // $html .= '<img src="' . $slide->url() . '">';
      // $html .= thumb($slide, array('width' => 800));
      $html .= $slide->crop(1200, 800);
      $html .= '</li>';
    }

    $html .= '</ul>';
    // $html .= ' <span class="js_prev prev">
    //                 <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path class="apath" d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg>
    //             </span>
    //             <span class="js_next next">
    //                 <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path class="apath" d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg>
    //             </span>';
    // $html .= '</div>';

    return $html;

  }
);
