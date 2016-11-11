<?php

namespace controller;

require_once("model/Database.php");
require_once ("model/Session.php");

class LoginController
{

    public $authenticated = false;

    private $data;
    private $username;
    private $password;
    private $session;

    public function __construct()
    {
        $this->session = new \model\Session();

        //todo: refactor so post data becomes class in model namespace, do not use superglobal here
        $this->data = $_POST;
    }

    public function doLogin()
    {
        //todo: should come from method in POST class in model instead of string dependency, see above todo
        $this->username = $this->data["LoginView::UserName"];
        $this->password = $this->data["LoginView::Password"];

        if(empty($this->username)) {
            return "Username is missing";
        } elseif (empty($this->password)) {
            return "Password is missing";
        } else {
            if($this->authenticateUser($this->username, $this->password)){
                $this->setSessionOnLogin();
                $this->authenticated = true;
                return "Welcome";
            } else {
                return "Wrong name or password";
            }
        }
    }
    public function authenticateUser($username, $password)
    {
        try {
            $dbc = new \model\Database();
            return $dbc->authenticateUser($username, $password);
        } catch (\Exception $e) {
            return "Something went wrong, please try again: Error message was " . $e->getMessage();
        }
    }

    public function setSessionOnLogin()
    {
        $this->session->setLoggedInToTrue();
    }

    public function doLogout()
    {
        $this->session->setLoggedInToFalse();
        return "Bye bye!";
    }
}