<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keywords extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'website_id',
        'name',
        'date',
    ];
    public function websites()
    {
        $this->belongsTo('App\Models\websites','id','website_id');
    }
}
