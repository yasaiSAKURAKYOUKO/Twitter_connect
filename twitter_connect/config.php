<?php

ini_set('display_errors', 1);

require_once(__DIR__ . '/vendor/autoload.php');

define('CONSUMER_KEY', 'jNIwNwvItuxZbbdqHoRKleOiH');
define('CONSUMER_SECRET', 'cxTcxZUrMflqtrzHZBkEedwIfCfcBBiSzt1aJ1gpzbngeWBTEe');
define('CALLBACK_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/login.php');

define('DSN', 'mysql:host=localhost;dbname=dotinstall_tw_connect_php');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'Test0000');

session_start();

require_once(__DIR__ . '/functions.php');
require_once(__DIR__ . '/autoload.php');
