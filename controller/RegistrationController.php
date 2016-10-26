<?php

namespace controller;

require_once("model/Database.php");

class RegistrationController {

    private $data;
    private $validPassword = false;
    private $validUsername = false;
    private $formErrorMessage;
    private $usernameErrorMessage;
    private $passwordErrorMessage;

    public function __construct($formData)
    {
        $this->data = $formData;
    }

    public function doRegistration()
    {
        $this->validateRegistrationForm();

        if($this->formFieldsAreEmpty() === true){
            return $this->formErrorMessage;
        }

        if($this->isPasswordValid() === false){
            return $this->passwordErrorMessage;
        }

        if($this->isUserNameValid() === false){
            return $this->usernameErrorMessage;
        }

        return "Registered new user";
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
        $this->validateUserName();
        $this->validatePassword();
    }

    private function formFieldsAreEmpty()
    {
        if(empty($this->data["RegisterView::UserName"]) || empty($this->data["RegisterView::Password"])){
            $formErrorMessage = "Username has too few characters, at least 3 characters.";
            return true;
        } else {
            return false;
        }
    }

    private function validateUserName() {

        $candidate = $this->data["RegisterView::UserName"];

        if($this->usernameIsLongEnough($candidate) == true && $this->stringHasIllegalCharacters($candidate) == false){
            $this->validUsername = true;
        }
    }

    private function usernameIsLongEnough($username)
    {
        if (strlen($username) < 3) {
            $this->usernameErrorMessage = "Username has too few characters, at least 3 characters.";
            return false;
        } else {
            return true;
        }
    }

    private function stringHasIllegalCharacters($str)
    {
        if ($str != strip_tags($str)){
            $this->usernameErrorMessage = "Username contains invalid characters.";
            return true;
        } else {
            return false;
        }
    }

    private function validatePassword() {

        $candidate = $this->data["RegisterView::Password"];
        $repeat = $this->data["RegisterView::PasswordRepeat"];

        if($this->passwordRepeatEqualsOriginal($candidate, $repeat)){
            if($this->passwordIsLongEnough($candidate) && $this->stringHasIllegalCharacters($candidate) === false){
                $this->validPassword = true;
            }
        }
    }

    private function passwordRepeatEqualsOriginal($original, $repeat)
    {
        if($repeat !== $original){
            $this->passwordErrorMessage = "Passwords do not match.";
            return false;
        } else {
            return true;
        }
    }

    private function passwordIsLongEnough($password)
    {
        if (strlen($password) < 6) {
            $this->passwordErrorMessage = "Password has too few characters, at least 6 characters.";
            return false;
        } else {
            return true;
        }
    }


}