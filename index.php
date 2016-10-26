<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$v = new LoginView();
$dtv = new DateTimeView();
$lv = new LayoutView();

if(isset($_SESSION)){
    session_destroy();
}
session_start();

if(!isset($_SESSION["loggedIn"])){
    $lv->renderIsNotLoggedIn($v, $dtv);
} elseif (isset($_POST["LoginView::Logout"])){
    $lv->renderIsNotLoggedIn($v, $dtv);
} elseif ($_SESSION["loggedIn"] == false){
    $lv->renderIsNotLoggedIn($v, $dtv);
} else {
    $lv->renderIsLoggedIn($v, $dtv);
}


