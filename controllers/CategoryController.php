<?php

use models\Category;

class CategoryController
{
    public function index()
    {
        $cat = Category::with('children', 'products')->get();
        print_r(json_encode($cat));
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'));
        if (count($data) > 0) {
            $category = new Category();
            $category->name = isset($data->name) ? $data->name : null;
            $category->parent_id = isset($data->parent_id) ? $data->parent_id : null;
            if ($category->save()) {
                echo 'data saved successfully';
            }
        }
    }

    public function delete()
    {
        if (isset($_GET['id']) > 0) {
            $category = Category::find($_GET['id']);
            if ($category->delete()) {
                echo 'data deleted successfully';
            }
        }

    }
}