<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable = ['title','subtitle','image','user_id','body','status'];
    use SoftDeletes;
    protected $dates =['deleted_at'];   

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_posts')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
         return $this->morphMany('App\Comment','commentable');
    }

}
