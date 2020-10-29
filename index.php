<?php

// Загружаем в boostrap.php конфигурацию (config.php),
// обработчика исключений (error-handler.php)
// автозагрузчик (autoload.php) и другие зависимости
require_once(__DIR__ . '/bootstrap.php');

use Turcalendar\Place\Place as Place;
use Turcalendar\Place\PlaceFactory as PlaceFactory;
use Turcalendar\Place\PlaceFilter as PlaceFilter;

$db = new \PDO(DB_DSN, DB_USER, DB_PASS, DB_OPTIONS);
$placeFactory = new PlaceFactory($db);
$placeFilter = new PlaceFilter();

// Показываем только страны и города, которые включают 'бург', ограничивая вывод десятью
$placeFilter->setQuery("бург");
$placeFilter->setLimit(10);
$places = $placeFactory->getPlaces($placeFilter);

// Для отображения страницы используем шаблонизатор Twig
echo $twig->render('index.html', ['places' => $places] );

?>



