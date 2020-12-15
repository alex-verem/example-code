<?php

// Используется для загрузки конфигурационного файла, централизованного
// обработчика исключений, автозагрузчика и т.п.

$config = require_once __DIR__ . '/config.php';
require_once __DIR__ . '/error-handler.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/autoload.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader);
