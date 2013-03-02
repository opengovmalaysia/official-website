<?php
session_cache_limiter(false);
session_start();

$protocal = (isset($_SERVER['HTTPS'])) ? 'https' : 'http';
define('ROOT_URL', $protocal .'://'. $_SERVER['HTTP_HOST']);

$slimConfigs['view'] = new \Slim\Extras\Views\Twig();
$slimConfigs['templates.path'] = 'app/views';
$slimConfigs['rootUrl'] = ROOT_URL;
$slimConfigs['assetUrl'] = ROOT_URL .'/assets';
$slimConfigs['rootPath'] = dirname(__FILE__);

$app = new Slim\Slim($slimConfigs);
$app->view()->setData('rootUrl', ROOT_URL);
$app->view()->setData('assetUrl', ROOT_URL .'/assets');

foreach (glob('app/middlewares/*.php') as $file) {
    require $file;
}

foreach(glob('app/hooks/*.php') as $file) {
    require $file;
}

foreach(glob('app/controllers/*.php') as $file) {
    require $file;
}

$app->run();

