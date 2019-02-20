<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'category_posts')->orderBy('created_at','DESC')->paginate(6);
    }

    public function post()
    {
        return $this->belongsToMany('App\Post', 'category_posts');;
    }
}
