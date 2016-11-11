<?php

require_once("controller/LoginController.php");

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

	    if(isset($_POST["loggedIn"]) && $_POST["loggedIn"] == TRUE){
	        $message = 'Welcome ' . $_POST["LoginView::UserName"];
	    } elseif (isset($_POST["LoginView::Login"])) {
            $message = $lc->doLogin();
        } elseif (isset($_POST["LoginView::Logout"]) && $_SESSION["loggedIn"] === true){
            $message = $lc->doLogout();
	    } else {
            $message = '';
        }

        if($lc->authenticated === true){
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

	public function logInSetInPOST()
    {
	    return isset($_POST[self::$login]);
    }

    public function logOutSetInPOST()
    {
        return isset($_POST[self::$logout]);
    }

    public function keepLoggedInSetInPOST()
    {
        return isset($_POST[self::$keep]);
    }


}