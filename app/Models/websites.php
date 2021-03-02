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
        'website_names',
        'rank',
    ];

    public function User()
    {
        $this->belongsTo('App\Models\users', 'id','website_id');
    }

    public function keywords()
    {
        return $this->hasMany('App\Models\keywords', 'id');
    }

    public function packets()
    {
        $this->belongsTo('App\Models\packets', 'packet_id','id');
    }

}

