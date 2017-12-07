<?php

class HomeController
{
    public function index()
    {
        return include_once '../views/home.html';
    }
}