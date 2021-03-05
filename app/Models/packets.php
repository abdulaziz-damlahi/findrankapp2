<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\websites;
class packets extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'packet_id',
        'website_id',
        'count_of_words',
        'descrpitions',
        'end_of_pocket',
        'packet_names',
        'started_of_pockets',
        'count_of_websites',
    ];
    public function user()
    {
        $this->belongsTo('App\Models\users', 'id','id');
    }
    public function websitess()
    {
        return $this->hasMany('App\Models\websites', 'id','id');
    }

}
