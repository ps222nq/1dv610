<?php

namespace controller;

class RouterController {

    private $loginController;

    public function __construct()
    {
        require_once('model/Session.php');

        require_once('view/LoginView.php');
        require_once('view/DateTimeView.php');
        require_once('view/LayoutView.php');
        require_once('view/RegisterView.php');

        require_once ('controller/LoginController.php');
        require_once ('controller/RegistrationController.php');

        //WARNING: Do NOT move this line or run any output above it
        //as session initialization must be first thing to happen when page is loaded
        $this->session = new \model\Session();

        $this->loginView = new \view\LoginView();
        $this->registerView = new \view\RegisterView();
        $this->dateTimeView = new \view\DateTimeView();
        $this->layoutView = new \view\LayoutView();
        $this->state = new \controller\StateController();


    }

    public function route()
    {
        if($this->state->wantsToRegisterNewUser()) {
            $this->routeForRegistration();
        }
        elseif($this->state->POSTDataIsSet()) {
            $this->routeForPOSTRequest();
        }
        else{
            $this->routeForStart();
        }

    }

    private function routeForRegistration()
    {
        return $this->layoutView->renderIsNotLoggedIn($this->registerView, $this->dateTimeView);
    }

    private function routeForPOSTRequest()
    {
        $this->loginController = new \controller\LoginController($_POST);

        if($this->loginView->isLogInSetInPOST()){
            $this->session->setFlashMessage($this->loginController->doLogin());
            if($this->session->isLoggedIn()){
                $this->layoutView->renderIsLoggedIn($this->loginView, $this->dateTimeView);
            }
            else {
                $this->layoutView->renderIsNotLoggedIn($this->loginView, $this->dateTimeView);
            }

        }
        elseif($this->loginView->isLogOutSetInPOST()){
            $this->session->setFlashMessage($this->loginController->doLogout());
            $this->layoutView->renderIsNotLoggedIn($this->loginView, $this->dateTimeView);
        }
        else{
            $this->routeForStart();
        }

    }

    private function routeForStart()
    {
        return $this->layoutView->renderIsNotLoggedIn($this->loginView, $this->dateTimeView);
    }
}