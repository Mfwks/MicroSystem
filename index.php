<?php

# Index

$axis = __DIR__ . '/axis.php';

if (!is_file($axis)) {
	exit('Configure axis.php from axis.lock');
}

include __DIR__ . '/axis.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = (BASE=='/') ? $path : str_replace(BASE,'',$path);

$stream = STREAMS . $path . '.php';

if (!is_file($stream)) {
	echo $stream . ' <strong>not found</strong><br><br>';
	exit('Configure stream on /streams');
}

include $stream;
