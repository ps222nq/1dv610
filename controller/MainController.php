<?php

namespace controller;

class MainController
{
    public function __construct()
    {
        $loginView = new LoginView();
        $registerView = new RegisterView();
        $dateTimeView = new DateTimeView();
        $layoutView = new LayoutView();


    }
}