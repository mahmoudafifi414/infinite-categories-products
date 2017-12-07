<?php

use models\Product;

class ProductController
{
    public function index()
    {
        print_r(json_encode(Product::get()));
    }

    public function store()
    {
        $id = $_REQUEST['uri'];
        print_r($id);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}