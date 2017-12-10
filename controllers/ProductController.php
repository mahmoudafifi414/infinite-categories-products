<?php

use models\Product;

class ProductController
{
    public function index()
    {
        print_r(json_encode(Product::with('categories')->get()));
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (count($data) > 0) {
            $product = new Product();
            $product->name = $data->name;
            $product->cat_id = $data->cat_id;
            $product->image = $data->image;
            if ($product->save()) {
                echo 'data saved successfully';
            }
        }
    }

    public function edit()
    {

    }

    public function update()
    {
        $data = json_decode(file_get_contents('php://input'));
        print_r($data);
    }

    public function delete()
    {
        if (isset($_GET['id']) > 0) {
            $product = Product::find($_GET['id']);
            if ($product->delete()) {
                echo 'data deleted successfully';
            }
        }

    }
}