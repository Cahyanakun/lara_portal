<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','jenis_kelamin','tanggal_lahir', 'alamat','is_active','image','NI','phone','role',
        'bio','quotes'
    ];

    use SoftDeletes;
    protected $dates =['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
     'remember_token',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
    
}
