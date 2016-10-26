<?php

require_once("controller/RegistrationController.php");

class RegisterView {

    private static $messageId = "RegisterView::Message";
    private static $name = "RegisterView::UserName";
    private static $password = "RegisterView::Password";
    private static $passwordRepeat = "RegisterView::PasswordRepeat";
    private static $register = "RegisterView::Register";

    public function response()
    {
        $rc = new \controller\RegistrationController($_POST);
        $message = '';

        if(isset($_POST["RegisterView::Register"])){
            $message = $rc->doRegistration();
        }

        return $this->generateRegistrationFormHTML($message);
    }

    private function generateRegistrationFormHTML($message)
    {
        $nameToPrefillOnError = "";
        if(isset($_POST["RegisterView::UserName"])){
            $nameToPrefillOnError = $_POST["RegisterView::UserName"];
        }

        return '<form method="POST" action="index.php?register=1">
				<fieldset>
					<legend>Register a new user - write username and password</legend>
					<a href="index.php">Back to login</a>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' .$nameToPrefillOnError .'" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					
					<label for="' . self::$passwordRepeat . '">Repeat password :</label>
					<input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" />
					
					<input type="submit" name="' . self::$register . '" value="register" />
				</fieldset>
			</form>';
    }
}