<?php

namespace controller;

class StateController
{

    public function sessionExists()
    {
        return isset($_SESSION);
    }

    public function userIsLoggedIn()
    {
        var_dump($_SESSION);
        return isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true;
    }

    public function POSTDataIsSet()
    {
        return !empty($_POST);
    }

    public function GETDataIsSet()
    {
        return !empty($_GET);
    }

    public function wantsToRegisterNewUser(){
        return isset($_GET["register"]);
    }
}