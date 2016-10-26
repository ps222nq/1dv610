<?php

namespace model;

class Database {
    //TODO: remove these later, placeholder for testing login functionality w/o DB
    private $testUser = "Admin";
    private $testPass = "Password";
    private $foo;

    public function __construct()
    {
        $this->foo = true;
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