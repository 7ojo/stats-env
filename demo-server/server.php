<?php

require __DIR__ . '/vendor/autoload.php';

use Prometheus\CollectorRegistry;
use Prometheus\RenderTextFormat;

$adapter = new Prometheus\Storage\APC();
$registry = new CollectorRegistry($adapter);

$renderer = new RenderTextFormat();
$counter = $registry->registerCounter('demoserver', 'requests_total', 'requests total', ['resource']);

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if ($path == '/metrics') {
	$result = $renderer->render($registry->getMetricFamilySamples());
	header('Content-Type: ' . RenderTextFormat::MIME_TYPE);
	echo $result;

} else if ($path == '/first-counter') {
	$counter->incBy(1, ['first-counter']);

} else if ($path == '/second-counter') {
	$counter->incBy(1, ['second-counter']);

} else {
	echo "Send GET request to /first-counter or /second-counter to get some metrics!";
}

