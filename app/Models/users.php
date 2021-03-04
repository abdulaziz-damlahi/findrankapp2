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
        return $this->hasMany('App\Models\packets', 'packet_id');
    }
    public function websites()
    {

        return $this->hasMany('App\Models\websites','website_id');

    }
}

