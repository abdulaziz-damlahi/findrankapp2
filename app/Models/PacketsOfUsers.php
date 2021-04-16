<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacketsOfUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_sa',
        'user_id',
        'count_of_words',
        'descrpitions',
        'paymentId',
        'price',
        'end_of_pocket',
        'max_count_of_websites',
        'rank_follow',
        'rank_follow_max',
        'max_count_of_words',
        'packet_names',
        'count_of_websites',
    ];
    public function user()
    {
        $this->belongsTo('App\Models\users', 'id','id');
    }
}
