<?php

// Автозагрузка классов

spl_autoload_register(function($class) {
    $classPath = __DIR__  . DIRECTORY_SEPARATOR . $class .  '.php';
    require_once $classPath;
});
