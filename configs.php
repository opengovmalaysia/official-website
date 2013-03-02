<?php
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set('Asia/Malaysia');

$slimConfigs = array(
    'log.enabled' => true,
    'log.level' => \Slim\Log::ERROR
);