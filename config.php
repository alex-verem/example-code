<?php

/****** База данных (MySQL) *******/

/** Имя БД */
define('DB_NAME', 'turcalendar_db');

/** Логин БД */
define('DB_USER', 'root');

/** Пароль БД */
define('DB_PASS', '');

/** Хост БД */
define('DB_HOST', '127.0.0.1');

/** Кодировка БД */
define('DB_CHARSET', 'utf8');

/** Collation тип  */
define('DB_COLLATE', 'utf8_general_ci');

/** Источник данных для PDO */
define('DB_DSN', 'mysql:host=' . DB_HOST . ';port=3306;dbname=' . DB_NAME . ';charset=' . DB_CHARSET);

/** Параметры PDO соединения  */
define('DB_OPTIONS', [
        // Явно указываем PDO выбрасывать исключения при ошибках
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false,
    ]
);
