<?php

require_once ('controller/RouterController.php');

//Warning: should be turned off on public server/ when in live mode
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$router = new \controller\RouterController();
$router->route();
