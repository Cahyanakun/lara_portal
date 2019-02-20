<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = ['title','body','status','image'];
    use SoftDeletes;
    protected $dates =['deleted_at'];   
}
