<?php

namespace models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $table = 'products';
    public $timestamps =false;
    public function categories()
    {
        return $this->belongsTo('models\Category','cat_id','id');
    }
}