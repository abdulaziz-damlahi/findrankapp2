<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packets extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'packet_id',

        'count_of_word',
        'description',
        'end_of_pocket',
        'started_of_pockets',
        'count_of_websites',
    ];
    public function User()
    {
        $this->belongsTo('App\Models\User', 'id','packet_id');
    }


    public function websites()
    {
        return $this->hasMany('App\Models\websites', 'website_id');
    }

}
