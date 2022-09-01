<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'intervyu',
    'basePath' => dirname(__DIR__),
    'params' => $params,
];

return $config;
