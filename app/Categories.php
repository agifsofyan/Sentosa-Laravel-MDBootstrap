<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['category_name'];

    // public function calledItems()
    // {
    //     return $this->hasMany('App\Articles', 'categories_ID');
    // }
}
