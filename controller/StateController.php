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
        if(isset($_SESSION["loggedIn"])){
            return $_SESSION["loggedIn"];
        }
        return false;
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