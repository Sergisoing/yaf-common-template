<?php

define('APPLICATION_PATH', dirname(__DIR__));
require APPLICATION_PATH . '/vendor/autoload.php';
$application = new Yaf\Application( APPLICATION_PATH . "/conf/application.ini");
$application->bootstrap()->run();
?>
