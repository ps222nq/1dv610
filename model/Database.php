<?php

namespace model;

class Database {

    //Note to developer: Placeholder interface to develop against until actual Database is implemented
    //See also Clean Code (Martin), Chapter 8: Boundaries - "Using code that does not yet exist"

    //TODO: remove these later, placeholder for testing login functionality w/o DB
    private $testUser;
    private $testPass;
    private $settings;

    public function __construct()
    {
        require_once("model/DBSettings.php");
        $this->settings = new DBSettings();

        $this->testUser = $this->settings->username;
        $this->testPass = $this->settings->password;

    }

    public function authenticateUser($username, $password)
    {
        if($username == $this->testUser && $password == $this->testPass){
            return true;
        } else {
            return false;
        }
    }
}