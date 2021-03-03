<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class websites extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'packet_id',
        'website_names',
        'rank',
        'keywords',
    ];

    public function User()
    {
        $this->belongsTo('App\Models\User', 'id','user_id');
    }

    public function keywords()
    {
        return $this->hasMany('App\Models\keywords', 'website_id','id');
    }

    public function packets()
    {
        $this->belongsTo('App\Models\packets', 'packet_id','website_id');
    }

}

