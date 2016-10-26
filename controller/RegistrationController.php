<?php

namespace controller;

require_once("model/Database.php");

class RegistrationController {

    private $data;
    private $validPassword = false;
    private $validUsername = false;

    public function __construct($formData)
    {
        $this->data = $formData;
    }

    public function isUserNameValid()
    {
        return $this->validUsername;
    }

    public function isPasswordValid()
    {
        return $this->validPassword;
    }

    public function validateRegistrationForm()
    {

    }

    private function validateUserName($username) {

    }

    private function validatePassword($password) {

    }


}