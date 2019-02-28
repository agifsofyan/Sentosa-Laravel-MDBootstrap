<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = ['post_content','post_title','statuses'];

    public function calledItems()
    {
        return $this->belongsTo('App\Categories', 'category_ID');
    }
}
