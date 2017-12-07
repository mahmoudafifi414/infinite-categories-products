<?php

class HomeController
{
    public function index()
    {
        return include_once '../AW/views/home.html';
    }
}