<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packets_reels extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'word_count',
        'description',
        'websites_count',
        'names_packets',
        'rank_fosllow',
        'price',
    ];

}
