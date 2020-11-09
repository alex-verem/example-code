<?php

// Загружаем в boostrap.php конфигурацию (config.php),
// обработчика исключений (error-handler.php)
// автозагрузчик (autoload.php) и другие зависимости
require_once(__DIR__ . '/bootstrap.php');

use Turcalendar\Place\Place;
use Turcalendar\Place\PlaceFactory;
use Turcalendar\Place\PlaceFilter;

$dbConfig = $config['database'];
$dsn = "{$dbConfig['driver']}:host={$dbConfig['host']};port={$dbConfig['port']};" .
    "dbname={$dbConfig['name']};charset={$dbConfig['charset']}";

$db = new \PDO($dsn, $dbConfig['username'], $dbConfig['password'], $dbConfig['options']);

$placeFactory = new PlaceFactory($db);
$placeFilter = new PlaceFilter();

// Показываем только страны и города, которые включают 'бург', ограничивая вывод десятью
$placeFilter->setQuery("бург");
$placeFilter->setLimit(10);
$places = $placeFactory->getPlaces($placeFilter);

// Для отображения страницы используем шаблонизатор Twig
echo $twig->render('index.html', ['places' => $places] );

?>



