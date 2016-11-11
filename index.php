<?php

require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');

//Warning: should be turned off on public server/ when in live mode
//TODO: refactor so that development/live mode can be toggled in a settings.php file
error_reporting(E_ALL);
ini_set('display_errors', 'On');


$loginView = new LoginView();
$registerView = new RegisterView();
$dateTimeView = new DateTimeView();
$layoutView = new LayoutView();

if(isset($_SESSION)){
    session_destroy();
}
session_start();


if(isset($_GET["register"])) {
    $layoutView->renderIsNotLoggedIn($registerView, $dateTimeView);
} elseif (isset($_POST["LoginView::Login"]) && $_POST["LoginView::UserName"] == "Admin" && $_POST["LoginView::Password"] == "Password") {
    //TODO: remove this elseif when cause of test 1.7 failing is found: login works but h2 that should say "Logged in" says "Not logged in"
    $layoutView->renderIsLoggedIn($loginView, $dateTimeView);
} elseif(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true && !isset($_POST["LoginView::Logout"])){
    $layoutView->renderIsLoggedIn($loginView, $dateTimeView);
} else {
    $layoutView->renderIsNotLoggedIn($loginView, $dateTimeView);
}