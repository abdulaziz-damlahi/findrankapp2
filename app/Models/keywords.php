<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keywords extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'date',
        'website_id',
    ];
    public function websites()
    {
        $this->belongsTo('App\Models\websites', 'id','website_id');
    }


    public function User()
    {
        $this->belongsTo('App\Models\users', 'id','website_id');
    }

}
