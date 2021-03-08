<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class users extends Authenticatable
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
<<<<<<< HEAD:app/Models/User.php
      return   $this->hasOne('App\Models\packets', 'user_id','id');
=======
        return $this->hasMany('App\Models\packets', 'id','id');
>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2:app/Models/users.php
    }

    public function websites()
    {
        return $this->hasMany('App\Models\websites','user_id');
    }
}

