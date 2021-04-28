<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packets_of_users extends Model
{
    use HasFactory;



protected $fillable = [
    'id',
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

public function Users()
{
    return $this->hasOne('App\Models\users', 'id', 'user_id');
}


}

