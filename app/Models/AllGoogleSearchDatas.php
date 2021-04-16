<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllGoogleSearchDatas extends Model
{
    protected $fillable = [
        'id',
        'keyword',
        'user_id',
        'website',
        'colonial_name',
        'device',
        'token',
        'statusofresult',
        'processtime',
        'language',
        'updated_at',
        'created_at',
    ];
    public function user()
    {
        $this->belongsTo('App\Models\users', 'id','id');
    }
}
