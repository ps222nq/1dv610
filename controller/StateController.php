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
        echo "Am I ever called, wonders isLoggedIn?";
        var_dump($_SESSION);
        return isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true;
    }

    public function POSTDataIsSet()
    {
        echo "Am I ever called, wonders POST?";
        return isset($_POST);
    }

    public function GETDataIsSet()
    {
        return isset($_GET);
    }

    public function wantsToRegisterNewUser(){
        return isset($_GET["register"]);
    }
}