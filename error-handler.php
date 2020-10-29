<?php

// Централизованная обработка исключений и ошибок

ini_set("log_errors", 1);
ini_set("error_log", __DIR__ . "/php-errors.log");

// Уровень ошибок display_errors = 1 и  display_startup_errors=1
// используется во время разработки,
// на рабочем сервере установить на 0
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

// Обрабатываем все исключения, возникающие во время работы приложения
function customExceptionHandler($e)
{
    error_log($e);
    http_response_code(500);
    // Если в режиме отладки, то показываем исключения
    if (ini_get('display_errors')) {
        echo $e;
    } else {
        echo "<h1>500 Ошибка сервера.</h1>
              Произошла ошибка на стороне сервера.<br>
              Пожалуйста, попробуйте еще раз позже.";
    }
}

set_exception_handler('customExceptionHandler');

// Также при ошибках (Error) перенаправляем на общий обработчик
// исключений customExceptionHandler

set_error_handler(function ($level, $message, $file = '', $line = 0)
{
    throw new ErrorException($message, 0, $level, $file, $line);
});

