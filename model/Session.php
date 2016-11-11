<?php

namespace model;

class Session
{

    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public function getSessionVariable($var)
    {
        return $_SESSION[$var];
    }

    public function setLoggedInToFalse()
    {
        $_SESSION["loggedIn"] = false;
    }

    public function setLoggedInToTrue()
    {
        $_SESSION["loggedIn"] = true;
    }

    public function isLoggedIn()
    {
        if(isset($_SESSION["loggedIn"])){
            return $_SESSION["loggedIn"];
        }
        else {
            return false;
        }

    }

    public function regenerate()
    {
        session_regenerate_id();
    }

    public function destroy()
    {
        session_destroy();
    }
}