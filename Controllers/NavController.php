<?php


class NavController
{
    public function index()
    {
        $allNav=array('category','product','login','signUp','logout');
        print_r(json_encode($allNav));
    }
}