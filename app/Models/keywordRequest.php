<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class KeywordRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'rank',
        'keyword_id',
        'user_id',
    ];
    public function keywords():hasMany
    {
        return $this->hasMany('App\Models\keywords', 'id','keyword_id');
    }
}
