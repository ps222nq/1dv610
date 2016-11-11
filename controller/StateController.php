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
        return isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true;
    }

    public function POSTDataIsSet()
    {
        return isset($_POST);
    }

    public function GETDataIsSet()
    {
        return isset($_GET);
    }
}