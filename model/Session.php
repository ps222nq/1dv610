<?php

namespace model;

class Session
{

    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
    }
}