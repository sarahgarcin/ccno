<?php

  function getRubriqueFromUri($uri){
    	$arr = str::split($uri,"/");
    	$first = $arr[0];
    	return $first;
  }
