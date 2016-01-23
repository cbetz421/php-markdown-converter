<?php

require __DIR__ . '/../vendor/autoload.php';

use \Michelf\MarkdownExtra;

// The following were used for testing nginx/php-fpm
// echo "<pre>";
// echo "This is xtian's markdown converter!" . PHP_EOL;
// print_r($_SERVER);
// echo $_SERVER['REQUEST_URI'] . PHP_EOL;

$my_text = file_get_contents(realpath($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'])) . PHP_EOL;

echo MarkdownExtra::defaultTransform($my_text);
