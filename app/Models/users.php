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
    ];

    public function packets()
    {
        return $this->hasMany('App\Models\packets', 'id','id');
    }
    public function packetsOfUsers()     {
        return $this->hasMany('App\Models\packets_of_users', 'user_id','id');
    }

    public function website()
    {
        return $this->hasMany('App\Models\websites', 'user_id','id');
    }

    public function websites()
    {

        return $this->hasMany('App\Models\websites','user_id','id');

    }
}
