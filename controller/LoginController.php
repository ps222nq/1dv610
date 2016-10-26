<?php
namespace controller;
require_once("model/Database.php");
class LoginController {

    private $data;
    public $authenticated = false;

    public function __construct($formData)
    {
        $this->data = $formData;
    }
    public function doLogin()
    {
        if(isset($_POST['LoginView::Login'])){
            $username = $this->data["LoginView::UserName"];
            $password = $this->data["LoginView::Password"];
        }
        if(empty($username)) {
            return "Username is missing";
        } elseif (empty($password)) {
            return "Password is missing";
        } else {
            if($this->authenticateUser($username, $password)){
                $this->setSessionOnLogin($username);
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
    public function setSessionOnLogin($username)
    {
        $_SESSION["username"] = $username;
        $_SESSION["loggedIn"] = true;
        //$_SESSION["message"] = "Welcome";
        session_regenerate_id();
    }
    public function doLogout()
    {
        $_SESSION["loggedIn"] = false;
        unset($_SESSION["username"]);
        return "Bye bye!";
    }
}