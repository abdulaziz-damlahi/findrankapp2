<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\websites;
class packets extends Model
{
    use HasFactory;
    protected $fillable = [
        'packet_id',
        'count_of_word',
        'description',
        'end_of_pocket',
        'started_of_pockets',
        'count_of_websites',
    ];
    public function user()
    {
        $this->belongsTo('App\Models\users', 'id','id');
    }
    public function websitess()
    {
        return $this->hasMany('App\Models\websites', 'id','packet_id');
    }

}
