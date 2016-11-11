<?php

namespace view;

require_once("controller/LoginController.php");
require_once ("controller/StateController.php");

class LoginView {
	private static $login = 'LoginView::Login';
	public static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';


	public function response()
    {

        $lc = new \controller\LoginController($_POST);
        $state = new \controller\StateController();

	    if($state->userIsLoggedIn()){
	        $message = 'Welcome ' . $this->getUserNameFromForm();
	    } elseif ($this->isLogInSetInPOST()) {
            $message = $lc->doLogin();
        } elseif ($this->isLogOutSetInPOST()){
            $message = $lc->doLogout();
	    } else {
            $message = '';
        }

        if($state->userIsLoggedIn()){
            return $this->generateLogoutButtonHTML($message);
        }
		return $this->generateLoginFormHTML($message);


	}

	private function generateLogoutButtonHTML($message)
    {
		return '
			<form  method="post" action="index.php" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}

	private function generateLoginFormHTML($message)
    {
	    $userNameFromLogin = "";
        if(isset($_POST["LoginView::UserName"])){
            $userNameFromLogin = $_POST["LoginView::UserName"];
        }

		return '
			<form method="POST" action="index.php">
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="'. $userNameFromLogin .'" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}

	public function isLogInSetInPOST()
    {
	    return isset($_POST[self::$login]);
    }

    public function isLogOutSetInPOST()
    {
        return isset($_POST[self::$logout]);
    }

    public function isKeepMeLoggedInSetInPOST()
    {
        return isset($_POST[self::$keep]);
    }

    public function getUserNameFromForm()
    {
        if(isset($_POST[self::$name])){
            return $_POST[self::$name];
        }

    }

    public function getPasswordFromForm()
    {
        return $_POST[self::$password];
    }
}