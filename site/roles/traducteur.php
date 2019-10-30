<?php

return [
  'name'        => 'Traducteur',
  'default'     => false,
	  'permissions' => [
	    '*'                 => true,
	    'panel.site.update' => true,
	    'panel.user.*'      => false,
	    'panel.page.delete' => false,
	    'panel.user.read'   => true,
	    'panel.file.*'      => true,
	    'panel.page.create' => false,
	    'panel.page.visibility' => true, 
	    'panel.page.update' => true, 
	    'panel.page.read' => true,
	    'panel.user.update' => function() {
	        if($this->user()->is($this->target()->user())) {
	            return true;
	        } else {
	            return false;
	        }
	    }
	]
];