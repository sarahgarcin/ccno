<?php

$header = [
	'timestamp' => date('c'),
	'ip' => Visitor::ip(),
	'userAgent' => Visitor::userAgent(),
];

echo json_encode($data);
