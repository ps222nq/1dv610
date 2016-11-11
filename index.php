<?php

require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');

require_once ('controller/RouterController.php');

//Warning: should be turned off on public server/ when in live mode
//TODO: refactor so that development/live mode can be toggled in a settings.php file
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(!empty($_SESSION)){
    echo "session is destroyed! \n";
    session_destroy();
}
session_start();

$router = new \controller\RouterController();
$router->route();


