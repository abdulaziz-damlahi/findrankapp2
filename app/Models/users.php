<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'user_id',
        'phone',
        'email',
        'password',
        'updated_at',
        'created_at',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
        'password',
    ];

    public function packets()
    {
<<<<<<< HEAD
        return $this->hasMany('App\Models\packets', 'id','id');
=======
        return   $this->hasOne('App\Models\packets', 'user_id','id');
>>>>>>> 7a2e82b9d360ff2c9e0d6a02ffc09ad6d5e1ec74
    }

    public function websites()
    {
        return $this->hasMany('App\Models\websites','user_id');
    }
}

