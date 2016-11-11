<?php

namespace controller;

class RouterController {

    public function __construct()
    {

        require_once('view/LoginView.php');
        require_once('view/DateTimeView.php');
        require_once('view/LayoutView.php');
        require_once('view/RegisterView.php');

        require_once ('controller/RouterController.php');


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
        if($this->state->userIsLoggedIn()){
            return $this->layoutView->renderIsLoggedIn($this->loginView, $this->dateTimeView);
        }
        if($this->loginView->isLogOutSetInPOST()){
            echo "router knows logout is set";
            return $this->layoutView->renderIsNotLoggedIn($this->loginView, $this->dateTimeView);
        }
        else {
            return $this->layoutView->renderIsNotLoggedIn($this->loginView, $this->dateTimeView);
        }
    }

    private function routeForStart()
    {
        return $this->layoutView->renderIsNotLoggedIn($this->loginView, $this->dateTimeView);
    }
}