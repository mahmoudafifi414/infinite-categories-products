<?php

namespace models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
    public $timestamps = false;
    protected $table = 'categories';

    public function children()
    {
        return $this->hasMany('models\Category', 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany('models\Product', 'cat_id', 'id');
    }
}