<?php

namespace App;

require 'vendor/autoload.php';

use App\Controller\UrlController;
use App\Controller\ContentController;

$uri = new UrlController();
/* Of course,$proxy_url, $victim_url should also be class variables */

$proxy_url = 'http://localhost';
$victim_url = 'https://habr.com';
$target_url = $uri->modify_url($_SERVER['REQUEST_URI'], $proxy_url, $victim_url);

$content = file_get_contents($target_url);
$dom = new \DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($content);
libxml_clear_errors();
$modifier = new ContentController();
$modifier->modify_content($dom->getElementsByTagName('p'));
$modifier->modify_content($dom->getElementsByTagName('span'));

echo $dom->saveHTML();
